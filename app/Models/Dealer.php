<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
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
        return $this->hasMany(Property::class,'act_dealer_id');
    }

    public function sellers()
    {
        return $this->hasMany(Seller::class);
    }
}
