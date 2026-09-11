<!doctype html>
<html lang="el">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Δεν μπορεί να μεταφερθεί σε ξεχωριστό αρχείο γιατί το dompdf δεν το
  διαβάζει με τίποτα. Κράτησε το στυλ εδώ μέσα -->
    <style>
        @page {
            margin: 12mm 15mm;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 0.8em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            vertical-align: top;
        }

        .header-left {
            text-align: center;
        }

        .header-right {
            width: 45%;
            padding-top: 8mm;
        }

        .center {
            text-align: center;
        }

        .justify {
            text-align: justify;
        }

        .details {
            margin-top: 8mm;
        }

        .title {
            font-weight: bold;
        }

        .indent {
            text-indent: 1.25em;
        }

        .signature {
            margin-top: 16mm;
            text-align: center;
        }

        .lh-1.5 {
            line-height: 150%;
        }

        .page-break {
            page-break-after: always;
        }

        .w-50 {
            width: 50%;
        }
    </style>

</head>

<body>
    @yield('content')
</body>

</html>
