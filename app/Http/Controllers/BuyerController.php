<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\Property;
use App\Models\PropertyBid;
use App\Models\Seller;
use App\Services\UserServices;
use Illuminate\Http\Request;

class BuyerController extends Controller
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
        return view('pages.buyer.index',compact('properties','user_data'));
    }

    public function propertyList(){
        $properties = Property::where('bid_status', 'on')->paginate(6);
        $hot_properties = Property::where('hot_status','yes')->take(4)->get();
        return view('pages.buyer.property-list',compact('properties','hot_properties'));
    }

    public function propertyDetail($id){
        $user_data = $this->user_services->getUser();
        $buyer_id = $user_data['id'];
        $property = Property::where('id', $id)->first();
        $bid_data = PropertyBid::where('property_id',$id)->where('buyer_id',$buyer_id)->first();
        $largestBidRate = PropertyBid::where('property_id', $id)->max('bid_rate');
        $hot_properties = Property::where('hot_status','yes')->take(4)->get();

        if ($property['act_seller_id'] != null){
            $dealer_detail = Seller::find($property['act_seller_id']);
        }else{
            $dealer_detail = Dealer::find($property['act_dealer_id']);
        }
        return view('pages.buyer.property-detail',compact('property','hot_properties','dealer_detail','bid_data','largestBidRate'));
    }

    public function bidProperties(){
        dd('bidProperties');

    }

    public function propertyStoreBid(Request $request){
        $user_data = $this->user_services->getUser();
        $buyer_id = $user_data['id'];
        $property_id = $request['property_id'];
        $bid_rate = $request['bid_rate'];
        $bid_id = $request['bid_id'];

        try {
            PropertyBid::updateOrCreate([
                'id' => $bid_id
            ], [
                'buyer_id' => $buyer_id,
                'property_id' => $property_id,
                'bid_rate' => $bid_rate
            ]);
            return redirect()->route('buyer_property_list')->with('success','Your bid rate successfully submit');
        }catch (\Exception $e){
            return redirect()->route('buyer_property_list')->with('error','we know this issue Something went wrong in DB please contact to support');
        }

    }
}
