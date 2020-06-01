<?php

namespace App\Http\Requests\BackEnd\Videos;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'name' => 'required',
            'des'  => ['required' , 'min:10'],
            'meta_des'  => ['required' , 'min:10'],
            'youtube' =>['required' , 'min:14' , 'url'],
            'cat_id' => ['required' , 'integer'],
            'published' => 'required',
            'image' => ['nullable' , 'image']
        ];
    }
}
