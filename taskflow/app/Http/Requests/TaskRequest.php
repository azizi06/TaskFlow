<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date',
            'priority'    => 'required|in:basse,moyenne,haute',
            'status'      => 'required|in:a_faire,en_cours,terminee',
            'category_id' => 'nullable|exists:categories,id',
        ];
    }
}