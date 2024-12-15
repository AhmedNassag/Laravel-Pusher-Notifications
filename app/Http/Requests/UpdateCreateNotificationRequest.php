<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCreateNotificationRequest extends FormRequest
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
            'content' => 'required|string',
            'photo'   => 'nullable|file|mimes:png,jpg,jpeg',
        ];
    }


    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'content.required' => trans('validation.required'),
            'content.string'   => trans('validation.string'),
            'photo.nullable'   => trans('validation.nullable'),
            'photo.file'       => trans('validation.file'),
            'photo.mimes'      => trans('validation.mimes'),
        ];
    }
}
