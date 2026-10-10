{{-- 
'isEdit' --> αν πρόκειται για επεξεργασία υπάρχουσας εκδρομής ή δημιουργία νέας
'excursion' --> το αντικείμενο της εκδρομής εφόσον πρόκειται για επεξεργασία
'fieldMap' --> ExcursionFieldMap
'excursionType' --> ο τύπος της εκδρομής ως αλφαριθμητικό
'signerName' ---> το αλφαριθμητικό του τελευταίου υπογράφοντα της σχολικής μονάδας
--}}
@props(['isEdit', 'excursion', 'fieldMap', 'excursionType', 'signerName'])

<x-layouts.app>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm" x-data="{ selectedType: '{{ $excursionType ?? '' }}' }">
        <div class="bg-brand text-white px-6 py-4">
            <h3 class="text-xl font-semibold">
                @if ($isEdit)
                    Επεξεργασία Εκδρομής {{ $excursion->id ? ' #' . $excursion->id : '' }}
                    @if ($excursion->hasProtocol())
                        <span class="ml-2 inline-block bg-green-600 text-white text-sm px-2 py-1 rounded-full">Ημερομηνία
                            Υποβολής: {{ $excursion->submit_datetime?->format('d-m-Y H:i') }}</span>
                        <span class="ml-2 inline-block bg-white/20 text-white text-xs px-2 py-1 rounded-full">Πρωτόκολλο:
                            {{ $excursion->ar_prot }}</span>
                    @else
                        <span
                            class="ml-2 inline-block bg-orange-500 text-white text-xs px-2 py-1 rounded-full">Ημερομηνία
                            Αποθήκευσης: {{ $excursion->submit_datetime?->format('d-m-Y H:i') }}</span>
                    @endif
                @else
                    Δημιουργία Νέας Εκδρομής
                @endif
            </h3>
        </div>
        <div class="p-4 sm:p-6 lg:p-8">

            <form action="{{ $isEdit ? route('excursion.update', $excursion) : route('excursion.store') }}" method="POST"
                @if ($isEdit) data-unsaved-changes-form @endif>
                @csrf
                @if ($isEdit)
                    @method('PUT')
                @endif

                @if ($errors->any())
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-red-800" role="alert"
                        aria-labelledby="form-errors-heading">
                        <h4 id="form-errors-heading" class="font-semibold">Παρακαλώ διορθώστε τα παρακάτω:</h4>
                        <ul class="mt-2 list-inside list-disc space-y-1 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <fieldset @if ($isEdit && $excursion->isSubmitted()) disabled @endif class="min-w-0">
                {{-- Type Selector --}}
                <div class="mb-6">
                    <label for="eidos_ekdromis" class="mb-1.5 block text-sm font-medium text-gray-700">Είδος
                        Εκδρομής</label>
                    @if ($isEdit)
                        <input type="text" class="w-full rounded-md border border-gray-300 bg-gray-100 px-3 py-2.5 text-sm shadow-sm"
                            value="{{ old('eidos_ekdromis', $excursion->eidos_ekdromis) }}" readonly>
                        <input type="hidden" name="eidos_ekdromis"
                            value="{{ old('eidos_ekdromis', $excursion->eidos_ekdromis) }}">
                        <div class="block mt-2">Κατάσταση: {{ $excursion->status }}</div>
                    @else
                        <input type="text" class="w-full rounded-md border border-gray-300 bg-gray-100 px-3 py-2.5 text-sm shadow-sm"
                            value="{{ old('eidos_ekdromis', $excursionType) }}" readonly>
                        <input type="hidden" name="eidos_ekdromis"
                            value="{{ old('eidos_ekdromis', $excursionType) }}">
                        {{-- <select name="eidos_ekdromis" id="eidos_ekdromis" x-model="selectedType"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent"
                        required>
                        <option value="">-- Επιλέξτε είδος εκδρομής --</option>
                        @foreach ($types as $key => $type)
                            <option value="{{ $key }}" @selected($excursionType === $key)>{{ $key }}
                            </option>
                        @endforeach
                    </select> --}}
                    @endif
                </div>

                {{ $slot }}

                {{-- Signer / Submission Info --}}
                @php
                    $signerFields = $fieldMap->getSignerFields();
                @endphp
                <section class="mb-6 rounded-xl border border-gray-200 bg-white p-5 shadow-sm sm:p-6">
                    <h4 class="border-b border-gray-100 pb-3 text-lg font-semibold text-brand">Στοιχεία Υποβολής</h4>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-5 pt-4 md:grid-cols-2">
                        @foreach ($signerFields as $fieldName => $fieldDef)
                            <div>
                                @if ($isEdit)
                                    @include('excursion._field-edit', [
                                        'fieldName' => $fieldName,
                                        'fieldDef' => $fieldDef,
                                        'excursion' => $excursion,
                                    ])
                                @else
                                    @include('excursion._field-create', [
                                        'fieldName' => $fieldName,
                                        'fieldDef' => $fieldDef,
                                    ])
                                @endif
                            </div>
                        @endforeach
                    </div>
                </section>
                {{-- Αν είναι νέα εκδρομή συμπλήρωσε αυτόματα τον τελευταίο υπογράφοντα --}}
                @if (!$isEdit)
                    <script>
                        (function() {
                            if (document.querySelector('#onoma_ypografonta').value === '') {
                                document.querySelector('#onoma_ypografonta').value = '{{ $signerName }}';
                            }
                        })();
                    </script>
                @endif

                {{-- Remarks --}}
                <div class="mb-6">
                    <label for="paratiriseis" class="mb-1.5 block text-sm font-medium text-gray-700">Παρατηρήσεις</label>
                    <textarea name="paratiriseis" id="paratiriseis" rows="3" placeholder="Σημειώσεις (που δεν θα εκτυπωθούν πουθενά)"
                        @if ($errors->has('paratiriseis')) aria-invalid="true" aria-describedby="paratiriseis-error" @endif
                        class="w-full rounded-md border bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm transition placeholder:text-gray-400 focus:outline-none focus:ring-2 {{ $errors->has('paratiriseis') ? 'border-red-400 focus:border-red-500 focus:ring-red-500/20' : 'border-gray-300 focus:border-brand focus:ring-brand/20' }}">{{ old('paratiriseis', $isEdit ? $excursion->paratiriseis ?? '' : '') }}</textarea>
                    @error('paratiriseis')
                        <p id="paratiriseis-error" class="mt-1.5 text-sm text-red-700" role="alert">{{ $message }}</p>
                    @enderror
                </div>
                </fieldset>

                {{-- Actions --}}
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <a href="{{ route('dashboard') }}"
                        @if ($isEdit) data-unsaved-changes-link @endif
                        class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-gray-200 px-5 py-2.5 text-base font-medium text-gray-700 transition-colors hover:bg-gray-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand sm:w-auto">
                        <i class="fas fa-arrow-left"></i>
                        {{ $isEdit ? 'Επιστροφή' : 'Ακύρωση' }}
                    </a>
                    @unless ($isEdit && $excursion->isSubmitted())
                    <button type="submit"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-brand px-5 py-2.5 text-base font-semibold text-white transition-colors hover:bg-brand-dark focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand sm:w-auto">
                        <i class="fas fa-save"></i> {{ $isEdit ? 'Αποθήκευση Αλλαγών' : 'Δημιουργία' }}
                    </button>
                    @endunless
                    @if ($isEdit)
                        <a href="{{ route('excursion.files', $excursion) }}" data-unsaved-changes-link
                            class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-brand px-5 py-2.5 text-base font-medium text-brand transition-colors hover:bg-brand hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand sm:w-auto">
                            <i class="fas fa-folder-open"></i> Αρχεία<i class="fas fa-arrow-right"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

</x-layouts.app>
