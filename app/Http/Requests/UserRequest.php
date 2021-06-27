<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
         'name'            =>'required',
         'username'        =>'required|max:30',
         'email'           =>'required|email:rfc,dns',
         'password'        =>'required',

        ];
    }
    public function messages(){
        return[
         '*.required'        =>'هذا الحقل مطلوب ',
         'email.email'       =>'يرجي ادخال ايميل صالح ',
//         'password.confirmed'=>'كلمات السر غير متطابقة'
            ];
    }
}
