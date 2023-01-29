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
        return [
            'name' => $this->name,
            'description' => $this->weather[0]->description,
            'icon' => $this->weather[0]->icon,
            'timestamp' => $this->dt,
            'timezone' => $this->timezone,
            'temperature' => $this->main->temp,
            'feels_like' => $this->main->feels_like,
        ];
    }
}
