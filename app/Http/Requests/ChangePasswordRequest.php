<?php

namespace App\Http\Requests;

use App\Rules\CheckCurrentPasword;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'current_password'  =>  ['required', 
                                    'min:8', 
                                    'regex:/^(?=\S*[a-z])(?=\S*[!@#$&*])(?=\S*[A-Z])(?=\S*[\d])\S*$/', 
                                    new CheckCurrentPasword()],
            'new_password'  =>  'required|min:8|regex:/^(?=\S*[a-z])(?=\S*[!@#$&*])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
        ];
    }
}