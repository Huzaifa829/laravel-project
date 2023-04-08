<?php

namespace App\Http\Requests\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
        $emailValidation = auth()->user() ? 'required|email' : 'required|email|unique:users';

        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'country' => 'required',
            'streetaddress' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postalcode' => 'required',
            'email' => $emailValidation,
            'phone' => 'required',
            'cardname' => 'required'
        ];
    }

    public function message()
    {
        return[
            'email.unique' => 'You Already Have an Account With This Email.Please <a href="/login">Login</a> To Continue.'
        ];
    }
}
