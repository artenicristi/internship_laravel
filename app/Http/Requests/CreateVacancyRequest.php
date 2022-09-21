<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;

class CreateVacancyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string:255',
            'content' => 'required|string:255',
            'location' => 'required|string:255',
            'image' => 'required|nullable|string:255',
            'type' => 'required|in:part-time,full-time',
            'imageTest' => '',
            'company_id' => 'required|exists:'.Company::class.',id',
            'category_id' => 'required|exists:'.Category::class.',id',
        ];
    }
}
