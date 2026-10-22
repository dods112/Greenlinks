<?php

namespace App\Http\Requests;

use App\Models\EnvironmentalReport;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEnvironmentalReportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', EnvironmentalReport::class);
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:150'],
            'category' => ['required', Rule::in(array_keys(config('greenlink.categories')))],
            'short_description' => ['required', 'string', 'max:255'],
            'detailed_description' => ['required', 'string', 'min:20', 'max:5000'],
            'barangay' => ['required', Rule::in(config('greenlink.barangays'))],
            'location_text' => ['required', 'string', 'max:255'],
            'date_observed' => ['required', 'date', 'before_or_equal:today'],
        ];
    }
}