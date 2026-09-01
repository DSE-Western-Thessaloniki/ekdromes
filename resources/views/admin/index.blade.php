@extends('layouts.app')

@section('title', 'Διαχείριση - Πίνακας Εκδρομών')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-coral text-white px-6 py-4">
                <h3 class="text-2xl font-semibold">Διαχείριση Εκδρομών</h3>
                <p class="text-coral-light mt-1">Σχολικό έτος: {{ $currentYear->sxoliko_etos }}</p>
            </div>
        </div>

        <!-- Selected School Info -->
        @if ($selectedSchool)
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
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
        @endif

        <!-- Excursions Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gray-100 px-6 py-4 border-b">
                <h4 class="font-semibold text-lg">Λίστα Εκδρομών (σύνολο: {{ $allExcursions->count() }})</h4>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full" id="ekdromesTable">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="px-4 py-3 text-left text-sm font-semibold">αα</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Σχολείο</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Αρ. Πρωτ. Σχολείου</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Είδος Εκδρομής</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Κατάσταση</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Ημερομηνία Υποβολής</th>
                            <th class="px-4 py-3 text-center text-sm font-semibold">Ενέργειες</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allExcursions as $index => $excursion)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <form action="{{ route('admin.select-school') }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="school_code"
                                            value="{{ $excursion->school->kodikos_sxoleiou }}">
                                        <button type="submit" class="text-coral hover:underline font-medium">
                                            {{ $excursion->school->displayname }}
                                        </button>
                                    </form>
                                </td>
                                <td class="px-4 py-3 text-sm">{{ $excursion->ar_prot_sxoleiou ?? '-' }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <span title="{{ $excursion->eidos_ekdromis }}" class="truncate block">
                                        {{ \Illuminate\Support\Str::limit($excursion->eidos_ekdromis, 30) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    @if ($excursion->isSubmitted())
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-semibold">
                                            ΥΠΟΒΛΗΘΗΚΕ ({{ $excursion->ar_prot }})
                                        </span>
                                    @elseif($excursion->isDraft())
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs font-semibold">
                                            ΠΡΟΣΧΕΔΙΟ
                                        </span>
                                    @else
                                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs font-semibold">
                                            {{ $excursion->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $excursion->submit_datetime ? $excursion->submit_datetime->format('d-m-Y H:i') : '-' }}
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
                                <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                    Δεν υπάρχουν εκδρομές για το τρέχον σχολικό έτος
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .bg-coral {
            background-color: #FF7A59;
        }

        .bg-coral-dark {
            background-color: #E85C35;
        }

        .text-coral {
            color: #FF7A59;
        }

        .text-coral-light {
            color: #FFB3A1;
        }
    </style>
@endsection
