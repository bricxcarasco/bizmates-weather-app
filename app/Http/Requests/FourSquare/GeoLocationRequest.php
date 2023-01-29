<?php

namespace App\Http\Requests\FourSquare;

use Illuminate\Foundation\Http\FormRequest;

class GeoLocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'city' => [
                'required',
                'string',
                'in:Tokyo,Yokohama,Kyoto,Osaka,Sapporo,Nagoya'
            ]
        ];
    }
}
