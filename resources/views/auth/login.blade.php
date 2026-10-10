<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Εκδρομές - Σύνδεση</title>
    @vite(['resources/css/app.css'])
</head>

<body class="font-sans min-h-screen flex items-center justify-center">
    <main class="w-full max-w-md px-4 py-8 sm:px-6">
        <section class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-xl shadow-brand/10">
            <div class="relative overflow-hidden bg-gradient-to-br from-brand via-brand to-sky-800 px-6 py-8 text-center text-white sm:px-10">
                <div class="absolute -right-8 -top-12 h-40 w-40 rounded-full border-[24px] border-white/10"
                    aria-hidden="true"></div>
                <div class="relative mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl border border-white/20 bg-white/10 text-3xl text-sky-100 shadow-inner">
                    <i class="fas fa-plane-departure" aria-hidden="true"></i>
                </div>
                <p class="relative mb-2 text-xs font-semibold uppercase tracking-[0.2em] text-sky-100">Υπηρεσία σχολικών μετακινήσεων</p>
                <h1 class="relative text-3xl font-bold tracking-tight">Εκδρομές</h1>
            </div>

            <div class="p-6 text-center sm:p-8">
                <p class="mb-7 text-sm leading-6 text-gray-600">
                Διεύθυνση Δευτεροβάθμιας Εκπαίδευσης<br>
                Δυτικού Τομέα Θεσσαλονίκης
                </p>

                @if (session('error'))
                    <div class="mb-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-left text-sm text-red-800"
                        role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="inline-flex min-h-12 w-full items-center justify-center gap-3 rounded-lg bg-brand px-5 py-3 text-base font-semibold text-white shadow-md shadow-brand/20 transition-colors hover:bg-brand-dark focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand">
                        <i class="fas fa-sign-in-alt" aria-hidden="true"></i> Σύνδεση μέσω ΠΣΔ
                    </button>
                </form>

                <div class="mt-7 border-t border-gray-100 pt-5 text-xs leading-5 text-gray-500">
                    <p>&copy; {{ date('Y') }} Τμήμα Πληροφορικής - ΔΔΕ ΔΥΤ Θεσσαλονίκης</p>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
