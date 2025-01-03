<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CropDiagnosisRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Set to true if authorization is not needed
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'expert_id' => 'nullable|integer',
            'crop_id' => 'required|integer',
            'crop_category_id' => 'required|integer',
            'infected_crop_part' => 'required|integer',
            'problem_title' => 'required|string',
            'problem_description' => 'required|string',
            'image' => 'required|image|max:3072',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'expert_id.integer' => 'Expert id must be an integer.',
            'crop_id.required' => 'Crop id is required.',
            'crop_id.integer' => 'Crop id must be an integer.',
            'crop_category_id.required' => 'Crop category id is required.',
            'crop_category_id.integer' => 'Crop category id must be an integer.',
            'infected_crop_part.required' => 'Infected crop part is required.',
            'infected_crop_part.integer' => 'Infected crop part must be a integer.',
            'problem_title.required' => 'Problem title is required.',
            'problem_title.string' => 'Problem title must be a string.',
            'problem_description.required' => 'Problem description is required.',
            'problem_description.string' => 'Problem description must be a string.',
            'image.required' => 'Image is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.max' => 'The image size must not exceed 3 MB.',
        ];
    }
}
