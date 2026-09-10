@extends('layouts.pdf')

@section('content')
    <x-excursion.transmittal.header :date="$excursion->hmera_diavivastikou?->format('d-m-Y')" :protocol="$excursion->ar_prot_sxoleiou" />

    <x-excursion.transmittal.school-details :school-name="$excursion->school->displayname" :phone-numbers="$excursion->school->phonenumbers" :email="$excursion->school->email" class="details" />

    <p class="center title">Ε Ν Η Μ Ε Ρ Ω Σ Η<br>
        Για εκπαιδευτική επίσκεψη στο πλαίσιο του αναλυτικού προγράμματος με τον εξής προορισμό:
        <i>{{ $excursion->proorismos }}</i>
    </p>

    <p class="body-copy">
        Σύμφωνα με το άρθρο 17 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β'/13-02-2020) και την πράξη
        <strong>{{ $excursion->ar_prajis_syllogou }}</strong> του Συλλόγου Διδασκόντων/ουσών σας ενημερώνουμε ότι:
    </p>

    <ol>
        @php
            $plithos_ekp = '';
            if ($excursion->plithos_synodoi) {
                $plithos_ekp = $excursion->plithos_synodoi + 1; // increase one to include leader
            }

            $name_katalyma = '';
            if ($excursion->onoma_jenodoxeio !== '') {
                $name_katalyma = "Το όνομα του καταλύματος είναι: {$excursion->onoma_jenodoxeio} <br>";
            }

            $hmera_ekdromis = $excursion->hmera_ekdromis_anaxorisis?->format('d-m-Y');
            $hmera_epistrofis = $excursion->hmera_epistrofis?->format('d-m-Y');
            $hmerominies = "στις <b>$hmera_ekdromis</b>";
            if ($hmera_ekdromis !== $hmera_epistrofis) {
                $hmerominies = "από <b>$hmera_ekdromis</b> έως <b>$hmera_epistrofis</b>";
            }
        @endphp
        <li><b>{{ $excursion->ar_metakinoumenon }}</b> μαθητές και μαθήτριες του
            σχολείου μας των τάξεων/τμημάτων: {{ $excursion->tmimata }} και
            <b>{{ $plithos_ekp }}</b> εκπαιδευτικοί πρόκειται να μετακινηθούν
            με τον εξής προορισμό: <b>{{ $excursion->proorismos }}</b>, {{ $hmerominies }}
            με το Αναλυτικό Πρόγραμμα σχετικά με το/τα μάθημα/ματα:
            <i>{{ $excursion->mathimata }}</i> στο πλαίσιο της παρ. 2 του άρθρου 3.<br>
            Η μετακίνηση θα πραγματοποιηθεί με το/τα εξής μεταφορικό/α μέσο/α:
            {{ $excursion->metaforika_mesa }}.<br>
            {{ $name_katalyma }}
            Το πρακτορείο είναι το εξής: {{ $excursion->onoma_praktoreio }}
        </li>
        <li>Έχει ολοκληρωθεί όλη η προβλεπόμενη διαδικασία</li>
        <li>Έχουν τηρηθεί όλα τα αναφερόμενα της ανωτέρω Υ.Α.</li>
    </ol>

    <x-excursion.transmittal.signature :title="$excursion->prosfonisi_ypografonta" :name="$excursion->onoma_ypografonta" class="signature" />
@endsection
