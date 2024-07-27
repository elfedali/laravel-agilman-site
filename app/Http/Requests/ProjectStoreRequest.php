<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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
            // 'owner_id' => ['required', 'integer', 'exists:owners,id'],
            'title' => ['required', 'string'],
            'description' => ['string'],
            'status' => ['string', 'max:10'],
        ];
    }
}
