@if ($IKnowWhatIAmDoing ?? false)
    <x-layouts.form :isEdit="false" :fieldMap="$fieldMap" :excursionType="$excursionType" :signerName="$signerName">
        <x-slot:title>
            Δημιουργία Εκδρομής
        </x-slot>

        <x-dynamic-component :component="$form" mode="create" :fieldMap="$fieldMap" :excursionType="$excursionType" />
    </x-layouts.form>
@else
    <x-layouts.app>
        <x-slot:title>
            Νέα Εκδρομή
        </x-slot>

        <div class="mx-auto max-w-3xl">
            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                <div class="flex flex-col items-stretch gap-4 p-5 sm:p-8">
                    <h1 class="text-2xl font-bold text-gray-900">Νέα εκδρομή</h1>
                    <div class="space-y-2 text-gray-700">
                        <p>Επιλέξτε για προσθήκη νέας εκδρομής:</p>
                        <a href="{{ route('excursion.wizard') }}"
                            class="inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-lg bg-brand px-4 py-3 font-medium text-white transition-colors hover:bg-brand-dark focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand">Α. Εκκίνηση οδηγού
                            βήμα-βήμα
                            για
                            επιλογή του τύπου εκδρομής</a>
                        <a href="{{ route('excursion.create', ['IKnowWhatIAmDoing' => true]) }}"
                            class="inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-lg border border-brand px-4 py-3 text-center font-medium text-brand transition-colors hover:bg-brand hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand">Β. Γνωρίζω ήδη τον τύπο
                            της
                            εκδρομής που θα προστεθεί, επιλογή απευθείας από λίστα</a>
                    </div>
                </div>
            </div>
        </div>
    </x-layouts.app>
@endif
