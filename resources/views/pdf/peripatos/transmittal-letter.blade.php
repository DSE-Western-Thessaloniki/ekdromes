@extends('layouts.pdf')

@section('content')
    <x-excursion.transmittal.header :date="$excursion->hmera_diavivastikou?->format('d-m-Y')" :protocol="$excursion->ar_prot_sxoleiou" />

    <x-excursion.transmittal.school-details :school-name="$excursion->school->displayname" :phone-numbers="$excursion->school->phonenumbers" :email="$excursion->school->email" class="details" />

    <p class="center title">Ε Ν Η Μ Ε Ρ Ω Σ Η<br>
        ΓΙΑ ΠΡΑΓΜΑΤΟΠΟΙΗΣΗ ΕΚΔΡΟΜΗΣ<br>
        @if ($excursion->metaforika_mesa)
            ΜΕ ΜΕΤΑΦΟΡΙΚΟ ΜΕΣΟ {{ $excursion->metaforika_mesa }}
        @else
            ΠΕΖΗ
        @endif
    </p>

    <p class="body-copy">
        Σύμφωνα με το άρθρο 17 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β'/13-02-2020) και την πράξη
        <strong>{{ $excursion->ar_prajis_syllogou ?? '' }}</strong> του Συλλόγου Διδασκόντων/ουσών σας ενημερώνουμε ότι:
    </p>

    <ol>
        <li>Οι μαθητές/τριες του σχολείου μας πρόκειται να πραγματοποιήσουν περίπατο<br>
            του άρθρου 1 με τον εξής προορισμό: <b>{{ $excursion->proorismos }}</b>, στις
            <b>{{ $excursion->hmera_ekdromis_anaxorisis?->format('d-m-Y') }}</b>
        </li>
        <li>Πρόκειται για τον <b>{{ $excursion->a_arithmos ?? '' }}ο</b> περίπατο για το τρέχον σχ. έτος</li>
        <li>Έχει ολοκληρωθεί όλη η προβλεπόμενη διαδικασία</li>
        <li>Έχουν τηρηθεί όλα τα αναφερόμενα της ανωτέρω Υ.Α.</li>
    </ol>

    <x-excursion.transmittal.signature :title="$excursion->prosfonisi_ypografonta" :name="$excursion->onoma_ypografonta" class="signature" />
@endsection
