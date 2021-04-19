<?php

namespace Modules\Property\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Media\Transformers\MediaResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $district = $this->district;
        $city = $district->city;
        $province = $city->province;

        $data = [
            'id'            => $this->id,
            "title"         => $this->title,
            "desc"          => $this->desc,
            "location"      => [
                "district_id" => $this->district_id,
                "city_id"     => $city->id,
                "postal_code" => $this->postal_code,
                "address"     => $this->address,
                "lat"         => $this->lat,
                "long"        => $this->long,
                "location_string" => [
                    "district"  => $district->name,
                    "city"      => $city->name,
                    "province"  => $province->name,
                ]
            ],
            "facilities"    => $this->facilities,
            "poi"           => $this->poi,
            "rules"         => $this->rules,
            "room_total"    => $this->room_total,
            "is_featured"   => $this->is_featured,
            "is_discount"   => $this->is_discount,
            "type"          => $this->type,
            "type_string"   => $this->refType->title,
            "square_meter"  => $this->square_meter,
            "active_status" => $this->active_status,
            "basic_price"   => $this->basic_price,
            "property_images" => MediaResource::collection($this->gallery()->get(['file', 'media.id']))
        ];

        // return parent::toArray($request);
        return $data;
    }
}
