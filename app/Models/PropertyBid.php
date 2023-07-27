<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyBid extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'property_id',
        'bid_rate'
    ];
}
