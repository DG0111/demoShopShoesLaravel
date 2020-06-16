<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckFormEditAdmin extends FormRequest
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
            'full_name' => 'required|string|min:6|max:255',
            'address' => 'required|string|min:6|max:255',
            'email' =>
                [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($this->id),
                ],
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
