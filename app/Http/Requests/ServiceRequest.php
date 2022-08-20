<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'service_category_id' => ['required'],
            'service_thumbnail' => ['image', 'file', 'mimes:jpeg,jpg,png', 'max:1024'],
            'service_name' => ['required', 'min:3'],
            'service_describe' => ['required'],
            'service_note' => ['required'],
            'service_qyt' => ['required', 'min:1', 'max:3'],
            'service_price' => ['required', 'min:5', 'max:12']
        ];
    }
}
