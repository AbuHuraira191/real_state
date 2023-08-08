<?php

namespace App\Services;

use App\Models\Image;
use App\Models\PevirtDealer;
use App\Models\PevirtSeller;
use App\Models\Property;
use Illuminate\Support\Facades\Storage;

class SellerServices{

    public function addProperty($data){
        $user_data = session('user');
        try {
            $property = Property::updateOrCreate([
                'id' => $data['id']
            ], [
                'name' => $data['name'],
                'seller_id' => $user_data['id'],
                'act_dealer_id' => array_key_exists('act_dealer_id', $data) ? $data['act_dealer_id'] : null,
                'act_seller_id' => $data['act'] === 'dealer' ? $user_data['id'] : null,
                'price' => $data['price'],
                'bed' => $data['bed'],
                'living_room' => $data['room'],
                'parking' => $data['parking'],
                'kitchen' => $data['kitchen'],
                'detail' => $data['detail'],
                'type' => $data['type'],
                'address' => $data['address'],
                'location_city' => $data['location_city'],
                'bid_status' => array_key_exists('bid_status', $data) ? $data['bid_status']:null,
                'status' => array_key_exists('status', $data) ? $data['status'] : 'For-Sale',
                'rating' => array_key_exists('rating', $data) ? $data['rating'] : null,
                'hot_status' => array_key_exists('hot_status', $data) ? $data['hot_status'] : 'no',

            ]);

            $images = Image::where('property_id', $property['id'])->get();

            if ($images->isNotEmpty()) {
                // Delete all images
                foreach ($images as $image) {
                    // Delete the image file from storage (assuming 'image_path' contains the file path)
                    if (Storage::exists($image->image_path)) {
                        Storage::delete($image->image_path);
                    }
                    // Delete the image record from the database
                    $image->delete();
                }
            }

            if (array_key_exists('images', $data) && $property ){
                $uploadPath = '/images/property';
                $i = 1;
                foreach ($data['images'] as $image){

                    $extension = $image->getClientOriginalExtension();
                    $fileName = time().$i++.'.'.$extension;
                    $image->move(public_path($uploadPath),$fileName);
                    $finalImagePathName = $uploadPath. '/' . $fileName;

                    Image::updateOrCreate([
                        'image_path' => $finalImagePathName
                    ],[
                        'property_id' => $property['id']

                    ]);
                }
            }
            if ($data['id'] == -1){
                return true;
            }
            return 'update';
        }catch (\Exception $e){
            dd($e->getMessage());
            return $e;
        }
    }

    public function assignPropertyStore($data,$property){
        try {
            $property->update(['act_dealer_id' => $data['dealer_id']]);

            $res = PevirtDealer::updateOrCreate([
                'seller_id' => $data['seller_id']
            ], [
                'dealer_id' => $data['dealer_id']
            ]);

            if ($res){
                PevirtSeller::updateOrCreate([
                    'dealer_id' => $data['dealer_id']
                ], [
                    'seller_id' => $data['seller_id'],
                    'property_id' => $property['id']
                ]);
            }

            return true;
        }catch (\Exception $e){
            dd($e->getMessage());
            return false;
        }
    }
}
