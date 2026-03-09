<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancieRequest extends FormRequest
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
            'title' => 'required|string|max:255', 
            'description' => 'required|string',
            'contract_type' => 'required|string', 
            'location' => 'required|string', 
            'finish_at' => 'required|date', 
            'image' => 'nullable|image|max:2048', 
        ];
    }
}
