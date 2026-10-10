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
    <main class="mx-auto flex min-h-screen w-full max-w-3xl flex-col items-center justify-center gap-5 px-4 py-8 sm:px-6">
        <a href="https://srv-dide-v.thess.sch.gr" title="https://srv-dide-v.thess.sch.gr"
            class="text-center text-sm font-medium text-brand hover:underline">
            Διεύθυνση Δευτεροβάθμιας Εκπαίδευσης Δυτικής Θεσσαλονίκης
        </a>

        <noscript>
            <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-center text-sm font-semibold text-red-800">
                Δεν είναι ενεργοποιημένη η υποστήριξη javascript! Για να συνδεθείτε απαιτείται να είναι ενεργοποιημένη η υποστήριξη javascript.
            </div>
        </noscript>
        @session('error')
            <div class="w-full rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-center font-medium text-red-800"
                role="alert">
                {{ Session::get('error') }}
            </div>
        @endsession

        <form id="identity" action="{{ route('dashboard') }}" class="flex w-full flex-col items-center gap-4">
            <section class="w-full max-w-lg overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-xl shadow-brand/10">
                <div class="relative overflow-hidden bg-gradient-to-br from-brand via-brand to-sky-800 px-6 py-8 text-center text-white sm:px-10">
                    <div class="absolute -right-8 -top-12 h-40 w-40 rounded-full border-[24px] border-white/10"
                        aria-hidden="true"></div>
                    <div class="relative mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl border border-white/20 bg-white/10 text-3xl text-sky-100 shadow-inner">
                        <i class="fas fa-plane-departure" aria-hidden="true"></i>
                    </div>
                    <p class="relative mb-2 text-xs font-semibold uppercase tracking-[0.2em] text-sky-100">Υπηρεσία σχολικών μετακινήσεων</p>
                    <h1 class="relative text-2xl font-bold tracking-tight sm:text-3xl">Σχολικές Εκδρομές</h1>
                </div>
                <div class="space-y-5 p-6 text-center sm:p-8">
                    <p class="text-sm leading-6 text-gray-600">
                        Απαιτείται πιστοποίηση χρήστη.<br>
                        Χρησιμοποιήστε τον λογαριασμό του σχολείου στο Πανελλήνιο Σχολικό Δίκτυο για να συνδεθείτε.
                    </p>
                    @php
                        $notes = App\Models\Option::where('name', 'login_notes')->first() ?? '';
                    @endphp
                    @if ($notes && $notes->value)
                        <div class="rounded-lg border border-amber-300 bg-amber-50 p-4 text-sm text-amber-950">
                            {{ $notes->value }}
                        </div>
                    @endif
                    <button type="submit" name="submitButton" id="submitButton" value="Σύνδεση"
                        class="inline-flex min-h-12 w-full items-center justify-center gap-3 rounded-lg bg-brand px-5 py-3 text-base font-semibold text-white shadow-md shadow-brand/20 transition-colors hover:bg-brand-dark focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand">
                        <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                        Σύνδεση μέσω ΠΣΔ
                    </button>
                </div>
            </section>
        </form>
        <p class="text-center text-xs text-gray-500">
            <em>Τμήμα Πληροφορικής ΔΔΕ Δυτ. Θεσσαλονίκης &copy; 2023-{{ date('Y') }}</em>
        </p>
    </main>
</body>

</html>
