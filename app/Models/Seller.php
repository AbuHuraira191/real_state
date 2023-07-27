<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'about',
        'address'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class,'act_seller_id');
    }

    public function dealers()
    {
        return $this->hasMany(Dealer::class);
    }
}
