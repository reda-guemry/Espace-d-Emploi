<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' =>  ['required' , 'string' , 'max:255'] ,
            'last_name' => ['required' , 'string' , 'max:255'] ,
            'email' => ['required' , 'string' , 'email' , 'max:255' , Rule::unique(User::class) -> ignore($this -> user() -> id)] ,
            'specialty' => ['nullable' , 'string' , 'max:255'] ,
            'profile_photo' => ['nullable' , 'image' , 'mimes:jpg,jpeg,png'] ,
            'cover_photo' => ['nullable' , 'image' , 'mimes:jpg,jpeg,png'] ,
            'bio' => ['nullable' , 'string' , 'max:1000'] ,
        ];
    }
}
