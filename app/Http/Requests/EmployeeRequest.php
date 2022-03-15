<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$this->id,
            'password'=>'required|min:6|confirmed',
            'is_admin'=>'required|min:0|max:1|numeric',
            'avatar'=>'mimes:png,jpg,jpeg'


        ];
    }
    public function messages()
    {
        return [
            'is_admin.min'=>"please don't mess with the parameters",
            'is_admin.max'=>"please don't mess with the parameters",

        ];
    }
}
