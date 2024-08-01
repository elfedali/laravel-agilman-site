<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Project::class);
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            // 'owner_id' => ['required', 'integer', 'exists:owners,id'],
            'title' => ['required', 'string'],
            'description' => ['string'],
            'status' => ['string', 'max:10'],
        ];
    }
}
