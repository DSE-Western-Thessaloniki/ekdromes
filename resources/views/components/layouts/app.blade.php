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
    <nav class="bg-brand shadow-lg" x-data="{ open: false }">
        <div class="mx-auto max-w-7xl px-3 sm:px-4">
            <div class="flex min-h-16 items-center justify-between gap-2 py-2 sm:gap-4 sm:py-0">
                <div class="flex min-w-0 flex-1 items-center">
                    <a href="{{ route('dashboard') }}"
                        class="flex shrink-0 items-center text-base font-bold text-white sm:text-lg">
                        <i class="fas fa-plane-departure mr-3 text-2xl text-sky-100" aria-hidden="true"></i>
                        Σχ. Εκδρομές
                    </a>
                    <span class="relative flex min-w-0 items-center truncate ps-2 text-xs sm:text-sm"
                        x-data="{ open: false }" @click.outside="open = false">
                        <i class="fas fa-graduation-cap"></i>
                        @if ($isAdmin)
                            <button type="button" @click="open = !open" aria-controls="school-year-menu"
                                :aria-expanded="open.toString()"
                                class="rounded-sm text-brand-light underline hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                                {{ $currentYear['sxoliko_etos'] ?? '' }}
                            </button>
                            <div id="school-year-menu" x-show="open" x-transition
                                class="absolute left-0 top-full z-20 mt-2 max-w-[calc(100vw-2rem)] rounded-md border border-gray-200 bg-white p-3 shadow-lg">
                                <form method="POST" action="{{ route('admin.session-switch-year') }}">
                                    @csrf
                                    <label for="school-year-select" class="sr-only">Επιλέξτε σχολικό έτος</label>
                                    <select id="school-year-select" name="year_id" @change="$el.form.submit()"
                                        class="rounded border border-gray-300 px-3 py-2 text-gray-900 focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand">
                                        @foreach ($schoolYears as $schoolYear)
                                            <option value="{{ $schoolYear->id }}" @selected($schoolYear->id === ($currentYear['id'] ?? null))>
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
                    <button type="button" @click="open = !open" aria-controls="mobile-navigation"
                        :aria-expanded="open.toString()" :aria-label="open ? 'Κλείσιμο μενού' : 'Άνοιγμα μενού'"
                        class="inline-flex min-h-11 min-w-11 shrink-0 items-center justify-center rounded-md text-white transition-colors hover:bg-white/10 hover:text-brand-light focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>

                <!-- Desktop menu -->
                <div class="hidden md:flex items-center space-x-4">
                    @session('cas_model_category')
                        <a href="{{ Session::get('cas_model_category') === 'user' ? route('admin.index') : route('dashboard') }}"
                            class="text-white hover:text-brand-light px-3 py-2 rounded-md text-sm font-medium"><i
                                class="fas fa-home mr-2"></i>Αρχική</a>
                        <a href="{{ route('info') }}"
                            class="flex min-h-11 items-center rounded-md px-3 py-2 text-base font-medium text-white hover:bg-white/10 hover:text-brand-light focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"><i
                                class="fas fa-info-circle mr-2"></i>Οδηγίες</a>
                        @if ($isAdmin)
                            @if ($selectedSchool)
                                <a href="{{ route('excursion.create') }}"
                                    class="text-white hover:text-brand-light px-3 py-2 rounded-md text-sm font-medium"><i
                                        class="fas fa-plus-circle mr-2"></i>Νέα
                                    Εκδρομή</a>
                            @endif
                        @else
                            <a href="{{ route('excursion.create') }}"
                                class="text-white hover:text-brand-light px-3 py-2 rounded-md text-sm font-medium"><i
                                    class="fas fa-plus-circle mr-2"></i>Νέα
                                Εκδρομή</a>
                        @endif
                    @endsession
                </div>

                <div class="relative hidden items-center md:flex" x-data="{ accountMenuOpen: false }"
                    @click.outside="accountMenuOpen = false" @keydown.escape.window="accountMenuOpen = false">
                    @session('cas_model_category')
                        @php
                            $accountName = $isAdmin
                                ? Session::get('user')?->name ?? 'Διαχειριστής'
                                : $currentSchool?->displayname ?? 'Σχολική μονάδα';
                        @endphp
                        <button type="button" @click="accountMenuOpen = !accountMenuOpen"
                            aria-controls="desktop-account-menu" :aria-expanded="accountMenuOpen.toString()"
                            class="inline-flex min-h-11 max-w-56 items-center gap-2 rounded-md px-3 py-2 text-sm font-medium text-white transition-colors hover:bg-white/10 hover:text-brand-light focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                            <i class="fas fa-user-circle shrink-0 text-lg" aria-hidden="true"></i>
                            <span class="truncate">{{ $accountName }}</span>
                            <i class="fas fa-chevron-down shrink-0 text-xs transition-transform"
                                :class="{ 'rotate-180': accountMenuOpen }" aria-hidden="true"></i>
                        </button>
                        <div id="desktop-account-menu" x-cloak x-show="accountMenuOpen" x-transition
                            class="absolute right-0 top-full z-30 mt-2 w-60 origin-top-right rounded-lg border border-gray-200 bg-white py-2 text-gray-700 shadow-xl"
                            role="menu" aria-label="Μενού λογαριασμού">
                            <div
                                class="truncate border-b border-gray-100 px-4 py-2 text-xs font-semibold uppercase tracking-wide text-gray-500">
                                {{ $accountName }}
                            </div>
                            @if ($isAdmin)
                                <a href="{{ route('admin.option.index') }}" role="menuitem"
                                    class="flex min-h-11 items-center gap-3 px-4 py-2 text-sm transition-colors hover:bg-blue-50 hover:text-brand focus-visible:bg-blue-50 focus-visible:outline-none">
                                    <i class="fas fa-cogs w-4 text-center text-brand" aria-hidden="true"></i>
                                    Ρυθμίσεις
                                </a>
                                <a href="{{ route('admin.schools') }}" role="menuitem"
                                    class="flex min-h-11 items-center gap-3 px-4 py-2 text-sm transition-colors hover:bg-blue-50 hover:text-brand focus-visible:bg-blue-50 focus-visible:outline-none">
                                    <i class="fas fa-school w-4 text-center text-brand" aria-hidden="true"></i>
                                    Σχολικές μονάδες
                                </a>
                                <a href="{{ route('admin.users.index') }}" role="menuitem"
                                    class="flex min-h-11 items-center gap-3 px-4 py-2 text-sm transition-colors hover:bg-blue-50 hover:text-brand focus-visible:bg-blue-50 focus-visible:outline-none">
                                    <i class="fas fa-users w-4 text-center text-brand" aria-hidden="true"></i>
                                    Διαχειριστές
                                </a>
                            @endif
                            <div class="my-1 border-t border-gray-100"></div>
                            <a href="{{ route('logout') }}" role="menuitem"
                                class="flex min-h-11 items-center gap-3 px-4 py-2 text-sm text-red-700 transition-colors hover:bg-red-50 focus-visible:bg-red-50 focus-visible:outline-none">
                                <i class="fas fa-sign-out-alt w-4 text-center" aria-hidden="true"></i>
                                Αποσύνδεση
                            </a>
                        </div>
                    @endsession
                </div>
            </div>

            <!-- Mobile menu -->
            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2" id="mobile-navigation"
                class="md:hidden space-y-1 pb-4" @click.away="open = false">
                @session('cas_model_category')
                    <a href="{{ Session::get('cas_model_category') === 'user' ? route('admin.index') : route('dashboard') }}"
                        class="block text-white hover:text-brand-light px-3 py-2 rounded-md text-base font-medium"><i
                            class="fas fa-home mr-2"></i>Αρχική</a>
                    <a href="{{ route('info') }}"
                        class="text-white hover:text-brand-light px-3 py-2 rounded-md text-sm font-medium"><i
                            class="fas fa-info-circle mr-2"></i>Οδηγίες</a>
                    @if ($isAdmin)
                        <a href="{{ route('admin.schools') }}"
                            class="flex min-h-11 items-center rounded-md px-3 py-2 text-base font-medium text-white hover:bg-white/10 hover:text-brand-light focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                            <i class="fas fa-school mr-2"></i>Σχολικές μονάδες
                        </a>
                        <a href="{{ route('admin.users.index') }}"
                            class="flex min-h-11 items-center rounded-md px-3 py-2 text-base font-medium text-white hover:bg-white/10 hover:text-brand-light focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                            <i class="fas fa-users mr-2"></i>Διαχειριστές
                        </a>
                    @endif
                    <a href="{{ route('excursion.create') }}"
                        class="flex min-h-11 items-center rounded-md px-3 py-2 text-base font-medium text-white hover:bg-white/10 hover:text-brand-light focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"><i
                            class="fas fa-plus-circle mr-2"></i>Νέα
                        Εκδρομή</a>
                    <div class="border-t border-white/20 my-2"></div>
                    <span class="block break-words px-3 py-2 text-sm text-white/80">
                        {{ $currentYear['sxoliko_etos'] ?? '' }}
                        @if ($currentSchool ?? null)
                            - {{ $currentSchool->displayname }}
                        @endif
                    </span>
                    <a href="{{ route('logout') }}"
                        class="flex min-h-11 items-center rounded-md px-3 py-2 text-base font-medium text-white hover:bg-white/10 hover:text-brand-light focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                        <i class="fas fa-sign-out-alt"></i> Αποσύνδεση
                    </a>
                @endsession
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="mx-auto min-h-[calc(100vh-180px)] max-w-7xl px-3 py-5 sm:px-4 sm:py-6">
        <!-- Selected School Info -->
        @if ($selectedSchool ?? false)
            <div class="my-4 rounded-lg border border-blue-200 bg-blue-50 p-4">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div class="min-w-0">
                        <h4 class="font-semibold text-blue-900">Επιλεγμένο Σχολείο</h4>
                        <p class="text-blue-800">{{ $selectedSchool->displayname }}</p>
                    </div>
                    <form action="{{ route('admin.clear-school') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="inline-flex min-h-11 w-full items-center justify-center rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-red-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-700 sm:w-auto">
                            Καθαρισμός Επιλογής
                        </button>
                    </form>
                </div>
            </div>
        @elseif (Session::get('cas_model_category') === 'user')
            <div class="my-4 rounded-lg border border-amber-300 bg-amber-100 p-4">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h4 class="font-semibold text-amber-950">Δεν έχετε επιλέξει σχολείο</h4>
                        <p class="text-amber-900">Παρακαλώ επιλέξτε ένα σχολείο αν θέλετε να καταχωρήσετε εκδρομή.</p>
                        <form action="{{ route('admin.select-school') }}" method="POST">
                            @csrf
                            <select id="school-select" name="school_id" onchange="this.form.submit()"
                                class="mt-2 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent">
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
                <button @click="show = false"
                    class="absolute top-2 right-2 text-green-700 hover:text-green-900 cursor-pointer">
                    <i class="fas fa-times"></i>
                </button>
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div x-data="{ show: true }" x-show="show" x-transition
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <button @click="show = false"
                    class="absolute top-2 right-2 text-red-700 hover:text-red-900 cursor-pointer">
                    <i class="fas fa-times"></i>
                </button>
                {{ session('error') }}
            </div>
        @endif

        @if (session('errors'))
            <div x-data="{ show: true }" x-show="show" x-transition
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <button @click="show = false"
                    class="absolute top-2 right-2 text-red-700 hover:text-red-900 cursor-pointer">
                    <i class="fas fa-times"></i>
                </button>
                <ul>
                    @foreach (session('errors')->default->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-brand text-white py-4 text-center">
        <div class="max-w-7xl mx-auto px-4">
            <p>&copy; {{ date('Y') }} Τμήμα Πληροφορικής - ΔΔΕ ΔΥΤ Θεσσαλονίκης</p>
        </div>
    </footer>

    {{ $scripts ?? '' }}
</body>

</html>
