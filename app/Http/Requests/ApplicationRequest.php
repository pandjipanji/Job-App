<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'app_file' => 'required|mimes:pdf|max:1042'
        ];
    }

    public function messages(){
        return [
            'app_file.required' => 'You cant leave this empty',
            'app_file.max' => 'File exceeding the maximum file size required',
            'app_file.mimes' => 'Must be a file of type .pdf'
        ];
    }
}
