<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdatePostRequest extends Request
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
            'title' => 'required|min:3|unique:posts,title,'.$this->route('posts'),
            'category_id' => 'required',
            'body' => 'required',
            'image_file' => 'image|dimensions:min_width=100,min_height=100'
        ];
    }
}
