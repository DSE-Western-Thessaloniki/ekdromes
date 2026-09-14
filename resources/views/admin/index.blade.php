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

        <!-- Excursions Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gray-100 px-6 py-4 border-b">
                <h4 class="font-semibold text-lg">Λίστα Εκδρομών</h4>
            </div>
            <div>
                <table class="cell-border" id="ekdromesTable" data-url="{{ $apiUrl }}"
                    data-selected-school-id="{{ $selectedSchoolId }}">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="px-4 py-3 text-left text-sm font-semibold" data-col="index">αα</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold" data-col="school.displayname">Σχολείο</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold" data-col="ar_prot_sxoleiou">Αρ. Πρωτ.</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold" data-col="eidos_ekdromis">Είδος Εκδρομής
                            </th>
                            <th class="px-4 py-3 text-left text-sm font-semibold" data-col="status">Κατάσταση</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold" data-col="submit_datetime">Παρατηρήσεις
                            </th>
                            <th class="px-4 py-3 text-left text-sm font-semibold" data-col="submit_datetime">Ημερομηνία
                                Υποβολής</th>
                            <th class="px-4 py-3 text-center text-sm font-semibold" data-col="actions">Ενέργειες</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
