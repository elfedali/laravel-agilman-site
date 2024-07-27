<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SprintStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'project_id' => ['required', 'integer', 'exists:projects,id'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            // 'status' => ['required', 'string', 'max:10'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'expected_end_date' => ['required', 'date'],
        ];
    }
}
