<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required',
            'price'=> 'required|numeric|min:0',
            'bed'=> 'required|numeric|min:0',
            'room'=> 'required|numeric|min:0',
            'parking'=> 'required|numeric|min:0',
            'kitchen'=> 'required|numeric|min:0',
            'detail'=> 'required',
            'type'=> 'required',
            'address'=> 'required',
            'location_city'=> 'required',
            'act'=> 'required',
            'images' => 'required|array|max:4',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:5120'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=> 'Please Enter the name',
            'price.required'=> 'Please Enter the price and should be positive number',
            'bed.required'=> 'Please Enter the No.of bed and should be positive number',
            'room.required'=> 'Please Enter the No. of living room and should be positive number',
            'parking.required'=> 'Please Enter the No. of parking and should be positive number',
            'kitchen.required'=> 'Please Enter the No. of kitchen and should be positive number',
            'detail.required'=> 'Please Enter the detail',
            'type.required'=> 'Please Enter the type',
            'address.required'=> 'Please Enter the address',
            'location_city.required'=> 'Please Enter the location city',
            'act.required'=> 'Please select the you act',
            'images.max' => 'You can upload a maximum of 5 images.',
            'images.required' => 'Please Select the images and should be jpeg,png,jbg and max size 5120'
        ];
    }
}
