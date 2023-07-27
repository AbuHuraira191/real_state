<?php

namespace App\Services;
use App\Models\Admin;
use App\Models\Buyer;
use App\Models\Seller;
use App\Models\Dealer;
use Illuminate\Support\Facades\Route;

class UserServices{

    public function signup($data){

        $modelClass = $this->getTableForRole($data['role']);
        $table = new $modelClass();

        try {
            $user = $table->updateOrCreate([
                'email' => $data['email']
            ], [
                'name' => $data['name'],
                'phone' => $data['phone'],
//                'password' => bcrypt($data['password']),
                'password' => $data['password'],
                'about' => $data['about'],
                'address' => $data['address'],
            ]);

            session()->put('role', $data['role']);
            session()->put('email', $data['email']);
            session()->put('user', $user);

            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    public function getTableForRole($role)
    {
        // Map the role to the respective table name
        $modelClasses = [
            'buyer' => Buyer::class,
            'dealer' => Dealer::class,
            'seller' => Seller::class,
        ];

        return $modelClasses[$role] ?? null;
    }

    public function getUser(){
        $user_role = session('role');
        $user_email = session('email');
        $user_data = null;

        if($user_role === 'admin' ){
            $user_data = Admin::where('email', $user_email)->first();
        }elseif ($user_role === 'dealer' ){
            $user_data = Dealer::where('email', $user_email)->first();
        }elseif ($user_role === 'seller' ){
            $user_data = Seller::where('email', $user_email)->first();
        }elseif ($user_role === 'buyer' ){
            $user_data = Buyer::where('email', $user_email)->first();
        }

        return $user_data;
    }
}
