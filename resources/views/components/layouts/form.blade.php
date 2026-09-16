@props(['isEdit', 'excursion', 'fieldMap', 'excursionType'])

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

            @if (isset($errors) && $errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ $isEdit ? route('excursion.update', $excursion) : route('excursion.store') }}"
                method="POST">
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

                {{-- Remarks --}}
                <div class="mb-6">
                    <label for="paratiriseis" class="block text-sm font-medium text-gray-700 mb-1">Παρατηρήσεις</label>
                    <textarea name="paratiriseis" id="paratiriseis" rows="3" placeholder="Σημειώσεις (που δεν θα εκτυπωθούν πουθενά)"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent">{{ $isEdit ? $excursion->paratiriseis ?? '' : '' }}</textarea>
                </div>

                {{-- Actions --}}
                <div class="flex items-center space-x-4">
                    <button type="submit" class="bg-coral text-white px-6 py-2 rounded-lg text-lg hover:bg-coral-dark">
                        <i class="fas fa-save"></i> {{ $isEdit ? 'Αποθήκευση' : 'Δημιουργία' }}
                    </button>
                    @if ($isEdit)
                        <a href="{{ route('excursion.files', $excursion) }}"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg text-lg hover:bg-blue-600">
                            <i class="fas fa-folder-open"></i> Αρχεία
                        </a>
                    @endif
                    <a href="{{ route('dashboard') }}"
                        class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg text-lg hover:bg-gray-400">
                        {{ $isEdit ? 'Επιστροφή' : 'Ακύρωση' }}
                    </a>
                </div>
            </form>
        </div>
    </div>

</x-layouts.app>
