<?php

namespace App\Http\Requests;

use App\Http\Requests\CustomRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends CustomRequest
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
        switch ($this->getMethod()) {
            case 'POST':
                return [
                    'name'          =>  ['required'],
                    'email'         =>  ['required', 'email', 'unique:customers'],
                    'phone_number'  =>  ['required'],
                    'state_id'      =>  ['required'],
                    'city_id'       =>  ['required'],
                    'born_at'       =>  ['date']
                ];
            case 'PUT':
                return [
                    //'name'          =>  ['required'],
                    'email'         =>  ['email', Rule::unique('customers', 'email')->ignore($this->customer)],
                    //'phone_number'  =>  ['required'],
                    //'born_at'       =>  ['date']
                ];
            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'required'          => 'O campo - :attribute - é obrigatório',
            'email.email'       => 'O e-mail não é válido',
            'born_at.date'      => 'O formato da data não é válido',
            'status.boolean'    => 'Valor deve ser 0 ou 1',
            'unique'            => 'Este e-mail já foi utilizado.'
        ];
    }
}