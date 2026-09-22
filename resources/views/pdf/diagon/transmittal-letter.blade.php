@extends('layouts.pdf')

@section('content')
    <x-excursion.transmittal.header :date="$excursion->hmera_diavivastikou?->format('d-m-Y')" :protocol="$excursion->ar_prot_sxoleiou" />

    <x-excursion.transmittal.school-details :school-name="$excursion->school->displayname" :phone-numbers="$excursion->school->phonenumbers" :email="$excursion->school->email" class="details" />

    <p class="center title">Ε Ν Η Μ Ε Ρ Ω Σ Η<br>
        Για συμμετοχή μαθητών και μαθητριών στο εξής: {{ $excursion->titlos_programmatos }}
    </p>

    <p class="indent justify">
        Σύμφωνα με το άρθρο 16 της με αρ. Υ.Α. 109113/ΓΔ4/19-8-2026, (ΦΕΚ 5237/τ.Β'/19-08-2026) και την πράξη
        <strong>{{ $excursion->ar_prajis_syllogou }}</strong> του Συλλόγου Διδασκόντων/ουσών σας ενημερώνουμε ότι:
    </p>

    <ol>
        @php
            $plithos_ekp = '';
            if ($excursion->plithos_synodoi) {
                $plithos_ekp = $excursion->plithos_synodoi + 1; // increase one to include leader
            }

            $hmera_ekdromis = $excursion->hmera_ekdromis_anaxorisis?->format('d-m-Y');
            $hmera_epistrofis = $excursion->hmera_epistrofis?->format('d-m-Y');
        @endphp
        <li class="justify"><b>{{ $excursion->ar_metakinoumenon }}</b> μαθητές και μαθήτριες
            του σχολείου μας και <b>{{ $plithos_ekp }}</b> εκπαιδευτικοί πρόκειται
            να μετακινηθούν στο πλαίσιο του άρθρου 9
            με τον εξής προορισμό: <b>{{ $excursion->proorismos }}</b>
            για την εξής εκδήλωση: <b>{{ $excursion->titlos_programmatos }}</b>,
            @if ($excursion->dianyktereush === 'Ναι')
                από <b>{{ $hmera_ekdromis }}</b> έως <b>{{ $hmera_epistrofis }}</b>,
                με ώρα αναχώρησης από Θεσσαλονίκη {{ $excursion->ora_anaxorisis }},
                ώρα άφιξης στον προορισμό {{ $excursion->ora_afijis }}, ώρα
                αναχώρησης για επιστροφή {{ $excursion->ora_apoxorisis }} και ώρα
                άφιξης στη Θεσσαλονίκη {{ $excursion->ora_epistrofis }}.
            @else
                στις <b>{{ $hmera_ekdromis }}</b>, με ώρα αναχώρησης {{ $excursion->ora_anaxorisis }}
                και επιστροφής {{ $excursion->ora_epistrofis }}.
            @endif
            Στόχοι:
            <ul>
                @foreach ($excursion->stoxoi as $stoxos)
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
