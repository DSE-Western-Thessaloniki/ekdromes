@if ($IKnowWhatIAmDoing ?? false)
    <x-layouts.form :isEdit="false" :fieldMap="$fieldMap" :excursionType="$excursionType">
        <x-slot:title>
            Επεξεργασία Εκδρομής
        </x-slot>

        <x-dynamic-component :component="$form" mode="create" :fieldMap="$fieldMap" />
    </x-layouts.form>
@else
    <x-layouts.app>
        <x-slot:title>
            Νέα Εκδρομή
        </x-slot>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col items-center justify-center space-y-4">
                    <h1 class="text-2xl font-bold mb-4">Νέα εκδρομή</h1>
                    <div class="flex flex-col space-y-2">
                        <p>Επιλέξτε για προσθήκη νέας εκδρομής:</p>
                        <a href="{{ route('excursion.wizard') }}"
                            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Α. Εκκίνηση οδηγού
                            βήμα-βήμα
                            για
                            επιλογή του τύπου εκδρομής</a>
                        <a href="{{ route('excursion.create', ['IKnowWhatIAmDoing' => true]) }}"
                            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Β. Γνωρίζω ήδη τον τύπο
                            της
                            εκδρομής που θα προστεθεί, επιλογή απευθείας από λίστα</a>
                    </div>
                </div>
            </div>
        </div>
    </x-layouts.app>
@endif
