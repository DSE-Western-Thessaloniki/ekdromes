<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Σχολικές Εκδρομές-Σύνδεση</title>

    @vite(['resources/css/app.css'])
    <link href="{{ asset('js/datatables.min.css') }}" rel="stylesheet">
</head>

<body class="font-sans">

    <p class="text-center mt-4">
        <a href="http://dide-v.thess.sch.gr" title="http://dide-v.thess.sch.gr" class="text-coral hover:underline">
            Διεύθυνση Δευτεροβάθμιας Εκπαίδευσης Δυτικής Θεσσαλονίκης
        </a>
    </p>

    <noscript>
        <div class="text-center text-red-600 font-bold mt-4">
            Δεν είναι ενεργοποιημένη η υποστήριξη javascript!<br>
            Για να συνδεθείτε απαιτείται να είναι ενεργοποιημένη η υποστήριξη javascript.
        </div>
    </noscript>
    @session('error')
        <div class="text-center bg-red-600 text-white font-bold mt-4">
            {{ Session::get('error') }}
        </div>
    @endsession

    <form id="identity" action="{{ route('dashboard') }}" class="flex flex-col items-center mt-8">
        <table class="bg-white">
            <tr>
                <td colspan="2" class="text-center">
                    <img src="{{ Vite::asset('resources/images/icons8-bus.gif') }}" width="128" height="128"
                        class="mx-auto">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <h4 class="text-lg">Σχολικές Εκδρομές</h4>
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <u>Απαιτείται πιστοποίηση χρήστη:</u><br>
                    Χρησιμοποιήστε το λογαριασμό του σχολείου στο<br>
                    Πανελλήνιο Σχολικό Δίκτυο για να συνδεθείτε
                </td>
            </tr>
        </table>
        <p class="mt-4">
            <input type="submit" value="Σύνδεση" name="submitButton" id="submitButton"
                class="text-lg px-6 py-2 bg-coral text-white rounded hover:bg-coral-dark cursor-pointer">
        </p>
        <br>
    </form>

    <p class="text-center mt-4 text-sm text-gray-500">
        Εάν η εφαρμογή δεν αποκρίνεται, δοκιμάστε λίγα λεπτά αργότερα.<br>
        Εάν αντιμετωπίσετε κάποιο πρόβλημα επικοινωνήστε με το τμήμα Πληροφορικής της Δ/νσης
    </p>

    <p class="text-center mt-4 text-xs text-gray-400">
        <em>Τμήμα Πληροφορικής ΔΔΕ Δυτ. Θεσσαλονίκης &copy; 2023-{{ date('Y') }}</em>
    </p>
</body>

</html>
