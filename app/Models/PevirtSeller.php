<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevirtSeller extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'dealer_id',
        'product_id',
    ];
}
