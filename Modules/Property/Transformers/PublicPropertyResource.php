<?php

namespace Modules\Property\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Media\Transformers\MediaResource;

class PublicPropertyResource extends JsonResource
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
        $owner = $this->createby;

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
            "room_total"    => $this->sisa_kamar,
            "is_featured"   => $this->is_featured,
            "is_discount"   => $this->is_discount != null ? $this->is_discount : 0 ,
            "type"          => $this->type,
            "type_string"   => $this->refType->title,
            "active_status" => $this->active_status,
            "basic_price"   => $this->basic_price,
            "property_images" => MediaResource::collection($this->gallery()->get(['file', 'media.id'])),
            "owner" => [
                "name" => $owner->name,
            ]
        ];

        return $data;
    }
}
