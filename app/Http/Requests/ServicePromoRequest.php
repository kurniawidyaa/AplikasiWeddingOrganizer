<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicePromoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            // 'user_id' => 'required',
            'service_id' => 'required',
            'starting_price' => 'required',
            'final_price' => 'required',
            'percent_discount' => 'required',
            'nominal_discount' => 'required',
        ];
    }
}
