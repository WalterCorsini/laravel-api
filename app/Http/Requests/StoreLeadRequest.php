<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'          => ['required','string','min:3','max:30'],
            'lastname'      => ['required','string','min:3','max:30'],
            'email'         => ['required','email'],
            'phone_number'  => ['required','integer','min:9'],
            'message'       => ['required','string','min:30','max:65535'],
        ];
    }

    public function messages()
    {
        return [
            'required'              => 'Il campo :attribute è vuoto',
            'min'                   => 'devi inserire un minimo di :min caratteri',
            'max'                   => 'devi inserire un massimo di :min caratteri',
            'integer'               => 'il telefono non puo avere caratteri. solo numeri',
            'email'                 => 'il campo email non è corretto',
        ];
    }
}
