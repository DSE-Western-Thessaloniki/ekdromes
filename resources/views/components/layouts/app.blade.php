<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Εκδρομές - ΔΔΕ Δυτ. Θεσσαλονίκης' }}</title>

    @routes
    @vite(['resources/css/app.css', 'resources/ts/app.ts'])

    {{ $styles ?? '' }}
</head>

<body class="font-sans">
    <!-- Navigation -->
    <nav class="bg-coral shadow-lg" x-data="{ open: false }">
        <div class="mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center text-white font-bold text-lg">
                        <img src="{{ Vite::asset('resources/images/icons8-bus-64.png') }}" alt="Logo"
                            class="h-10 mr-3">
                        Σχ. Εκδρομές
                    </a>
                    <span class="relative ps-2 flex items-center" x-data="{ open: false }" @click.outside="open = false">
                        <i class="fas fa-graduation-cap"></i>
                        @if ($isAdmin)
                            <button type="button" @click="open = !open"
                                class="text-blue-600 underline hover:text-coral-light">
                                {{ $currentYear['sxoliko_etos'] ?? '' }}
                            </button>
                            <div x-show="open" x-transition
                                class="absolute z-10 mt-2 rounded-md bg-white p-3 shadow-lg">
                                <form method="POST" action="{{ route('admin.session-switch-year') }}">
                                    @csrf
                                    <label for="school-year-select" class="sr-only">Επιλέξτε σχολικό έτος</label>
                                    <select id="school-year-select" name="year_id" @change="$el.form.submit()"
                                        class="rounded border border-gray-300 px-3 py-2 text-gray-900 focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral">
                                        @foreach ($schoolYears as $schoolYear)
                                            <option value="{{ $schoolYear->id }}" @selected($schoolYear->id === $currentYear['id'])>
                                                {{ $schoolYear->sxoliko_etos }} @if ($schoolYear->is_current)
                                                    (τρέχον)
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        @else
                            {{ $currentYear['sxoliko_etos'] ?? '' }}
                            - {{ $currentSchool?->displayname }}
                        @endif
                    </span>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button @click="open = !open" class="text-white hover:text-coral-light p-2">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>

                <!-- Desktop menu -->
                <div class="hidden md:flex items-center space-x-4">
                    @session('cas_model_category')
                        <a href="{{ Session::get('cas_model_category') === 'user' ? route('admin.index') : route('dashboard') }}"
                            class="text-white hover:text-coral-light px-3 py-2 rounded-md text-sm font-medium"><i
                                class="fas fa-home mr-2"></i>Αρχική</a>
                        <a href="{{ route('info') }}"
                            class="text-white hover:text-coral-light px-3 py-2 rounded-md text-sm font-medium"><i
                                class="fas fa-info-circle mr-2"></i>Οδηγίες</a>
                        @if ($isAdmin)
                            <a href="{{ route('admin.option.index') }}"
                                class="text-white hover:text-coral-light px-3 py-2 rounded-md text-sm font-medium"><i
                                    class="fas fa-cogs mr-2"></i>Ρυθμίσεις</a>

                            @if ($selectedSchool)
                                <a href="{{ route('excursion.create') }}"
                                    class="text-white hover:text-coral-light px-3 py-2 rounded-md text-sm font-medium"><i
                                        class="fas fa-plus-circle mr-2"></i>Νέα
                                    Εκδρομή</a>
                            @endif
                        @else
                            <a href="{{ route('excursion.create') }}"
                                class="text-white hover:text-coral-light px-3 py-2 rounded-md text-sm font-medium"><i
                                    class="fas fa-plus-circle mr-2"></i>Νέα
                                Εκδρομή</a>
                        @endif
                    @endsession
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    @session('cas_model_category')
                        <a href="{{ route('logout') }}"
                            class="text-white hover:text-coral-light px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-sign-out-alt"></i> Αποσύνδεση
                        </a>
                    @endsession
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
                @session('cas_model_category')
                    <a href="{{ Session::get('cas_model_category') === 'user' ? route('admin.index') : route('dashboard') }}"
                        class="block text-white hover:text-coral-light px-3 py-2 rounded-md text-base font-medium"><i
                            class="fas fa-home mr-2"></i>Αρχική</a>
                    <a href="{{ route('info') }}"
                        class="text-white hover:text-coral-light px-3 py-2 rounded-md text-sm font-medium"><i
                            class="fas fa-info-circle mr-2"></i>Οδηγίες</a>
                    <a href="{{ route('excursion.create') }}"
                        class="block text-white hover:text-coral-light px-3 py-2 rounded-md text-base font-medium"><i
                            class="fas fa-plus-circle mr-2"></i>Νέα
                        Εκδρομή</a>
                    <div class="border-t border-white/20 my-2"></div>
                    <span class="block text-white/80 px-3 py-2 text-sm">
                        {{ $currentYear['sxoliko_etos'] ?? '' }}
                        @if ($currentSchool ?? null)
                            - {{ $currentSchool->displayname }}
                        @endif
                    </span>
                    <a href="{{ route('logout') }}"
                        class="block text-white hover:text-coral-light px-3 py-2 rounded-md text-base font-medium">
                        <i class="fas fa-sign-out-alt"></i> Αποσύνδεση
                    </a>
                @endsession
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="mx-auto px-4 py-6 min-h-[calc(100vh-180px)]">
        <!-- Selected School Info -->
        @if ($selectedSchool ?? false)
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 my-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h4 class="font-semibold text-blue-900">Επιλεγμένο Σχολείο</h4>
                        <p class="text-blue-800">{{ $selectedSchool->displayname }}</p>
                    </div>
                    <form action="{{ route('admin.clear-school') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600 text-sm">
                            Καθαρισμός Επιλογής
                        </button>
                    </form>
                </div>
            </div>
        @elseif (Session::get('cas_model_category') === 'user')
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 my-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h4 class="font-semibold text-yellow-900">Δεν έχετε επιλέξει σχολείο</h4>
                        <p class="text-yellow-800">Παρακαλώ επιλέξτε ένα σχολείο αν θέλετε να καταχωρήσετε εκδρομή.</p>
                        <form action="{{ route('admin.select-school') }}" method="POST">
                            @csrf
                            <select id="school-select" name="school_id" onchange="this.form.submit()"
                                class="mt-2 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent">
                                <option>-- Επιλέξτε Σχολείο --</option>
                                @foreach ($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->displayname }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        @endif

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

        {{ $slot }}
    </div>

    <!-- Footer -->
    <footer class="bg-coral text-white py-4 text-center">
        <div class="max-w-7xl mx-auto px-4">
            <p>&copy; {{ date('Y') }} Τμήμα Πληροφορικής - ΔΔΕ ΔΥΤ Θεσσαλονίκης</p>
        </div>
    </footer>

    {{ $scripts ?? '' }}
</body>

</html>
