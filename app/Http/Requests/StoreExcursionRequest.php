<?php

namespace App\Http\Requests;

use App\Services\ExcursionService;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreExcursionRequest extends FormRequest
{
    public function __construct(public ExcursionService $excursionService) {}

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

        $rules += [
            'paratiriseis' => ['string', 'nullable'],
            'diarkeia_hmeres' => ['numeric', 'nullable'],
            'a_arithmos' => ['numeric', 'nullable'],
            'ar_prajis_syllogou' => ['string', 'nullable'],
            'ar_pr_egrisis_programmatosdde' => ['string', 'nullable'],
            'eidos_programmatos' => ['string', 'nullable'],
            'titlos_programmatos' => ['string', 'nullable'],
            'mathimata' => ['string', 'nullable'],
            'tmimata' => ['string', 'nullable'],
            'proorismos' => ['string', 'nullable'],
            'onoma_jenodoxeio' => ['string', 'nullable'],
            'onoma_praktoreio' => ['string', 'nullable'],
            'metaforika_mesa' => ['string', 'nullable'],
            'onoma_praktoreio' => ['string', 'nullable'],
            'metaforika_mesa' => ['string', 'nullable'],
            'aritmoi_mesa_anaxorisis' => ['string', 'nullable'], // Δεν χρησιμοποιείται σε φόρμα
            'arithmoi_mesa_epistrofis' => ['string', 'nullable'], // Δεν χρησιμοποιείται σε φόρμα
            'hmera_ekdromis_anaxorisis' => ['date', 'nullable'],
            'hmera_epistrofis' => ['date', 'nullable'],
            'ora_anaxorisis' => ['date', 'nullable'],
            'ora_afijis' => ['date', 'nullable'],
            'ora_apoxorisis' => ['date', 'nullable'],
            'ora_epistrofis' => ['date', 'nullable'],
            'ar_mathiton' => ['integer', 'nullable'],
            'ar_metakinoumenon' => ['integer', 'nullable'],
            'onoma_arxigos' => ['string', 'nullable'],
            'onoma_anaplirotis_arxigos' => ['string', 'nullable'],
            'plithos_synodoi' => ['integer', 'nullable'],
            'plithos_ektosomadas_synodoi' => ['integer', 'nullable'],
            'onomata_synodoi' => ['string', 'nullable'],
            'anaplirotes_synodoi' => ['string', 'nullable'],
            'asf_symbolaio' => ['string', 'nullable'],
            'praji_epilogi_praktoreiou' => ['string', 'nullable'],
            'ar_pr_anartisisprok' => ['string', 'nullable'],
            'onoma_ypografonta' => ['string', 'nullable'],
            'prosfonisi_ypografonta' => ['string', 'nullable'],
            'ar_prot_sxoleiou' => ['string', 'nullable'],
            'hmera_diavivastikou' => ['date', 'nullable'],
            'erasmus_ar_simbasis' => ['string', 'nullable'],
            'erasmus_ar_prajis_syllogou_sigrotisi' => ['string', 'nullable'],
            'erasmus_ar_prajis_syllogou_anasigrotisi' => ['string', 'nullable'],
            'erasmus_ar_prajis_syllogon_sinainesi' => ['string', 'nullable'],
            'erasmus_ar_prot_beb_dieythinton' => ['string', 'nullable'],
            'erasmus_lista_mathites_kaitaji' => ['string', 'nullable'],
            'erasmus_lista_kathig_kaieidikotita' => ['string', 'nullable'],
            'erasmus_lista_anaplirkathig_kaieid' => ['string', 'nullable'],
        ];

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'eidos_ekdromis' => 'είδος εκδρομής',
        ];
    }
}
