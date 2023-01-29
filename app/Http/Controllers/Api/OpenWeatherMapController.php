<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\OpenWeatherMap\WeatherRequest;
use App\Http\Resources\OpenWeatherMap\WeatherResource;

class OpenWeatherMapController extends Controller
{
    /**
     * Base url of openweathermap API
     *
     * @var $base_url
     */
    public $base_url;

    /**
     * HTTP Client header requirements
     *
     * @var $headers
     */
    public $headers;

    /**
     * Open Weather Map APP Id
     *
     * @var $headers
     */
    public $app_id;

    /**
     * Controller constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->base_url = config('api_base_urls.open_weather_map');
        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
        $this->app_id = config('app_keys.open_weather_map');
    }

    /**
     * Get weather info of particular city
     *
     * Endpoint: /api/weather
     * Method: POST
     *
     * @param \App\Http\Requests\OpenWeatherMap\WeatherRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function getCityWeather(WeatherRequest $request)
    {
        $request_data = $request->validated();

        $query_params = [
            'lat' => $request_data['latitude'],
            'lon' => $request_data['longitude'],
            'appid' => $this->app_id,
            'units' => 'imperial'
        ];

        $response = Http::withHeaders($this->headers)->get("{$this->base_url}weather", $query_params);

        $data = json_decode($response->getBody());

        return response()->json(new WeatherResource($data));
    }
}
