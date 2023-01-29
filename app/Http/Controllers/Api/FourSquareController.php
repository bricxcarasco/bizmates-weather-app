<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\FourSquare\GeoLocationRequest;
use App\Http\Resources\FourSquare\GeoLocationResource;

class FourSquareController extends Controller
{
    /**
     * Base url of FourSquare API
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
     * Controller constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->base_url = config('api_base_urls.four_square');
        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => config('app_keys.four_square')
        ];
    }

    /**
     * Get city geo locaton
     *
     * Endpoint: /api/city_geo_location
     * Method: POST
     *
     * @param \App\Http\Requests\FourSquare\GeoLocationRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function getGeoLocation(GeoLocationRequest $request)
    {
        $request_data = $request->validated();
        
        $query_params = [
            'query' => $request_data['city'],
            'near' => $request_data['city'],
            'limit' => 5
        ];

        $response = Http::withHeaders($this->headers)->get("{$this->base_url}places/search", $query_params);

        $data = json_decode($response->getBody());

        return response()->json(new GeoLocationResource($data));
    }
}
