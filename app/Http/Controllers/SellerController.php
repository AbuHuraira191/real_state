<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPropertyRequest;
use App\Models\Dealer;
use App\Models\PevirtSeller;
use App\Models\Property;
use App\Models\Seller;
use App\Services\SellerServices;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;

class SellerController extends Controller
{

    private $seller_services;
    private $user_services;

    public function __construct(SellerServices $seller_services,UserServices $user_services)
    {
        $this->seller_services = $seller_services;
        $this->user_services = $user_services;
    }


    public function index()
    {
        $user_data = $this->user_services->getUser();
        $properties = Property::where('seller_id', $user_data['id'])->take(7)->get();

        return view('pages.seller.index',compact('properties','user_data'));
    }

    public function addPropertyPage(){
        $id = intval(request('id'));
        if ($id != null){
            $property = Property::where('id', $id)->first();
            return view('pages.seller.addProperty',compact('property'));
        }

        return view('pages.seller.addProperty');
    }

    public function addProperty(AddPropertyRequest $request){


        $res = $this->seller_services->addProperty($request->all());

        if ($res === true){
            return redirect()->route('seller_add_property')->with('success','Your property Add Successfully');
        }elseif ($res === 'update'){
            return redirect()->route('seller_add_property')->with('success','Your property Update Successfully');
        }else{
            return redirect()->route('seller_add_property')->with('error','There is an error we known that please contact to the support.');
        }
    }

    public function propertyDetail($id){
        $property = Property::where('id', $id)->first();
        $hot_properties = Property::where('hot_status','yes')->take(4)->get();

        if ($property['act_seller_id'] != null){
            $dealer_detail = Seller::find($property['act_seller_id']);
        }else{
            $dealer_detail = Dealer::find($property['act_dealer_id']);
        }
        return view('pages.seller.property-detail',compact('property','hot_properties','dealer_detail'));
    }

    public function propertyList(){
        $user_data = $this->user_services->getUser();
        $properties = Property::where('seller_id', $user_data['id'])->paginate(6);
//        dd($properties);
        $hot_properties = Property::where('hot_status','yes')->take(4)->get();
        return view('pages.seller.property-list',compact('properties','hot_properties'));
    }

    public function dealers(){
        $dealers = Dealer::paginate(6);
        return view('pages.seller.dealers',compact('dealers'));
    }

    public function my_dealers(){
        $user_data = $this->user_services->getUser();
        $dealers_id = PevirtSeller::where('seller_id',$user_data['id'])->get();

        $dealersArray = [];
        foreach ($dealers_id as $dealer_id) {
            $dealer = Dealer::where('id', $dealer_id['dealer_id'])->first();
            if ($dealer) {
                $dealersArray[] = $dealer;
            }
        }

        // Convert the array into a collection
        $dealersCollection = collect($dealersArray);

        // Set the number of items per page for pagination
        $perPage = 6; // You can adjust this value as per your requirement

        // Get the current page number from the request query parameters
        $pageNumber = request()->query('page', 1);

        // Get the dealers for the current page
        $currentDealers = $dealersCollection->forPage($pageNumber, $perPage);

        // Calculate the total number of items in the collection
        $totalDealers = $dealersCollection->count();

        // Create a new LengthAwarePaginator instance
        $dealers = new LengthAwarePaginator(
            $currentDealers,
            $totalDealers,
            $perPage,
            $pageNumber,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('pages.seller.myDealers',compact('dealers'));
    }

    public function propertyAssign(){
        $id = intval(request('id'));
        $user_data = $this->user_services->getUser();
        $seller_id = $user_data['id'];
        $properties = Property::where('seller_id', $user_data['id'])->get();
        $dealers = Dealer::all();
        if($id != null){
            return view('pages.seller.assignProperty',compact('dealers','id','properties','seller_id'));
        }
        return view('pages.seller.assignProperty',compact('dealers','properties','seller_id'));
    }

    public function propertyAssignStore(Request $request){
        $data = $request->all();
        $property = Property::where('id',$data['property_id'])->first();
        if ($property['act_dealer_id'] == intval($data['dealer_id'])){
            return redirect()->route('seller_assign_property')->with('error','This property already have assigned to this dealer');
        }elseif($property['act_dealer_id'] != null){
            return redirect()->route('seller_assign_property')->with('error','You only assign property to one dealer');
        }
        $res = $this->seller_services->assignPropertyStore($request->all(),$property);

        if ($res){
            return redirect()->route('seller_assign_property')->with('success','Successfully Assign Property to Dealer');
        }
        return redirect()->route('seller_assign_property')->with('error','Some thing went wrong please contact to support');
    }

    public function leading_properties(){
        $user_data = $this->user_services->getUser();
        $hot_properties = Property::where('hot_status','yes')->take(4)->get();
        $properties = Property::where('act_seller_id', $user_data['id'])->paginate(6);

        return view('pages.seller.leadingProperties',compact('properties','hot_properties'));
    }

    public function propertyPermissions($id){
        $property_id = intval($id);
        return view('pages.seller.propertyPermissions',compact('property_id'));
    }

    public function propertyPermissionsStore(Request $request){
        $data = $request->all();
        $property = Property::where('id',$data['property_id'])->first();
//        dd($data);
        if ($property){
            try {
                $property->update([
                    'status' => $data['status'],
                    'bid_status' => $data['bid_status'] ?? null,
                    'on_bid_date' => $data['on_bid_date'] ?? null,
                    'close_bid_date' => $data['close_bid_date'] ?? null,
                ]);
                $property->save();
                return redirect()->route('seller_property_permissions', ['id' => $data['property_id']])->with('success','Successfully Permissions of Property Submit');
            }catch (\Exception $e){
                return redirect()->route('seller_property_permissions', ['id' => $data['property_id']])->with('error','Permissions not update Database Issue please try again');
            }
        }

        return redirect()->route('seller_leading_properties')->with('error','This Property is not present ');
    }
}
