<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
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
            'label'=> 'required|string|max:25',
            'color'=> [
                'required',
                'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'
            ]
        ];
    }

    public function messages(){
        return [
            'label.required'=> 'The name is obligatory',
            'label.string'=> 'The name must be a string',
            'label.unique'=> 'The name must be unique',

            'color.required'=> 'The color is obligatory',
            'color.regex'=> 'The color must be hex color',

        ];
    }
}