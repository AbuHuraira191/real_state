<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'act_dealer_id',
        'act_seller_id',
        'seller_id',
        'name',
        'price',
        'bed',
        'living_room',
        'parking',
        'kitchen',
        'detail',
        'type',
        'address',
        'location_city',
        'bid_status',
        'hot_status',
        'status',
        'rating',
        'on_bid_date',
        'close_bid_date'

    ];


    public function images()
    {
        return $this->hasMany(Image::class,'property_id','id');
    }

    public function dealer()
    {
        return $this->belongsTo(Dealer::class,'act_dealer_id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class,'act_seller_id');
    }

    public function sellerActAsDealer($query, $act_seller_id)
    {
        return $query->where('act_seller_id', $act_seller_id);
    }

//    // Special action properties based on act_seller_id
//$act_seller_id = 123; // Replace with the desired act_seller_id
//$specialActionProperties = Property::specialActionProperties($act_seller_id)->get();
}
