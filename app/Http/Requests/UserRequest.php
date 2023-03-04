<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $user_id = $this->request->get("user_id");
        return [
            "name" => "required|sometimes|min:3",
            "email" => "required|sometimes|email|unique:App\Models\User,email,$user_id",
            "password" => "required|sometimes|string|min:6|confirmed"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Bu alan zorunludur.",
            "name.min" => "En az 3 karakter giriniz.",
            "email.required" => "Bu alan zorunludur.",
            "email.email" => "Eposta adresi formatına uygun giriniz.",
            "email.unique" => "Eposta sisteme kayıtlıdır.",
            "password.required" => "Bu alan zorunludur.",
            "password.min" => "En az 6 karakter giriniz.",
            "password.confirmed" => "Şifreler eşleşmiyor",
            "password_confirmed.required" => "Bu alan zorunludur.",
            "password_confirmed.min" => "En az 6 karakter giriniz.",
            "password_confirmed.confirmed" => "Şifreler eşleşmiyor.",
        ];
    }
}
