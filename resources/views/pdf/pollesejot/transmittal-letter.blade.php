@extends('layouts.pdf')

@section('content')
    <x-excursion.transmittal.header :date="$excursion->hmera_diavivastikou?->format('d-m-Y')" :protocol="$excursion->ar_prot_sxoleiou" />

    <x-excursion.transmittal.school-details :school-name="$excursion->school->displayname" :phone-numbers="$excursion->school->phonenumbers" :email="$excursion->school->email" class="details" />

    <p class="center title">ΔΙΑΒΙΒΑΣΤΙΚΟ
    <p>
    <p class="title">ΘΕΜΑ: Έγκριση πολυήμερης εκπαιδευτικής εκδρομής μαθητών/τριών και εκπαιδευτικών με το άρθρο 2 &sect; 5
        με προορισμό: {{ $excursion->proorismos }}</p>

    <p class="body-copy">
        Σύμφωνα με το αρ. 16 της Υ.Α. 20883/ΓΔ4/12-02-2020 ΦΕΚ 456/τ.Β'/13-02-2020), σας
        διαβιβάζουμε την αίτηση μαζί με τα απαραίτητα δικαιολογητικά σχετικά με την έγκριση
        της πολυήμερης εκπαιδευτικής εκδρομής μαθητών/τριών και εκπαιδευτικών του σχολείου μας
        με προορισμό: <i>{{ $excursion->proorismos }}</i>,
        από:<i>{{ $excursion->hmera_ekdromis_anaxorisis?->format('d-m-Y') }}</i>
        εώς: <i>{{ $excursion->hmera_epistrofis?->format('d-m-Y') }}</i>
    </p>

    <p>
        Ο/Η Διευθυντής/ντρια του σχολείου και ο Σύλλογος Διδασκόντων <u>εισηγούμαστε</u> για την πραγματοποίησή της.
    </p>
    <p>
        Παρακαλούμε για τις δικές σας ενέργειες.
    </p>

    <x-excursion.transmittal.signature :title="$excursion->prosfonisi_ypografonta" :name="$excursion->onoma_ypografonta" class="signature" />
@endsection
