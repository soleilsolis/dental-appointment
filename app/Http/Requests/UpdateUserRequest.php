<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->type === 'dentist' ||  Auth::user()->id === $this->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required|numeric',
            'name' =>  ['required', Rule::unique('users')->ignore($this->id) ],
            'email' =>  'required|email:rfc,dns',
            'password' => [Rule::excludeIf(empty($this->password)), 'min:8'],
            'type' => 'required',
            'first_name' => 'required|alpha_dash',
            'last_name' => 'required|alpha_dash',
            'birthdate' => 'required',

        ];
    }
}
