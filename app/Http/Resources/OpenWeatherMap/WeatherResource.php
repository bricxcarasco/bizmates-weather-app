<?php

namespace App\Http\Resources\OpenWeatherMap;

use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        date_default_timezone_set('Asia/Tokyo');
        $timestamp = time();

        return [
            'name' => $this->name,
            'description' => $this->weather[0]->description,
            'icon' => $this->weather[0]->icon,
            'timestamp' => $timestamp,
            'timezone' => $this->timezone,
            'temperature' => $this->main->temp,
            'feels_like' => $this->main->feels_like,
        ];
    }
}
