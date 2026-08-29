<?php

use App\Services\ExcursionFieldMap;

beforeEach(function () {
    $this->fieldMap = new ExcursionFieldMap;
});

it('returns sections for every registered excursion type', function () {
    $types = [
        'peripatos', 'hmerisiaxoris', 'pollesesjot', 'ekp_esoteriko',
        'ekp_exotiko', 'programma_esoteriko', 'programma_exotiko',
        'europ', 'erasmus1', 'erasmus2', 'adel', 'vouli', 'diagon', 'didaktikes',
    ];

    foreach ($types as $type) {
        $sections = $this->fieldMap->getSections($type);
        expect($sections)->toBeArray()->not->toBeEmpty();
    }
});

it('returns empty array for unknown type', function () {
    $sections = $this->fieldMap->getSections('unknown_type');
    expect($sections)->toBeEmpty();
});

it('includes general fields for peripatos', function () {
    $sections = $this->fieldMap->getSections('peripatos');

    expect($sections)->toHaveKey('general');
    expect($sections['general'])->toHaveKeys(['ar_prajis_syllogou', 'a_arithmos', 'proorismos', 'metaforika_mesa']);
});

it('includes date fields for peripatos with single date', function () {
    $sections = $this->fieldMap->getSections('peripatos');

    expect($sections)->toHaveKey('dates');
    expect($sections['dates'])->toHaveKey('hmera_ekdromis_anaxorisis');
    expect($sections['dates'])->not->toHaveKey('hmera_epistrofis');
});

it('does not include participation section for peripatos', function () {
    $sections = $this->fieldMap->getSections('peripatos');

    expect($sections)->not->toHaveKey('participation');
});

it('includes general fields for hmerisiaxoris', function () {
    $sections = $this->fieldMap->getSections('hmerisiaxoris');

    expect($sections['general'])->toHaveKeys([
        'ar_prajis_syllogou', 'a_arithmos', 'proorismos', 'onoma_praktoreio', 'metaforika_mesa',
    ]);
});

it('includes participation fields for hmerisiaxoris', function () {
    $sections = $this->fieldMap->getSections('hmerisiaxoris');

    expect($sections)->toHaveKey('participation');
    expect($sections['participation'])->toHaveKeys(['ar_mathiton', 'ar_metakinoumenon', 'plithos_synodoi']);
});

it('includes multi-day date fields for pollesesjot', function () {
    $sections = $this->fieldMap->getSections('pollesesjot');

    expect($sections['dates'])->toHaveKeys(['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres']);
});

it('includes onoma_arxigos in participation for pollesesjot', function () {
    $sections = $this->fieldMap->getSections('pollesesjot');

    expect($sections['participation'])->toHaveKey('onoma_arxigos');
});

it('includes all time fields for ekp_exotiko', function () {
    $sections = $this->fieldMap->getSections('ekp_exotiko');

    expect($sections['dates'])->toHaveKeys([
        'hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres',
        'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis',
    ]);
});

it('includes insurance and agency fields for ekp_exotiko', function () {
    $sections = $this->fieldMap->getSections('ekp_exotiko');

    expect($sections['general'])->toHaveKeys(['asf_symbolaio', 'praji_epilogi_praktoreiou', 'ar_pr_anartisisprok']);
});

it('includes program fields for programma_esoteriko', function () {
    $sections = $this->fieldMap->getSections('programma_esoteriko');

    expect($sections['general'])->toHaveKeys([
        'eidos_programmatos', 'titlos_programmatos', 'ar_pr_egrisis_programmatosdde',
    ]);
});

it('includes erasmus-specific fields for erasmus2', function () {
    $sections = $this->fieldMap->getSections('erasmus2');

    expect($sections['general'])->toHaveKeys([
        'erasmus_ar_simbasis', 'erasmus_ar_prajis_syllogou_sigrotisi',
        'erasmus_ar_prajis_syllogou_anasigrotisi', 'erasmus_ar_prajis_syllogon_sinainesi',
        'erasmus_ar_prot_beb_dieythinton',
    ]);
});

it('includes erasmus list fields in participation for erasmus2', function () {
    $sections = $this->fieldMap->getSections('erasmus2');

    expect($sections['participation'])->toHaveKeys([
        'plithos_synodoi', 'onoma_arxigos',
        'erasmus_lista_kathig_kaieidikotita', 'erasmus_lista_anaplirkathig_kaieid',
        'erasmus_lista_mathites_kaitaji',
    ]);
});

it('includes mathimata for ekp_esoteriko general section', function () {
    $sections = $this->fieldMap->getSections('ekp_esoteriko');

    expect($sections['general'])->toHaveKey('mathimata');
});

it('includes tmimata in participation for ekp_esoteriko', function () {
    $sections = $this->fieldMap->getSections('ekp_esoteriko');

    expect($sections['participation'])->toHaveKey('tmimata');
});

