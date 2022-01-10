<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
          
          'name'=>['required'],
          'type'=>['required'],
          'brand'=>['required'],
          'price'=>['required'],
          'photo' => 'required',
          'photo.*' => 'image' 

        ];
    }

    public function messages()
    {
       return [

       'photo.*.image'=>'The files should be an image' 

       ];
    }
}
