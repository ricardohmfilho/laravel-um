<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Requests\CustomRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends CustomRequest
{
    protected $id;

    public function __construct(Request $request)
    {
        $this->id = (int) $request->route('id');
    }

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
                    'email'     =>  ['email', Rule::unique('customers')->ignore($this->id)],
                    'born_at'   =>  ['date']
                ];
            default:
                break;
        }
    }

    // Rule::unique('customers')->ignore($this->request->get('id'))
    

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