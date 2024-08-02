<?php

namespace App\Http\Requests;

use App\Models\Sprint;
use Illuminate\Foundation\Http\FormRequest;

class SprintUpdateRequest extends FormRequest
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
            // 'project_id' => ['required', 'integer', 'exists:projects,id'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'status' => ['required', 'string', 'max:10', 'in:todo,doing,done'],
            'start_date' => ['required', 'date'],
            'duration' => ['required', 'integer'],
            'priority' => ['required', 'string', 'max:10', 'in:low,medium,high'],
            'type' => ['required', 'string', 'max:10', 'in:feature,bug,task'],
            'parent_id' => ['nullable', 'integer', 'exists:sprints,id'],

        ];
    }
}
