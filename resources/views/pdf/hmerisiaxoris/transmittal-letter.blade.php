<!doctype html>
<html lang="el">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @page {
            margin: 18mm 15mm;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11pt;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            vertical-align: top;
        }

        .header-left {
            width: 55%;
            text-align: center;
        }

        .header-right {
            width: 45%;
            padding-top: 8mm;
        }

        .center {
            text-align: center;
        }

        .details {
            margin-top: 8mm;
        }

        .title {
            font-weight: bold;
        }

        .body-copy {
            text-indent: 1em;
        }

        .signature {
            margin-top: 16mm;
            text-align: center;
        }
    </style>
</head>

<body>
    <x-excursion.transmittal.header :date="$excursion->hmera_diavivastikou?->format('d-m-Y')" :protocol="$excursion->ar_prot_sxoleiou" />

    <div class="details">
        <strong>ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:</strong><br>
        Σχολείο: {{ $excursion->school->displayname }}<br>
        Τηλ.: {{ $excursion->school->phonenumbers }}<br>
        email: {{ $excursion->school->email }}
    </div>

    <p class="center title">Ε Ν Η Μ Ε Ρ Ω Σ Η<br>
        ΓΙΑ ΠΡΑΓΜΑΤΟΠΟΙΗΣΗ ΗΜΕΡΗΣΙΑΣ ΕΚΠΑΙΔΕΥΤΙΚΗΣ ΕΚΔΡΟΜΗΣ
    </p>

    <p class="body-copy">
        Σύμφωνα με το άρθρο 17 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β'/13-02-2020) και την πράξη
        <strong>{{ $excursion->ar_prajis_syllogou ?? '' }}</strong> του Συλλόγου Διδασκόντων/ουσών σας ενημερώνουμε ότι:
    </p>

    <ol>
        @php
        if ($excursion->plithos_synodoi) {
        $plithos_ekp = $excursion->plithos_synodoi + 1; // increase one to include leader
        } else {
        $plithos_ekp = '';
        }
        @endif
        <li><b>{{ $excursion->ar_metakinoumenon }}</b> μαθητές/τριες του σχολείου μας και
            <b>$plithos_ekp</b> εκπαιδευτικοί πρόκειται να πραγματοποιήσουν ημερήσια
            εκπαιδευτική εκδρομή του άρθρου 2 παρ.1,2,3,4 με τον εξής
            προορισμό: <b>{{ $excursion->proorismos }}</b>, στις
            <b>{{ $excursion->hmera_ekdromis_anaxorisis?->format('d-m-Y') }}</b>
        </li>
        <li>Η μετακίνηση θα γίνει με το/τα εξής μεταφορικό/α μέσο/α: {{ $excursion->metaforika_mesa }}. Το πρακτορείο
            είναι το εξής: {$excursion->onoma_praktoreio}</li>
        <li>Έχει ολοκληρωθεί όλη η προβλεπόμενη διαδικασία</li>
        <li>Έχουν τηρηθεί όλα τα αναφερόμενα της ανωτέρω Υ.Α.</li>
    </ol>

    <p class="signature">
        {{ $excursion->prosfonisi_ypografonta ?? 'ΝΑ' }}<br><br><br>
        {{ $excursion->onoma_ypografonta ?? 'ΝΑ' }}
    </p>
</body>

</html>
