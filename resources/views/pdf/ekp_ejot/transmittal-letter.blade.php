@extends('layouts.pdf')

@section('content')
    <x-excursion.transmittal.header :date="$excursion->hmera_diavivastikou?->format('d-m-Y')" :protocol="$excursion->ar_prot_sxoleiou" />

    <x-excursion.transmittal.school-details :school-name="$excursion->school->displayname" :phone-numbers="$excursion->school->phonenumbers" :email="$excursion->school->email" class="details" />

    @php
        $hmera_ekdromis = $excursion->hmera_ekdromis_anaxorisis?->format('d-m-Y');
        $hmera_epistrofis = $excursion->hmera_epistrofis?->format('d-m-Y');
    @endphp
    <p class="center title">ΔΙΑΒΙΒΑΣΤΙΚΟ
    <p>
    <p class="title">ΘΕΜΑ: Έγκριση μετακίνησης μαθητών/τριών και εκπαιδευτικών
        με προορισμό: <i>{{ $excursion->proorismos }}</i> στο πλαίσιο του αναλυτικού προγράμματος του άρθρου 3 &sect; 2.</p>

    <p class="indent justify">
        Σύμφωνα με το αρ. 16 της Υ.Α. 20883/ΓΔ4/12-02-2020 (ΦΕΚ 456/τ.Β'/13-02-2020), σας
        διαβιβάζουμε την αίτηση μαζί με τα απαραίτητα δικαιολογητικά σχετικά με την έγκριση
        της μετακίνησης μαθητών/τριών και εκπαιδευτικών του σχολείου μας με
        προορισμό: <i>{{ $excursion->proorismos }}</i>,
        @if ($hmera_ekdromis !== $hmera_epistrofis)
            από <b>{{ $hmera_ekdromis }}</b> έως <b>{{ $hmera_epistrofis }}</b>
        @else
            στις <b>{{ $hmera_ekdromis }}</b>
        @endif
        στο πλαίσιο του αναλυτικού προγράμματος του άρθρου 3 &sect; 2.
    </p>

    <p class="indent justify">
        Ο/Η Διευθυντής/ντρια του σχολείου και ο Σύλλογος Διδασκόντων <u>εισηγούμαστε</u> για την πραγματοποίησή της.
    </p>
    <p class="indent">
        Παρακαλούμε για τις δικές σας ενέργειες.
    </p>

    <x-excursion.transmittal.signature :title="$excursion->prosfonisi_ypografonta" :name="$excursion->onoma_ypografonta" class="signature" />
@endsection
