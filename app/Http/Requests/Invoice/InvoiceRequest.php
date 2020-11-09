<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'income_id' => 'required',
            'amount' => 'required',
            'comments' => 'string|nullable',
            'currency' => 'required',
            'type' => 'required',
            'payment' => 'required',
            'number' => 'required',
        ];
    }
}