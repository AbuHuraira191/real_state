<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Dealer;
use App\Models\Image;
use App\Models\PevirtDealer;
use App\Models\PevirtSeller;
use App\Models\Property;
use App\Models\Seller;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    private $user_services;

    public function __construct(UserServices $user_services)
    {
        $this->user_services = $user_services;
    }

    public function index()
    {
        $user_data = $this->user_services->getUser();
        $properties = Property::where('bid_status', 'on')->take(7)->get();
        return view('pages.admin.index',compact('properties','user_data'));
    }

    public function propertyList(){
        $properties = Property::where('bid_status', 'on')->paginate(6);
        $hot_properties = Property::where('hot_status','yes')->take(4)->get();
        return view('pages.admin.property-list',compact('properties','hot_properties'));
    }

    public function allSellers(){
        $sellers = Seller::paginate(6);
        return view('pages.admin.sellers-list',compact('sellers'));
    }

    public function deleteSellers($id){
        dd($id);
        $sellers = Seller::paginate(6);
        return view('pages.admin.sellers-list',compact('sellers'));
    }

    public function allDealers(){
        $dealers = Dealer::paginate(6);
        return view('pages.admin.dealer-list',compact('dealers'));
    }
    public function deleteDealer($id){
        dd($id);
        $dealers = Dealer::paginate(6);
        return view('pages.admin.dealer-list',compact('dealers'));
    }

    public function allBuyers(){
        $buyers = Buyer::paginate(6);
        return view('pages.admin.buyer-list',compact('buyers'));
    }

    public function deleteBuyer($id){
        dd($id);
        $buyers = Buyer::paginate(6);
        return view('pages.admin.buyer-list',compact('buyers'));
    }

    public function propertyDetail($id){
        $property = Property::where('id', $id)->first();
        $hot_properties = Property::where('hot_status','yes')->take(4)->get();

        if ($property['act_seller_id'] != null){
            $dealer_detail = Seller::find($property['act_seller_id']);
        }else{
            $dealer_detail = Dealer::find($property['act_dealer_id']);
        }
        return view('pages.admin.property-detail',compact('property','hot_properties','dealer_detail'));
    }

    public function propertyDelete($id){
        try {
            $property = Property::where('id', $id)->first();
            if ($property){

                $seller_id = $property['seller_id'];
                $images = Image::where('property_id', $property['id'])->get();


                if ($images->isNotEmpty()) {
                    // Delete all images
                    foreach ($images as $image) {

                        // Delete the image file from storage ('image_path' contains the file path)
                        if (Storage::exists($image->image_path)) {
                            Storage::delete($image->image_path);
                        }
                        // Delete the image record from the database
                        $image->delete();
                    }
                }

                $dealer_id = $property['act_dealer_id'];

                if ($dealer_id != null){

                    $dealer_assign_properties = Property::where('act_dealer_id', $dealer_id)->get();
                    if (count($dealer_assign_properties) == 1){
                        // dealer have just one property against current seller now it should be no longer left the Dealer of current seller
                        $pevirt_seller = PevirtSeller::where('dealer_id', $dealer_id)->where('property_id',$property['id'])->first();

                        if ($pevirt_seller){
                            $pevirt_seller->delete();
                        }

                        $pevirt_dealer = PevirtDealer::where('seller_id', $seller_id)->where('dealer_id',$dealer_id)->first();
                        if ($pevirt_dealer){
                            $pevirt_dealer->delete();
                        }
                    }
                    //if dealer have more than one property against current seller it is remaining the Dealer of current seller
                }
                $property->delete();
                return redirect()->route('admin_property_list')->with('success','Property Delete Successfully');
            }
            return redirect()->route('admin_property_list')->with('error','Property Not Found in recode');
        }catch (\Exception $e){
            return redirect()->route('admin_property_list')->with('error','Something went wrong please contact to support');
        }
    }
}
