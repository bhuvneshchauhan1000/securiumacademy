<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Authorization is handled by the CoursePolicy in the controller.
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_featured' => $this->boolean('is_featured'),
        ]);
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

            'content' => [
                'nullable',
                'string',
            ],

            'course_category_id' => [
                'required',
                Rule::exists('course_categories', 'id'),
            ],

            'course_level' => [
                'nullable',
                'in:beginner,intermediate,advanced,expert',
            ],

            'duration' => [
                'nullable',
                'string',
                'max:255',
            ],

            'fee' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'discount_fee' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'certification' => [
                'nullable',
                'string',
                'max:255',
            ],

            'certificate_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048',
            ],

            'featured_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'status' => [
                'required',
                'in:draft,published',
            ],

            'is_featured' => [
                'nullable',
                'boolean',
            ],

            'meta_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'meta_description' => [
                'nullable',
                'string',
            ],

            'meta_keywords' => [
                'nullable',
                'string',
                'max:255',
            ],

            'meta_script' => [
                'nullable',
                'string',
            ],

        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {

            /*
            |--------------------------------------------------------------------------
            | Discounted fee must be less than the regular fee
            |--------------------------------------------------------------------------
            */

            $fee = $this->input('fee');
            $discountFee = $this->input('discount_fee');

            if (
                $fee !== null && $fee !== '' &&
                $discountFee !== null && $discountFee !== '' &&
                (float) $discountFee >= (float) $fee
            ) {
                $validator->errors()->add(
                    'discount_fee',
                    __('The discounted fee must be less than the regular fee.')
                );
            }

        });
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => __('The course name is required.'),
            'name.max' => __('The course name may not be greater than :max characters.'),

            'short_description.max' => __('The short description may not be greater than :max characters.'),

            'course_category_id.required' => __('Please select a course category.'),
            'course_category_id.exists' => __('The selected course category is invalid.'),

            'course_level.in' => __('The selected course level is invalid.'),

            'fee.numeric' => __('The regular fee must be a number.'),
            'fee.min' => __('The regular fee must be at least :min.'),

            'discount_fee.numeric' => __('The discounted fee must be a number.'),
            'discount_fee.min' => __('The discounted fee must be at least :min.'),

            'certificate_image.image' => __('The certificate image must be an image.'),
            'certificate_image.mimes' => __('The certificate image must be a file of type: :values.'),
            'certificate_image.max' => __('The certificate image may not be greater than 2MB.'),

            'featured_image.image' => __('The featured image must be an image.'),
            'featured_image.mimes' => __('The featured image must be a file of type: :values.'),
            'featured_image.max' => __('The featured image may not be greater than 2MB.'),

            'status.required' => __('The status field is required.'),
            'status.in' => __('The selected status is invalid.'),

            'meta_title.max' => __('The meta title may not be greater than :max characters.'),
            'meta_keywords.max' => __('The meta keywords may not be greater than :max characters.'),
        ];
    }
}
