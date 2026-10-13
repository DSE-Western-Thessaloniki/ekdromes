<x-layouts.app>
    <x-slot:title>
        Εκδρομές {{ $school->displayname }}
    </x-slot:title>

    <div class="space-y-6">
        <!-- Header -->
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <div class="bg-brand px-5 py-4 text-white sm:px-6">
                <h1 class="text-2xl font-semibold">Εκδρομές: {{ $school->displayname }}</h1>
                <p class="mt-1 text-sm text-brand-light">Σχολικό έτος: {{ $currentYear->sxoliko_etos }}</p>
            </div>
        </div>

        <!-- School Info -->
        <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
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
                <table class="admin-list-table w-full" aria-label="Εκδρομές σχολικής μονάδας">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th scope="col" class="whitespace-nowrap">αα</th>
                            <th scope="col">Είδος Εκδρομής</th>
                            <th scope="col">Προορισμός</th>
                            <th scope="col" class="whitespace-nowrap">Αρ. Μαθητών</th>
                            <th scope="col">Κατάσταση</th>
                            <th scope="col" class="whitespace-nowrap">Αρ. Πρωτ.</th>
                            <th scope="col" class="whitespace-nowrap">Ημερομηνία</th>
                            <th scope="col" class="text-center">Ενέργειες</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($excursions as $index => $excursion)
                            <tr class="border-b border-gray-100 transition-colors odd:bg-white even:bg-gray-50/50 hover:bg-blue-50">
                                <td class="whitespace-nowrap">{{ $index + 1 }}</td>
                                <td>
                                    <span title="{{ $excursion->eidos_ekdromis }}" class="truncate block">
                                        {{ \Illuminate\Support\Str::limit($excursion->eidos_ekdromis, 20) }}
                                    </span>
                                </td>
                                <td>{{ $excursion->proorismos ?? '-' }}</td>
                                <td class="whitespace-nowrap">{{ $excursion->ar_mathiton ?? '-' }}</td>
                                <td>
                                    @if ($excursion->isSubmitted())
                                        <span
                                            class="inline-flex whitespace-nowrap rounded-full border border-green-200 bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-800">
                                            ΥΠΟΒΛΗΘΗΚΕ
                                        </span>
                                    @elseif($excursion->isDraft())
                                        <span
                                            class="inline-flex whitespace-nowrap rounded-full border border-amber-200 bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-800">
                                            ΠΡΟΣΧΕΔΙΟ
                                        </span>
                                    @else
                                        <span class="inline-flex whitespace-nowrap rounded-full border border-gray-200 bg-gray-100 px-2.5 py-1 text-xs font-semibold text-gray-700">
                                            {{ $excursion->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap">{{ $excursion->ar_prot ?? '-' }}</td>
                                <td class="whitespace-nowrap">
                                    @if ($excursion->submit_datetime)
                                        {{ $excursion->submit_datetime->format('d-m-Y') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('excursion.edit', $excursion) }}"
                                        class="inline-flex items-center justify-center rounded-md border border-brand/20 px-3 py-1.5 text-sm font-medium text-brand transition hover:border-brand hover:bg-brand hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand">
                                        Προβολή
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-10 text-center text-sm text-gray-500">
                                    Δεν υπάρχουν εκδρομές για αυτό το σχολείο
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </section>
        </div>

        <!-- Back Link -->
        <div class="text-center">
            <a href="{{ route('admin.index') }}" class="text-brand hover:underline font-medium">
                ← Επιστροφή στη Διαχείριση
            </a>
        </div>
    </div>

</x-layouts.app>
