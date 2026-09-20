<x-layouts.app>
    <x-slot:title>
        Εκδρομές {{ $school->displayname }}
    </x-slot:title>

    <div class="space-y-6">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-coral text-white px-6 py-4">
                <h3 class="text-2xl font-semibold">Εκδρομές: {{ $school->displayname }}</h3>
                <p class="text-coral-light mt-1">Σχολικό έτος: {{ $currentYear->sxoliko_etos }}</p>
            </div>
        </div>

        <!-- School Info -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gray-100 px-6 py-4 border-b">
                <h4 class="font-semibold">Στοιχεία Σχολείου</h4>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Όνομα Σχολείου</p>
                        <p class="text-lg font-semibold">{{ $school->displayname }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Κωδικός Σχολείου</p>
                        <p class="text-lg font-semibold">{{ $school->kodikos_sxoleiou }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Τηλέφωνο</p>
                        <p class="text-lg font-semibold">{{ $school->phonenumbers }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Email</p>
                        <p class="text-lg font-semibold">{{ $school->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Excursions Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gray-100 px-6 py-4 border-b">
                <h4 class="font-semibold text-lg">Λίστα Εκδρομών (σύνολο: {{ $excursions->count() }})</h4>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="px-4 py-3 text-left text-sm font-semibold">αα</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Είδος Εκδρομής</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Προορισμός</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Αρ. Μαθητών</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Κατάσταση</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Αρ. Πρωτ.</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Ημερομηνία</th>
                            <th class="px-4 py-3 text-center text-sm font-semibold">Ενέργειες</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($excursions as $index => $excursion)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <span title="{{ $excursion->eidos_ekdromis }}" class="truncate block">
                                        {{ \Illuminate\Support\Str::limit($excursion->eidos_ekdromis, 20) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">{{ $excursion->proorismos ?? '-' }}</td>
                                <td class="px-4 py-3 text-sm">{{ $excursion->ar_mathiton ?? '-' }}</td>
                                <td class="px-4 py-3 text-sm">
                                    @if ($excursion->isSubmitted())
                                        <span
                                            class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-semibold">
                                            ΥΠΟΒΛΗΘΗΚΕ
                                        </span>
                                    @elseif($excursion->isDraft())
                                        <span
                                            class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs font-semibold">
                                            ΠΡΟΣΧΕΔΙΟ
                                        </span>
                                    @else
                                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs font-semibold">
                                            {{ $excursion->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm">{{ $excursion->ar_prot ?? '-' }}</td>
                                <td class="px-4 py-3 text-sm">
                                    @if ($excursion->submit_datetime)
                                        {{ $excursion->submit_datetime->format('d-m-Y') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-center">
                                    <a href="{{ route('excursion.edit', $excursion) }}"
                                        class="text-blue-500 hover:text-blue-700 font-medium">
                                        Προβολή
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                                    Δεν υπάρχουν εκδρομές για αυτό το σχολείο
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Back Link -->
        <div class="text-center">
            <a href="{{ route('admin.index') }}" class="text-coral hover:underline font-medium">
                ← Επιστροφή στη Διαχείριση
            </a>
        </div>
    </div>

    <style>
        .bg-coral {
            background-color: #FF7A59;
        }

        .text-coral {
            color: #FF7A59;
        }

        .text-coral-light {
            color: #FFB3A1;
        }
    </style>
</x-layouts.app>
