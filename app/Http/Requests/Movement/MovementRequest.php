<?php

namespace App\Http\Requests\Movement;

use Illuminate\Foundation\Http\FormRequest;

class MovementRequest extends FormRequest
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
            'description' => 'string',
            'process_date_time' => 'required',
            'type' => 'required',
            'card_number' => 'required',
        ];
    }
}