it('includes tmimata in participation for didaktikes', function () {
    $sections = $this->fieldMap->getSections('didaktikes');

    expect($sections['participation'])->toHaveKey('tmimata');
});

it('does not include multi-day dates for didaktikes', function () {
    $sections = $this->fieldMap->getSections('didaktikes');

    expect($sections['dates'])->not->toHaveKey('hmera_epistrofis');
    expect($sections['dates'])->not->toHaveKey('diarkeia_hmeres');
});

it('returns signer fields', function () {
    $signerFields = $this->fieldMap->getSignerFields();

    expect($signerFields)->toHaveKeys([
        'prosfonisi_ypografonta', 'onoma_ypografonta', 'ar_prot_sxoleiou', 'hmera_diavivastikou',
    ]);
});

it('returns field definition for known field', function () {
    $def = $this->fieldMap->getFieldDefinition('proorismos');

    expect($def)->not->toBeNull();
    expect($def['label'])->toBe('Προορισμός');
    expect($def['type'])->toBe('text');
});

it('returns null for unknown field', function () {
    $def = $this->fieldMap->getFieldDefinition('nonexistent_field');
    expect($def)->toBeNull();
});

it('returns correct section labels', function () {
    expect($this->fieldMap->getSectionLabel('general'))->toBe('Γενικά');
    expect($this->fieldMap->getSectionLabel('dates'))->toBe('Ημερομηνίες');
    expect($this->fieldMap->getSectionLabel('participation'))->toBe('Συμμετοχές');
});

it('identifies date fields correctly', function () {
    expect($this->fieldMap->isDateField('hmera_ekdromis_anaxorisis'))->toBeTrue();
    expect($this->fieldMap->isDateField('hmera_epistrofis'))->toBeTrue();
    expect($this->fieldMap->isDateField('hmera_diavivastikou'))->toBeTrue();
    expect($this->fieldMap->isDateField('proorismos'))->toBeFalse();
});

it('identifies time fields correctly', function () {
    expect($this->fieldMap->isTimeField('ora_anaxorisis'))->toBeTrue();
    expect($this->fieldMap->isTimeField('ora_epistrofis'))->toBeTrue();
    expect($this->fieldMap->isTimeField('ora_afijis'))->toBeTrue();
    expect($this->fieldMap->isTimeField('ora_apoxorisis'))->toBeTrue();
    expect($this->fieldMap->isTimeField('proorismos'))->toBeFalse();
});

it('checks section existence correctly', function () {
    expect($this->fieldMap->hasSection('peripatos', 'general'))->toBeTrue();
    expect($this->fieldMap->hasSection('peripatos', 'dates'))->toBeTrue();
    expect($this->fieldMap->hasSection('peripatos', 'participation'))->toBeFalse();
    expect($this->fieldMap->hasSection('unknown', 'general'))->toBeFalse();
});

it('returns types with sections mapping', function () {
    $mapping = $this->fieldMap->getTypesWithSections();

    expect($mapping)->toHaveKey('peripatos');
    expect($mapping['peripatos'])->toContain('general');
    expect($mapping['peripatos'])->toContain('dates');
});

it('returns correct required fields for peripatos', function () {
    $required = $this->fieldMap->getRequiredFields('peripatos');

    expect($required)->toContain('proorismos');
    expect($required)->toContain('hmera_ekdromis_anaxorisis');
    expect($required)->toContain('ar_prajis_syllogou');
    expect($required)->toContain('a_arithmos');
});

it('returns correct required fields for hmerisiaxoris', function () {
    $required = $this->fieldMap->getRequiredFields('hmerisiaxoris');

    expect($required)->toContain('ar_mathiton');
    expect($required)->toContain('ar_metakinoumenon');
    expect($required)->toContain('plithos_synodoi');
});

it('returns validation rules for peripatos', function () {
    $rules = $this->fieldMap->getValidationRules('peripatos');

    expect($rules)->toHaveKey('eidos_ekdromis');
    expect($rules)->toHaveKey('proorismos');
    expect($rules)->toHaveKey('hmera_ekdromis_anaxorisis');
    expect($rules)->toHaveKey('ar_prajis_syllogou');
    expect($rules)->toHaveKey('a_arithmos');
});

it('returns validation rules for erasmus2 with erasmus fields', function () {
    $rules = $this->fieldMap->getValidationRules('erasmus2');

    expect($rules)->toHaveKey('erasmus_ar_simbasis');
    expect($rules)->toHaveKey('erasmus_lista_kathig_kaieidikotita');
});

it('makes date fields required in validation rules when applicable', function () {
    $rules = $this->fieldMap->getValidationRules('peripatos');

    expect($rules['hmera_ekdromis_anaxorisis'])->toContain('required');
});

it('makes core participation fields required in validation', function () {
    $rules = $this->fieldMap->getValidationRules('ekp_exotiko');

    expect($rules['ar_metakinoumenon'])->toContain('required');
    expect($rules['plithos_synodoi'])->toContain('required');
});
