@props(['excursion' => null, 'types', 'fieldMap', 'mode' => 'create'])

@php
    $isEdit = $mode === 'edit';
    $excursionType = $excursion->eidos_ekdromis ?? request()->query('excursionType', null);
    $signerFields = $fieldMap->getSignerFields();

    // Build a map of field => which types it belongs to (per section)
    $fieldTypeMap = [];
    foreach ($types as $typeKey => $typeData) {
        foreach ($fieldMap->getSections($typeKey) as $secKey => $secFields) {
            foreach ($secFields as $fieldName => $fieldDef) {
                $fieldTypeMap[$fieldName][$secKey][] = $typeKey;
            }
        }
    }
@endphp

<div class="bg-white rounded-lg shadow-md overflow-hidden" x-data="{ selectedType: '{{ $excursionType ?? '' }}' }">
    <div class="bg-coral text-white px-6 py-4">
        <h3 class="text-xl font-semibold">
            {{ $isEdit ? 'Επεξεργασία Εκδρομής' . ($excursion->id ? ' #' . $excursion->id : '') : 'Δημιουργία Νέας Εκδρομής' }}
            @if ($isEdit && $excursion->hasProtocol())
                <span class="ml-2 inline-block bg-white/20 text-white text-xs px-2 py-1 rounded-full">Πρωτόκολλο:
                    {{ $excursion->ar_prot }}</span>
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

        <form action="{{ $isEdit ? route('excursion.update', $excursion) : route('excursion.store') }}" method="POST">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            {{-- Type Selector --}}
            <div class="mb-6">
                <label for="eidos_ekdromis" class="block text-sm font-medium text-gray-700 mb-1">Είδος Εκδρομής
                    *</label>
                @if ($isEdit)
                    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100"
                        value="{{ $excursion->eidos_ekdromis }}" readonly>
                    <input type="hidden" name="eidos_ekdromis" value="{{ $excursion->eidos_ekdromis }}">
                @else
                    <select name="eidos_ekdromis" id="eidos_ekdromis" x-model="selectedType"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
                        required>
                        <option value="">-- Επιλέξτε είδος εκδρομής --</option>
                        @foreach ($types as $key => $type)
                            <option value="{{ $key }}" @selected($excursionType === $key)>{{ $key }}
                            </option>
                        @endforeach
                    </select>
                @endif
            </div>

            {{-- General Section --}}
            @php
                $generalFields = [
                    'ar_prajis_syllogou',
                    'a_arithmos',
                    'proorismos',
                    'onoma_jenodoxeio',
                    'onoma_praktoreio',
                    'metakinisi',
                    'metaforika_mesa',
                    'mathimata',
                    'tmimata',
                    'titlos_programmatos',
                    'eidos_programmatos',
                    'ar_pr_egrisis_programmatosdde',
                    'asf_symbolaio',
                    'praji_epilogi_praktoreiou',
                    'ar_pr_anartisisprok',
                    'erasmus_ar_simbasis',
                    'erasmus_ar_prajis_syllogou_sigrotisi',
                    'erasmus_ar_prajis_syllogou_anasigrotisi',
                    'erasmus_ar_prajis_syllogon_sinainesi',
                    'erasmus_ar_prot_beb_dieythinton',
                ];
                $generalFieldsToShow = array_filter($generalFields, fn($f) => isset($fieldTypeMap[$f]['general']));
            @endphp
            <div class="border-2 border-gray-300 rounded-lg p-4 mb-6" x-show="selectedType !== ''" x-transition.opacity>
                <h4 class="font-semibold text-gray-700 mb-4">Γενικά</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($generalFieldsToShow as $fieldName)
                        @php
                            $fieldDef = $fieldMap->getFieldDefinition($fieldName);
                            $typeList = $fieldTypeMap[$fieldName]['general'] ?? [];
                            $showFor = collect($typeList)->map(fn($t) => "'$t'")->implode(',');
                        @endphp
                        <div x-show="[{{ $showFor }}].includes(selectedType)" x-transition
                            class="{{ in_array($fieldName, ['mathimata', 'erasmus_lista_kathig_kaieidikotita', 'erasmus_lista_anaplirkathig_kaieid', 'erasmus_lista_mathites_kaitaji']) ? 'md:col-span-2' : '' }}">
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

            {{-- Dates Section --}}
            @php
                $dateFields = [
                    'hmera_ekdromis_anaxorisis',
                    'hmera_epistrofis',
                    'diarkeia_hmeres',
                    'ora_anaxorisis',
                    'ora_afijis',
                    'ora_apoxorisis',
                    'ora_epistrofis',
                ];
                $dateFieldsToShow = array_filter($dateFields, fn($f) => isset($fieldTypeMap[$f]['dates']));
            @endphp
            <div class="border-2 border-gray-300 rounded-lg p-4 mb-6" x-show="selectedType !== ''" x-transition.opacity>
                <h4 class="font-semibold text-gray-700 mb-4">Ημερομηνίες</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($dateFieldsToShow as $fieldName)
                        @php
                            $fieldDef = $fieldMap->getFieldDefinition($fieldName);
                            $typeList = $fieldTypeMap[$fieldName]['dates'] ?? [];
                            $showFor = collect($typeList)->map(fn($t) => "'$t'")->implode(',');
                        @endphp
                        <div x-show="[{{ $showFor }}].includes(selectedType)" x-transition>
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
                                    'required' => $fieldName === 'hmera_ekdromis_anaxorisis',
                                ])
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Participation Section --}}
            @php
                $partFields = [
                    'ar_mathiton',
                    'ar_metakinoumenon',
                    'onoma_arxigos',
                    'plithos_synodoi',
                    'plithos_ektosomadas_synodoi',
                    'erasmus_lista_kathig_kaieidikotita',
                    'erasmus_lista_anaplirkathig_kaieid',
                    'erasmus_lista_mathites_kaitaji',
                ];
                $partFieldsToShow = array_filter($partFields, fn($f) => isset($fieldTypeMap[$f]['participation']));
            @endphp
            <div class="border-2 border-gray-300 rounded-lg p-4 mb-6"
                x-show="selectedType !== '' && selectedType !== 'Σχολικός Περίπατος'" x-transition.opacity>
                <h4 class="font-semibold text-gray-700 mb-4">Συμμετοχές</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($partFieldsToShow as $fieldName)
                        @php
                            $fieldDef = $fieldMap->getFieldDefinition($fieldName);
                            $typeList = $fieldTypeMap[$fieldName]['participation'] ?? [];
                            $showFor = collect($typeList)->map(fn($t) => "'$t'")->implode(',');
                        @endphp
                        <div x-show="[{{ $showFor }}].includes(selectedType)" x-transition
                            class="{{ in_array($fieldName, ['erasmus_lista_kathig_kaieidikotita', 'erasmus_lista_anaplirkathig_kaieid', 'erasmus_lista_mathites_kaitaji']) ? 'md:col-span-2' : '' }}">
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

            {{-- Signer / Submission Info --}}
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
