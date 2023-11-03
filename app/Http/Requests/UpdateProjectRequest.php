<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'name'=>['required','string','max:25','unique:projects,id,' . $this->project->id],
            'repo_path'=>['required','string','url'],
            'cover_img'=>['nullable', 'image', 'max:512'],
            'description'=>['nullable','string'],
            'type_id'=> ['nullable','exists:types,id'],
            'technologies' => ['nullable', 'exists:technologies,id'],

        ];
    }

    public function messages(){
        return [
            'name.required'=>'The name is obligatory',
            'name.string' => 'The name must be a string',
            'name.max' => 'The name must be a maximum of 25 characters',
            'name.unique' => 'The name must be unique',

            'repo_path.required'=>'The link repository is obligatory',
            'repo_path.string' => 'The link repository must be a string',
            'repo_path.url' => 'The link repository must be a URI',

            
            'cover_img.image' => 'The inserted file must be an image',
            'cover_img.max' => 'The inserted file must have a size smaller than 512KB',

            'description.string'=> 'The description must be a string',

            'type_id.exists'=> 'The type entered is invalid',

            'tecnologies.exists' => 'The technologies inserted are not valid',


        ];
    } 
}