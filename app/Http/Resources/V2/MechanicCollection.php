<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MechanicCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'profile_image' => uploaded_asset($this->profile_image),   
            'banner_image' => uploaded_asset($this->banner_image),
            'name' =>$this->user->name,
            'description' =>$this->description,
            'email' =>$this->user->email,
            'phone' =>$this->contact,
            'address_one' =>$this->address,
            'address_two' =>$this->address_two,
            'city' =>$this->city,
            'country' =>$this->country,
            'brands' => $this->my_brand_names,
        ];
    }
}
