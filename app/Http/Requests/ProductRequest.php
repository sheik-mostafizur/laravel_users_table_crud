<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'stroke' => 'required',
            'price' => 'required',
        ];

        // Only require image if it's being uploaded
        if ($this->getMethod() == 'POST' || $this->hasFile('image')) {
            $rules['image'] = 'required|mimes:png,jpg,jpeg,webp|max:3000';
        } else {
            $rules['image'] = 'mimes:png,jpg,jpeg,webp|max:3000';
        }

        return $rules;
    }
}
