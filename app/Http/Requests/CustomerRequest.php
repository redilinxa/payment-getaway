<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class CustomerRequest extends FormRequest
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
            'email'=> 'required|email|unique:customers,email,'.$this->id,//ignore the id to bypass unique validation on unaltered email
            'firstName' => 'required',
            'lastName' => 'required',
            'gender' => 'required|max:1',
            'country' => 'required|max:2|min:2'
        ];
    }


    /**
     * Override the failed validation and remove redirection display api errors accordingly in App\Exceptions\Handler
     * @param Validator $validator
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw (new ValidationException($validator))
            ->errorBag($validator->errors());
    }
}
