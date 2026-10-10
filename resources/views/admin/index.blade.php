<x-layouts.app>
    <x-slot:title>
        Διαχείριση - Πίνακας Εκδρομών
    </x-slot:title>

    <div class="space-y-6">
        <!-- Header -->
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <div class="bg-brand px-5 py-4 text-white sm:px-6">
                <h1 class="text-2xl font-semibold">Διαχείριση Εκδρομών</h1>
                <p class="mt-1 text-sm text-brand-light">Σχολικό έτος: {{ $currentYear->sxoliko_etos }}</p>
            </div>
        </div>

        <!-- Excursions Table -->
        <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <div class="border-b border-gray-200 bg-white px-5 py-4 sm:px-6">
                <h2 class="text-lg font-semibold text-gray-900">Λίστα Εκδρομών</h2>
            </div>
            <div class="overflow-x-auto p-4 sm:p-6">
                <table class="w-full cell-border" aria-label="Λίστα όλων των εκδρομών" id="ekdromesTable" data-url="{{ $apiUrl }}"
                    data-selected-school-id="{{ $selectedSchoolId }}">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th scope="col" data-col="index">αα</th>
                            <th scope="col" data-col="school.displayname">Σχολείο
                            </th>
                            <th scope="col" data-col="ar_prot_sxoleiou">Αρ. Πρωτ.
                            </th>
                            <th scope="col" data-col="eidos_ekdromis">Είδος
                                Εκδρομής
                            </th>
                            <th scope="col" data-col="status">Κατάσταση</th>
                            <th scope="col" data-col="submit_datetime">
                                Παρατηρήσεις
                            </th>
                            <th scope="col" data-col="submit_datetime">Ημερομηνία
                                Υποβολής</th>
                            <th scope="col" data-col="actions">Ενέργειες</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </section>
        </div>
    </div>

</x-layouts.app>
