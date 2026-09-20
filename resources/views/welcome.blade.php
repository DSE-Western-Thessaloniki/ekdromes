<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Σχολικές Εκδρομές-Σύνδεση</title>

    @vite(['resources/css/app.css'])
</head>

<body class="font-sans">

    <p class="text-center mt-4">
        <a href="https://srv-dide-v.thess.sch.gr" title="https://srv-dide-v.thess.sch.gr"
            class="text-coral hover:underline">
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

    <form id="identity" action="{{ route('dashboard') }}" class="flex flex-col items-center gap-4">
        <div class="flex flex-col bg-white py-8 px-16 rounded-lg shadow-lg my-8">
            <div class="text-center">
                <img src="{{ Vite::asset('resources/images/icons8-bus.gif') }}" width="128" height="128"
                    class="mx-auto">
            </div>
            <div class="text-center py-4">
                <h4 class="text-lg">Σχολικές Εκδρομές</h4>
            </div>
            <div class="text-center">
                <u>Απαιτείται πιστοποίηση χρήστη:</u><br>
                Χρησιμοποιήστε το λογαριασμό του σχολείου στο<br>
                Πανελλήνιο Σχολικό Δίκτυο για να συνδεθείτε
            </div>
        </div>
        @php
            $notes = App\Models\Option::where('name', 'login_notes')->first() ?? '';
        @endphp
        @if ($notes)
            <div class="bg-amber-300 border-2 border-coral p-4 rounded-2xl shadow-2xl max-w-2xl text-center">
                {{ $notes->value }}
            </div>
        @endif
        <p class="mt-4">
            <input type="submit" value="Σύνδεση" name="submitButton" id="submitButton"
                class="text-lg px-6 py-2 bg-coral text-white rounded hover:bg-coral-dark cursor-pointer">
        </p>
        <br>
    </form>

    <p class="text-center text-xs text-gray-500 fixed bottom-0 w-full mb-2">
        <em>Τμήμα Πληροφορικής ΔΔΕ Δυτ. Θεσσαλονίκης &copy; 2023-{{ date('Y') }}</em>
    </p>
</body>

</html>
