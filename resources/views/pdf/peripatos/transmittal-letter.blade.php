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

    <p class="indent">
        Σύμφωνα με το άρθρο 16 της Υ.Α. 109113/ΓΔ4/19-8-2026, (ΦΕΚ 5237/τ.Β'/19-08-2026) και την πράξη
        <strong>{{ $excursion->ar_prajis_syllogou }}</strong> του Συλλόγου Διδασκόντων/ουσών σας ενημερώνουμε ότι:
    </p>

    <ol>
        <li>Οι μαθητές/τριες του σχολείου μας πρόκειται να πραγματοποιήσουν περίπατο
            του άρθρου <b>4</b> στο: <b>{{ $excursion->proorismos }}</b>, στις
            <b>{{ $excursion->hmera_ekdromis_anaxorisis?->format('d-m-Y') }}</b> με ώρα
            αναχώρησης {{ $excursion->ora_anaxorisis }} και επιστροφής {{ $excursion->ora_epistrofis }}.<br>
            Στόχοι:
            <ul>
                @foreach ($excursion->stoxoi ?? [] as $stoxos)
                    <li>{{ $stoxos }}</li>
                @endforeach
            </ul>
        </li>
        <li>Αρχηγός μετακίνησης: {{ $excursion->onoma_arxigos }}</li>
        @if ($excursion->onomata_synodoi)
            <li>Συνοδοί:
                <ul>
                    @foreach (explode("\n", $excursion->onomata_synodoi) as $synodos)
                        <li>{{ $synodos }}</li>
                    @endforeach
                </ul>
            </li>
        @else
            <li>Συνοδοί όλοι/ες οι διδάσκοντες/ουσες εκπαιδευτικοί</li>
        @endif
        <li>Πρόκειται για τον <b>{{ $excursion->a_arithmos }}ο</b> περίπατο για το τρέχον σχ. έτος</li>
        <li>Έχει ολοκληρωθεί όλη η προβλεπόμενη διαδικασία και έχουν τηρηθεί όλα τα αναφερόμενα της ανωτέρω Υ.Α.</li>
    </ol>

    <x-excursion.transmittal.signature :title="$excursion->prosfonisi_ypografonta" :name="$excursion->onoma_ypografonta" class="signature" />
@endsection
