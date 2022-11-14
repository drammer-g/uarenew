<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class PageForm extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'title'             => 'required|string|max:255',
            'slug'              => [
                'required',
                'string',
                'max:255',
                Rule::unique('pages')->ignore($this['slug'], 'slug')
            ],
            'locale'            => 'required|string|max:255',
            'content'           => 'string',
        ];
    }
}
