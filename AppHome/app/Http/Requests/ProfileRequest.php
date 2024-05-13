<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        
        return [
            'name'=>'required|min:3',
            'email' => 'email|required',
            'password' => 'required|min:8|max:50|confirmed',
            'bio' => 'required',
            'image' => 'image|mimes:png,svg,jpg|max:10240'
        ];
    }
}