<?php

namespace App\Http\Resources\FourSquare;

use Illuminate\Http\Resources\Json\JsonResource;

class GeoLocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'latitude' => $this->context->geo_bounds->circle->center->latitude,
            'longitude' => $this->context->geo_bounds->circle->center->longitude,
        ];
    }
}
