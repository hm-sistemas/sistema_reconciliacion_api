<?php

namespace App\Http\Requests\Deposit;

use Illuminate\Foundation\Http\FormRequest;

class DepositRequest extends FormRequest
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
            'date' => 'required',
            'date_from' => 'required',
            'comments' => 'string|nullable',
            'date_to' => 'required',
            'type' => 'required',
            'total' => 'required',
            'total_pesos' => 'required',
            'total_dollars' => 'required',
            'pending' => 'boolean',
        ];
    }
}