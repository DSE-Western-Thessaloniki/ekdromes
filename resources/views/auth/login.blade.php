<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Εκδρομές - Σύνδεση</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="font-sans bg-gradient-to-b from-white to-coral min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full p-8">
        <div class="bg-white rounded-xl shadow-lg p-10 text-center">
            <img src="{{ asset('icons8-bus-64.png') }}" alt="Logo" class="w-32 mx-auto mb-5">
            <h2 class="text-coral text-2xl font-bold mb-2">Εκδρομές</h2>
            <p class="text-gray-500 mb-8">
                Διεύθυνση Δευτεροβάθμιας Εκπαίδευσης<br>
                Δυτικού Τομέα Θεσσαλονίκης
            </p>

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-coral text-white px-10 py-3 text-lg rounded hover:bg-coral-dark transition-colors">
                    <i class="fas fa-sign-in-alt"></i> Σύνδεση μέσω PSD
                </button>
            </form>

            <div class="mt-8 text-gray-500 text-sm">
                <p>&copy; {{ date('Y') }} Τμήμα Πληροφορικής - ΔΔΕ ΔΥΤ Θεσσαλονίκης</p>
            </div>
        </div>
    </div>
</body>
</html>
