<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevirtDealer extends Model
{
    use HasFactory;

    protected $fillable = [
        'dealer_id',
        'seller_id',
    ];
}
