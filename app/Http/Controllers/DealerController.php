<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\PevirtDealer;
use App\Models\PevirtSeller;
use App\Models\Property;
use App\Models\Seller;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DealerController extends Controller
{
    private $user_services;

    public function __construct(UserServices $user_services)
    {
        $this->user_services = $user_services;
    }

    public function index()
    {
        $user_data = $this->user_services->getUser();
        $properties = Property::where('act_dealer_id', $user_data['id'])->take(7)->get();
        return view('pages.dealer.index',compact('properties' , 'user_data'));
    }

    public function propertyDetail($id){
        $property = Property::where('id', $id)->first();
        $hot_properties = Property::where('hot_status','yes')->take(4)->get();
        $dealer_detail = Dealer::find($property['act_dealer_id']);
        return view('pages.dealer.property-detail',compact('property','hot_properties','dealer_detail'));
    }

    public function propertyList(){
        $user_data = $this->user_services->getUser();
        $properties = Property::where('act_dealer_id', $user_data['id'])->paginate(6);
        $hot_properties = Property::where('hot_status','yes')->take(4)->get();
        return view('pages.dealer.property-list',compact('properties','hot_properties'));
    }

    public function leadingProperties(){
        $user_data = $this->user_services->getUser();
        $hot_properties = Property::where('hot_status','yes')->take(4)->get();
        $properties = Property::where('act_dealer_id', $user_data['id'])->paginate(6);

        return view('pages.dealer.leadingProperties',compact('properties','hot_properties'));
    }

    public function propertyPermissions($id){
        $property_id = intval($id);
        return view('pages.dealer.propertyPermissions',compact('property_id'));
    }

    public function propertyPermissionsStore(Request $request){
        $data = $request->all();
        $property = Property::where('id',$data['property_id'])->first();
        if ($property){
            try {
                $property->update([
                    'status' => $data['status'],
                    'bid_status' => $data['bid_status'],
                ]);
                $property->save();
                return redirect()->route('dealer_property_permissions', ['id' => $data['property_id']])->with('success','Successfully Permissions of Property Submit');
            }catch (\Exception $e){
                return redirect()->route('dealer_property_permissions', ['id' => $data['property_id']])->with('error','Permissions not update Database Issue please try again');
            }
        }

        return redirect()->route('dealer_leading_properties')->with('error','This Property is not present ');
    }

    public function mySellers(){
        $user_data = $this->user_services->getUser();
        $sellers_id = PevirtDealer::where('dealer_id',$user_data['id'])->get();

        $sellersArray = [];
        foreach ($sellers_id as $seller_id) {
            $seller = Seller::where('id', $seller_id['seller_id'])->first();
            if ($seller) {
                $sellersArray[] = $seller;
            }
        }
        // Convert the array into a collection
        $sellerCollection = collect($sellersArray);

        // Set the number of items per page for pagination
        $perPage = 6; // You can adjust this value as per your requirement

        // Get the current page number from the request query parameters
        $pageNumber = request()->query('page', 1);

        // Get the dealers for the current page
        $currentDealers = $sellerCollection->forPage($pageNumber, $perPage);

        // Calculate the total number of items in the collection
        $totalSellers = $sellerCollection->count();

        // Create a new LengthAwarePaginator instance
        $sellers = new LengthAwarePaginator(
            $currentDealers,
            $totalSellers,
            $perPage,
            $pageNumber,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('pages.dealer.mySellers',compact('sellers'));
    }
}
