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

    <p class="signature">
        {{ $excursion->prosfonisi_ypografonta ?? 'ΝΑ' }}<br><br><br>
        {{ $excursion->onoma_ypografonta ?? 'ΝΑ' }}
    </p>
</body>

</html>
