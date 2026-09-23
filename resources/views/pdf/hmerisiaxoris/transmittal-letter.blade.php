@extends('layouts.pdf')

@section('content')
    <x-excursion.transmittal.header :date="$excursion->hmera_diavivastikou?->format('d-m-Y')" :protocol="$excursion->ar_prot_sxoleiou" />

    <x-excursion.transmittal.school-details :school-name="$excursion->school->displayname" :phone-numbers="$excursion->school->phonenumbers" :email="$excursion->school->email" class="details" />

    <p class="center title">Ε Ν Η Μ Ε Ρ Ω Σ Η<br>
        ΓΙΑ ΠΡΑΓΜΑΤΟΠΟΙΗΣΗ ΗΜΕΡΗΣΙΑΣ ΕΚΠΑΙΔΕΥΤΙΚΗΣ ΕΚΔΡΟΜΗΣ
    </p>

    <p class="indent">
        Σύμφωνα με το άρθρο 16 της Υ.Α. 109113/ΓΔ4/19-8-2026, (ΦΕΚ 5237/τ.Β'/19-08-2026) και την πράξη
        <strong>{{ $excursion->ar_prajis_syllogou }}</strong> του Συλλόγου Διδασκόντων/ουσών σας ενημερώνουμε ότι:
    </p>

    <ol>
        @php
            $plithos_ekp = '';
            if ($excursion->plithos_synodoi) {
                $plithos_ekp = $excursion->plithos_synodoi + 1; // increase one to include leader
            }
        @endphp
        <li><b>{{ $excursion->ar_metakinoumenon }}</b> μαθητές/τριες του σχολείου μας και
            <b>{{ $plithos_ekp }}</b> εκπαιδευτικοί πρόκειται να πραγματοποιήσουν ημερήσια
            εκπαιδευτική εκδρομή του άρθρου <b>8</b> με τον εξής
            προορισμό: <b>{{ $excursion->proorismos }}</b>, στις
            <b>{{ $excursion->hmera_ekdromis_anaxorisis?->format('d-m-Y') }}</b>,
            με ώρα αναχώρησης {{ $excursion->ora_anaxorisis }} και επιστροφής
            {{ $excursion->ora_epistrofis }}.
            Στόχοι:
            <ul>
                @foreach ($excursion->stoxoi ?? [] as $stoxos)
                    <li>{{ $stoxos }}</li>
                @endforeach
            </ul>
        </li>
        <li>Αρχηγός μετακίνησης: {{ $excursion->onoma_arxigos }}</li>
        <li>Συνοδοί:
            <ul>
                @foreach (explode("\n", $excursion->onomata_synodoi) as $synodos)
                    <li>{{ $synodos }}</li>
                @endforeach
            </ul>
        </li>
        <li>Έχει ολοκληρωθεί όλη η προβλεπόμενη διαδικασία και έχουν τηρηθεί όλα τα αναφερόμενα της ανωτέρω Υ.Α.</li>
    </ol>

    <x-excursion.transmittal.signature :title="$excursion->prosfonisi_ypografonta" :name="$excursion->onoma_ypografonta" class="signature" />
@endsection
