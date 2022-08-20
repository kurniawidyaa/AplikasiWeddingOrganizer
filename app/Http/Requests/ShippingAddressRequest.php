<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingAddressRequest extends FormRequest
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
            'recipients_name' => ['required'],
            'phone_number' => ['required'],
            'address' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'distric' => ['required'], //kecamatan
            'ward' => ['required'], //kelurahan
            'postal_code' => ['required']
        ];
    }
}
