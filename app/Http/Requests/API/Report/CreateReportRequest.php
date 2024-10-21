<?php

namespace App\Http\Requests\API\Report;

use Illuminate\Foundation\Http\FormRequest;

class CreateReportRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules()
    {
        return [
            'conditions' => 'required|array',
            'conditions.*.id' => 'required|integer', // ID must be an integer
            'conditions.*.issue' => 'nullable|string', // Issue can be null or a string
            'conditions.*.name' => 'required|string', // Name must be a string
            'conditions.*.value' => 'required|string', // Value must be a string
            'driver' => 'required|integer', // Driver must be an integer
            'status' => 'required|string|in:READY,NOT READY',
            'issue' => 'nullable|string', // Issues must be a string
            'location' => 'required|array',
            'location.lat' => 'required|numeric',
            'location.lng' => 'required|numeric'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'conditions.required' => 'The conditions field is required.',
            'conditions.array' => 'The conditions field must be an array.',
            'conditions.*.id.required' => 'The condition ID is required.',
            'conditions.*.id.integer' => 'The condition ID must be an integer.',
            'conditions.*.issue.string' => 'The issue must be a string.',
            'conditions.*.name.required' => 'The condition name is required.',
            'conditions.*.name.string' => 'The condition name must be a string.',
            'conditions.*.value.required' => 'The condition value is required.',
            'conditions.*.value.string' => 'The condition value must be a string.',
            'driver.required' => 'The driver field is required.',
            'driver.integer' => 'The driver must be an integer.',
            'status.required' => 'The status field is required.',
            'status.string' => 'The status must be a string.',
            'status.in' => 'The status must be either READY or NOT READY.',
            'issues.string' => 'The issues must be a string.',
            'location' => 'The location field is required.',
            'location.lat.required' => 'The latitude field is required.',
            'location.lat.numeric' => 'The latitude must be a numeric value.',
            'location.lng.required' => 'The longitude field is required.',
            'location.lng.numeric' => 'The longitude must be a numeric value.',
        ];
    }
}
