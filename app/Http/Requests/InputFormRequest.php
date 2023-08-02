<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        //assume that all inputs have the same validation rules
        $dynamicRules = [];

        foreach ($this->all() as $key => $value) {
            //skip csrf token
            if ($key === '_token') {
                continue;
            }

            $dynamicRules[$key] = 'required|numeric';
        }

        return $dynamicRules;
    }

}
