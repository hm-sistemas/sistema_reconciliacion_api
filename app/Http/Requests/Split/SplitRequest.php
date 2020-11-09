<?php

namespace App\Http\Requests\Split;

use Illuminate\Foundation\Http\FormRequest;

class SplitRequest extends FormRequest
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
            'Z' => 'required',
            'comments' => 'string|nullable',
            'total' => 'required',
            'total_corresponsal' => 'required',
            'total_pesos_cash' => 'required',
            'total_pesos_credit' => 'required',
            'total_pesos_debit' => 'required',
            'total_pesos_card' => 'required',
            'income_id' => 'required',
        ];
    }
}