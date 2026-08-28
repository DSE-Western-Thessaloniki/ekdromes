<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Ekdromes - DDE DYT Thessalonikis')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="{{ asset('js/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/dropzone5.min.css') }}" rel="stylesheet">

    @yield('styles')
</head>

<body class="font-sans">
    <!-- Navigation -->
    <nav class="bg-coral shadow-lg" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center text-white font-bold text-lg">
                        <img src="{{ Vite::asset('resources/images/icons8-bus-64.png') }}" alt="Logo"
                            class="h-10 mr-3">
                        Εκδρομές - ΔΔΕ ΔΥΤ Θεσσαλονίκης
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button @click="open = !open" class="text-white hover:text-coral-light p-2">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>

                <!-- Desktop menu -->
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="text-white hover:text-coral-light px-3 py-2 rounded-md text-sm font-medium">Αρχική</a>
                        <a href="{{ route('excursion.create') }}"
                            class="text-white hover:text-coral-light px-3 py-2 rounded-md text-sm font-medium">Νέα
                            Εκδρομή</a>
                        @if ($isAdmin ?? false)
                            <a href="{{ route('admin.index') }}"
                                class="text-white hover:text-coral-light px-3 py-2 rounded-md text-sm font-medium">Διαχείριση</a>
                        @endif
                    @endauth
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        <span class="text-white text-sm">
                            {{ $currentYear->sxoliko_etos ?? '' }}
                            @if ($currentSchool ?? null)
                                - {{ $currentSchool->displayname }}
                            @endif
                        </span>
                        <a href="{{ route('logout') }}"
                            class="text-white hover:text-coral-light px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-sign-out-alt"></i> Αποσύνδεση
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Mobile menu -->
            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2" class="md:hidden pb-4"
                @click.away="open = false">
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="block text-white hover:text-coral-light px-3 py-2 rounded-md text-base font-medium">Αρχική</a>
                    <a href="{{ route('excursion.create') }}"
                        class="block text-white hover:text-coral-light px-3 py-2 rounded-md text-base font-medium">Νέα
                        Εκδρομή</a>
                    @if ($isAdmin ?? false)
                        <a href="{{ route('admin.index') }}"
                            class="block text-white hover:text-coral-light px-3 py-2 rounded-md text-base font-medium">Διαχείριση</a>
                    @endif
                    <div class="border-t border-white/20 my-2"></div>
                    <span class="block text-white/80 px-3 py-2 text-sm">
                        {{ $currentYear->sxoliko_etos ?? '' }}
                        @if ($currentSchool ?? null)
                            - {{ $currentSchool->displayname }}
                        @endif
                    </span>
                    <a href="{{ route('logout') }}"
                        class="block text-white hover:text-coral-light px-3 py-2 rounded-md text-base font-medium">
                        <i class="fas fa-sign-out-alt"></i> Αποσύνδεση
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-6 min-h-[calc(100vh-180px)]">
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <button @click="show = false" class="absolute top-2 right-2 text-green-700 hover:text-green-900">
                    <i class="fas fa-times"></i>
                </button>
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div x-data="{ show: true }" x-show="show" x-transition
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <button @click="show = false" class="absolute top-2 right-2 text-red-700 hover:text-red-900">
                    <i class="fas fa-times"></i>
                </button>
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-coral text-white py-4 text-center">
        <div class="max-w-7xl mx-auto px-4">
            <p>&copy; {{ date('Y') }} Τμήμα Πληροφορικής - ΔΔΕ ΔΥΤ Θεσσαλονίκης</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="{{ asset('js/ekdromes_funcs.js') }}"></script>

    @yield('scripts')
</body>

</html>
