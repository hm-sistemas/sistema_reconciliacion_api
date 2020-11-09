<?php

namespace App\Http\Requests\Split;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSplitRequest extends FormRequest
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
            'id' => 'required',
            'Z' => 'required',
            'comments' => 'string|nullable',
        ];
    }
}