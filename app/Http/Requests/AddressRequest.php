<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            "user_id" => "required|numeric",
            "city" => "required|min:3",
            "district" => "required|min:3",
            "zipcode" => "required|min:3",
            "address" => "required|min:3",
        ];
    }

    public function messages()
    {
        return [
            "user_id.required" => "Bu alan zorunludur.",
            "user_id.numeric" => "Sayısal Değer giriniz",
            "city.required" => "Bu alan zorunludur.",
            "city.min" => "En az 3 karakter giriniz.",
            "district.required" => "Bu alan zorunludur.",
            "district.min" => "En az 3 karakter giriniz.",
            "zipcode.required" => "Bu alan zorunludur.",
            "zipcode.min" => "En az 3 karakter giriniz.",
            "address.required" => "Bu alan zorunludur.",
            "address.min" => "En az 20 karakter giriniz.",
            "password_confirmed.confirmed" => "Şifreler eşleşmiyor.",
        ];
    }
}
