<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateJobTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Authorization is handled by the JobTypePolicy in the controller.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('job_types', 'name')->ignore($this->route('jobType')),
            ],

            'description' => [
                'nullable',
                'string',
                'max:255',
            ],

            'status' => [
                'required',
                'in:draft,published',
            ],

        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => __('The job type name is required.'),
            'name.max' => __('The job type name may not be greater than :max characters.'),
            'name.unique' => __('This job type name already exists.'),

            'description.max' => __('The description may not be greater than :max characters.'),

            'status.required' => __('The status field is required.'),
            'status.in' => __('The selected status is invalid.'),
        ];
    }
}
