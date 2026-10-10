<x-layouts.app>
    <x-slot:title>
        Αρχική - Εκδρομές
    </x-slot:title>

    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <div class="bg-brand px-5 py-4 text-white sm:px-6">
            <h1 class="text-xl font-semibold">
                Λίστα Εκδρομών - {{ $currentYear->sxoliko_etos }}
            </h1>
        </div>
        <div class="p-4 sm:p-6">
            <div class="overflow-x-auto">
                <table id="excursionsTable" aria-label="Λίστα εκδρομών" class="w-full text-left cell-border dataTable"
                    data-url="{{ $apiUrl }}" data-school-id="{{ $schoolId }}">
                    <thead>
                        <tr class="bg-gray-100">
                            <th scope="col" data-col="index">αα</th>
                            <th scope="col" data-col="eidos_ekdromis">Είδος Εκδρομής</th>
                            <th scope="col" data-col="a_arithmos">αα είδους</th>
                            <th scope="col" data-col="hmera_ekdromis_anaxorisis">Ημ. Εκδρομής</th>
                            <th scope="col" data-col="paratiriseis">Παρατηρήσεις</th>
                            <th scope="col" data-col="submit_datetime">Ημ. υποβολής ή αποθήκευσης</th>
                            <th scope="col" data-col="status">Κατάσταση</th>
                            <th scope="col" data-col="actions">Ενέργειες</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>
