<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Excursion extends Model
{
    protected $fillable = [
        'school_year_id',
        'school_id',
        'kodikos_sxoleiou',
        'ar_prot',
        'submit_datetime',
        'status',
        'eidos_ekdromis',
        'paratiriseis',
        'diarkeia_hmeres',
        'a_arithmos',
        'ar_prajis_syllogou',
        'ar_pr_egrisis_programmatosdde',
        'eidos_programmatos',
        'titlos_programmatos',
        'mathimata',
        'tmimata',
        'proorismos',
        'onoma_jenodoxeio',
        'onoma_praktoreio',
        'metaforika_mesa',
        'aritmoi_mesa_anaxorisis',
        'arithmoi_mesa_epistrofis',
        'hmera_ekdromis_anaxorisis',
        'hmera_epistrofis',
        'ora_anaxorisis',
        'ora_afijis',
        'ora_apoxorisis',
        'ora_epistrofis',
        'ar_mathiton',
        'ar_metakinoumenon',
        'onoma_arxigos',
        'onoma_anaplirotis_arxigos',
        'plithos_synodoi',
        'plithos_ektosomadas_synodoi',
        'onomata_synodoi',
        'anaplirotes_synodoi',
        'asf_symbolaio',
        'praji_epilogi_praktoreiou',
        'ar_pr_anartisisprok',
        'onoma_ypografonta',
        'prosfonisi_ypografonta',
        'ar_prot_sxoleiou',
        'hmera_diavivastikou',
        'erasmus_ar_simbasis',
        'erasmus_ar_prajis_syllogou_sigrotisi',
        'erasmus_ar_prajis_syllogou_anasigrotisi',
        'erasmus_ar_prajis_syllogon_sinainesi',
        'erasmus_ar_prot_beb_dieythinton',
        'erasmus_lista_mathites_kaitaji',
        'erasmus_lista_kathig_kaieidikotita',
        'erasmus_lista_anaplirkathig_kaieid',
    ];

    protected $casts = [
        'submit_datetime' => 'datetime',
        'hmera_ekdromis_anaxorisis' => 'date',
        'hmera_epistrofis' => 'date',
        'hmera_diavivastikou' => 'date',
        'ar_mathiton' => 'integer',
        'ar_metakinoumenon' => 'integer',
        'plithos_synodoi' => 'integer',
        'plithos_ektosomadas_synodoi' => 'integer',
    ];

    public function schoolYear(): BelongsTo
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function scopeForYear($query, SchoolYear $year)
    {
        return $query->where('school_year_id', $year->id);
    }

    public function scopeForSchool($query, School $school)
    {
        return $query->where('school_id', $school->id);
    }

    public function scopeByStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    public function isDraft(): bool
    {
        return $this->status === 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ';
    }

    public function isSubmitted(): bool
    {
        return $this->status === 'ΥΠΟΒΛΗΘΗΚΕ';
    }

    public function hasProtocol(): bool
    {
        return !empty($this->ar_prot);
    }
}
