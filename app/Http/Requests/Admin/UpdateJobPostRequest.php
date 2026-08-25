<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class UpdateJobPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Authorization is handled by the JobPostPolicy in the controller.
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
            ],

            'short_description' => [
                'nullable',
                'string',
                'max:500',
            ],

            'description' => [
                'required',
                'string',
            ],

            'job_type_id' => [
                'required',
                Rule::exists('job_types', 'id'),
            ],

            'job_category_id' => [
                'required',
                Rule::exists('job_categories', 'id'),
            ],

            'status' => [
                'required',
                'in:draft,published,paused,closed,expired',
            ],

            'is_featured' => ['nullable', 'boolean'],
            'is_urgent' => ['nullable', 'boolean'],
            'is_remote' => ['nullable', 'boolean'],

            'work_mode' => [
                'nullable',
                'in:on_site,remote,hybrid',
            ],

            'experience_level' => [
                'nullable',
                'string',
                'max:255',
            ],

            'min_experience' => [
                'nullable',
                'integer',
                'min:0',
                'lte:max_experience',
            ],

            'max_experience' => [
                'nullable',
                'integer',
                'min:0',
                'gte:min_experience',
            ],

            'education_level' => [
                'nullable',
                'string',
                'max:255',
            ],

            'salary_min' => [
                'nullable',
                'numeric',
                'min:0',
                'lte:salary_max',
            ],

            'salary_max' => [
                'nullable',
                'numeric',
                'min:0',
                'gte:salary_min',
            ],

            'salary_currency' => [
                'nullable',
                'string',
                'size:3',
            ],

            'salary_period' => [
                'nullable',
                'in:hourly,daily,weekly,monthly,yearly',
            ],

            'hide_salary' => ['nullable', 'boolean'],

            'salary_description' => [
                'nullable',
                'string',
                'max:255',
            ],

            'country' => [
                'nullable',
                'string',
                'max:255',
            ],

            'state' => [
                'nullable',
                'string',
                'max:255',
            ],

            'city' => [
                'nullable',
                'string',
                'max:255',
            ],

            'address' => [
                'nullable',
                'string',
                'max:500',
            ],

            'postal_code' => [
                'nullable',
                'string',
                'max:20',
            ],

            'company_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'company_email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'company_phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'company_website' => [
                'nullable',
                'url',
                'max:255',
            ],

            'company_logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048',
            ],

            'application_method' => [
                'required',
                'in:internal,external,email',
            ],

            'application_url' => [
                'nullable',
                'url',
                'max:255',
                'required_if:application_method,external',
            ],

            'application_email' => [
                'nullable',
                'email',
                'max:255',
                'required_if:application_method,email',
            ],

            'application_limit' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'allow_applications' => ['nullable', 'boolean'],

            'published_at' => [
                'nullable',
                'date',
            ],

            'application_start_at' => [
                'nullable',
                'date',
            ],

            'application_deadline' => [
                'nullable',
                'date',
                'after_or_equal:application_start_at',
            ],

            'expires_at' => [
                'nullable',
                'date',
            ],

            'requirements' => ['nullable', 'string'],
            'responsibilities' => ['nullable', 'string'],
            'qualifications' => ['nullable', 'string'],
            'preferred_qualifications' => ['nullable', 'string'],
            'benefits' => ['nullable', 'string'],

            'department' => [
                'nullable',
                'string',
                'max:255',
            ],

            'job_code' => [
                'nullable',
                'string',
                'max:100',
            ],

            'reference_number' => [
                'nullable',
                'string',
                'max:100',
            ],

            'vacancies' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'shift' => [
                'nullable',
                'string',
                'max:100',
            ],

            'working_hours' => [
                'nullable',
                'string',
                'max:100',
            ],

            'industry' => [
                'nullable',
                'string',
                'max:255',
            ],

            'career_level' => [
                'nullable',
                'string',
                'max:255',
            ],

            'meta_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'meta_description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'meta_keywords' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  Validator  $validator
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            if (
                filled($this->input('salary_min')) &&
                filled($this->input('salary_max')) &&
                (float) $this->input('salary_max') < (float) $this->input('salary_min')
            ) {
                $validator->errors()->add(
                    'salary_max',
                    __('The maximum salary must be greater than or equal to the minimum salary.')
                );
            }

            if (
                filled($this->input('min_experience')) &&
                filled($this->input('max_experience')) &&
                (int) $this->input('max_experience') < (int) $this->input('min_experience')
            ) {
                $validator->errors()->add(
                    'max_experience',
                    __('The maximum experience must be greater than or equal to the minimum experience.')
                );
            }
        });
    }
}
