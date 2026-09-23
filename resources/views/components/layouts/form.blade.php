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

    <div class="bg-white rounded-lg shadow-md overflow-hidden" x-data="{ selectedType: '{{ $excursionType ?? '' }}' }">
        <div class="bg-coral text-white px-6 py-4">
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
        <div class="p-6">

            <form action="{{ $isEdit ? route('excursion.update', $excursion) : route('excursion.store') }}" method="POST"
                @if ($isEdit) data-unsaved-changes-form @endif>
                @csrf
                @if ($isEdit)
                    @method('PUT')
                @endif

                {{-- Type Selector --}}
                <div class="mb-6">
                    <label for="eidos_ekdromis" class="block text-sm font-medium text-gray-700 mb-1">Είδος
                        Εκδρομής</label>
                    @if ($isEdit)
                        <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100"
                            value="{{ $excursion->eidos_ekdromis }}" readonly>
                        <input type="hidden" name="eidos_ekdromis" value="{{ $excursion->eidos_ekdromis }}">
                        <div class="block mt-2">Κατάσταση: {{ $excursion->status }}</div>
                    @else
                        <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100"
                            value="{{ $excursionType }}" readonly>
                        <input type="hidden" name="eidos_ekdromis" value="{{ $excursionType }}">
                        {{-- <select name="eidos_ekdromis" id="eidos_ekdromis" x-model="selectedType"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
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
                <div class="border-2 border-gray-300 rounded-lg p-4 mb-6">
                    <h4 class="font-semibold text-gray-700 mb-4">Στοιχεία Υποβολής</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                </div>
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
                    <label for="paratiriseis" class="block text-sm font-medium text-gray-700 mb-1">Παρατηρήσεις</label>
                    <textarea name="paratiriseis" id="paratiriseis" rows="3" placeholder="Σημειώσεις (που δεν θα εκτυπωθούν πουθενά)"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent">{{ $isEdit ? $excursion->paratiriseis ?? '' : '' }}</textarea>
                </div>

                {{-- Actions --}}
                <div class="flex items-center justify-between">
                    <a href="{{ route('dashboard') }}"
                        @if ($isEdit) data-unsaved-changes-link @endif
                        class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg text-lg hover:bg-gray-400">
                        <i class="fas fa-arrow-left"></i>
                        {{ $isEdit ? 'Επιστροφή' : 'Ακύρωση' }}
                    </a>
                    <button type="submit"
                        class="bg-coral text-white px-6 py-2 rounded-lg text-lg hover:bg-coral-dark cursor-pointer">
                        <i class="fas fa-save"></i> {{ $isEdit ? 'Αποθήκευση Αλλαγών' : 'Δημιουργία' }}
                    </button>
                    @if ($isEdit)
                        <a href="{{ route('excursion.files', $excursion) }}" data-unsaved-changes-link
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg text-lg hover:bg-blue-600">
                            <i class="fas fa-folder-open"></i> Αρχεία<i class="fas fa-arrow-right"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

</x-layouts.app>
