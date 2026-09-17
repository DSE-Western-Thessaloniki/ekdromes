<?php

namespace App\Http\Requests;

use App\Services\ExcursionFieldMap;
use App\Services\ExcursionService;
use App\Services\SchoolService;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class UpdateExcursionRequest extends FormRequest
{
    public function __construct(public ExcursionService $excursionService, public ExcursionFieldMap $excursionFieldMap) {}

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Session::get('cas_model_category') === 'user') { // Admin
            return true;
        }

        if (SchoolService::getActiveSchool()->id === $this->route('excursion')->school_id) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $excursionTypes = array_keys($this->excursionService->getExcursionTypes());
        $rules = [
            'eidos_ekdromis' => ['string', 'required', Rule::in($excursionTypes)],
        ];

        if (! $this->has('eidos_ekdromis')) {
            return $rules;
        }

        $rules += $this->excursionFieldMap->getBasicValidationRules();

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return $this->excursionFieldMap->attributes();
    }
}
