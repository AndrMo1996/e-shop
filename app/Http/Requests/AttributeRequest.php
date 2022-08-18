<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
        $rules = [
            'code' => 'required|min:3|unique:categories,code',
            'title' => 'required|min:3|max:255'
        ];

        if ($this->route()->named('attribute.update')){
            $rules['code'] .= ',' . $this->route()->parameter('attribute')->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Обовязкове поле: :attribute',
            'code.min' => 'Поле має бути більшим за :min'
        ];
    }
}
