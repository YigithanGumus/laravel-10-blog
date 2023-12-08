<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user_id = $this->request->get("user_id");
        return [
            "name"=>"required|sometimes|min:3",
            "email"=>"required|sometimes|email|unique:App\Models\User,email,".$user_id,
            "password"=>"required|sometimes|string|min:5"
        ];
    }

    public function messages()
    {
        return [
            "name.required"=>"Bu alan zorunludur.",
            "name.min"=>"Ad ve Soyad alanı en az 3 karakterden oluşmalıdır!",
            "email.required"=>"Bu alan zorunludur!",
            "email.email"=>"Girdiğiniz alan e-posta formatına uymak olmalıdır.",
            "email.unique"=>"Girdiğiniz eposta sistemde mevcuttur.",
            "password.required"=>"Bu alan zorunludur.",
            "password.min"=>"Şifre alanı en az 5 karakterden oluşmalıdır.",
        ];
    }

    protected function passedValidation()
    {
        if ($this->request->has("password")) {
            $password = $this->request->get("password");
            $this->request->set("password",Hash::make($password));
        }
    }
}
