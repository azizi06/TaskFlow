<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'due_date'    => ['nullable', 'date', 'after_or_equal:today'],
            'priority'    => ['required', 'in:basse,moyenne,haute'],
            'status'      => ['sometimes', 'in:a_faire,en_cours,terminee'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'    => 'Le titre est obligatoire.',
            'priority.required' => 'La priorité est obligatoire.',
            'priority.in'       => 'La priorité doit être : basse, moyenne ou haute.',
            'due_date.after_or_equal' => 'La date limite ne peut pas être dans le passé.',
        ];
    }
}