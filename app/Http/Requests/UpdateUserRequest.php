<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request
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
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,'.$this->route('users'),
            'role_id' => 'required',
            'is_active' => 'required',
            'password' => 'required_with:password_confirmation|confirmed',
            'profile_photo' => 'image|dimensions:min_width=100,min_height=100'
        ];
    }
}
