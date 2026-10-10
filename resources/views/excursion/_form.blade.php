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
                    <span class="ml-2 inline-block bg-orange-500 text-white text-xs px-2 py-1 rounded-full">Ημερομηνία
                        Αποθήκευσης: {{ $excursion->submit_datetime?->format('d-m-Y H:i') }}</span>
                @endif
            @else
                Δημιουργία Νέας Εκδρομής
            @endif
        </h3>
    </div>
    <div class="p-4 sm:p-6 lg:p-8">

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
                <label for="eidos_ekdromis" class="mb-1.5 block text-sm font-medium text-gray-700">Είδος Εκδρομής
                    *</label>
                @if ($isEdit)
                    <input type="text" class="w-full rounded-md border border-gray-300 bg-gray-100 px-3 py-2.5 text-sm shadow-sm"
                        value="{{ $excursion->eidos_ekdromis }}" readonly>
                    <input type="hidden" name="eidos_ekdromis" value="{{ $excursion->eidos_ekdromis }}">
                    <div class="block mt-2">Κατάσταση: {{ $excursion->status }}</div>
                @else
                    <input type="text" class="w-full rounded-md border border-gray-300 bg-gray-100 px-3 py-2.5 text-sm shadow-sm"
                        value="{{ $excursionType }}" readonly>
                    <input type="hidden" name="eidos_ekdromis" value="{{ $excursionType }}">
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

            {{-- General Section --}}
            @php
                $generalFields = [
                    'eidos_programmatos',
                    'titlos_programmatos',
                    'ar_pr_egrisis_programmatosdde',
                    'erasmus_ar_simbasis',
                    'ar_pr_anartisisprok',
                    'praji_epilogi_praktoreiou',
                    'erasmus_ar_prajis_syllogou_sigrotisi',
                    'erasmus_ar_prajis_syllogou_anasigrotisi',
                    'ar_prajis_syllogou',
                    'erasmus_ar_prajis_syllogon_sinainesi',
                    'erasmus_ar_prot_beb_dieythinton',
                    'asf_symbolaio',
                    'a_arithmos',
                    'proorismos',
                    'onoma_jenodoxeio',
                    'onoma_praktoreio',
                    'metakinisi',
                    'metaforika_mesa',
                    'mathimata',
                    'tmimata',
                ];
                $generalFieldsToShow = array_filter($generalFields, fn($f) => isset($fieldTypeMap[$f]['general']));
            @endphp
            <section class="mb-6 rounded-xl border border-gray-200 bg-white p-5 shadow-sm sm:p-6"
                x-show="selectedType !== ''" x-transition.opacity>
                <h4 class="border-b border-gray-100 pb-3 text-lg font-semibold text-brand">Γενικά</h4>
                <div class="grid grid-cols-1 gap-x-6 gap-y-5 pt-4 md:grid-cols-2">
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
                        </section>
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
            <section class="mb-6 rounded-xl border border-gray-200 bg-white p-5 shadow-sm sm:p-6"
                x-show="selectedType !== ''" x-transition.opacity>
                <h4 class="border-b border-gray-100 pb-3 text-lg font-semibold text-brand">Ημερομηνίες</h4>
                <div class="grid grid-cols-1 gap-x-6 gap-y-5 pt-4 md:grid-cols-2">
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
                        </section>
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
            <section class="mb-6 rounded-xl border border-gray-200 bg-white p-5 shadow-sm sm:p-6"
                x-show="selectedType !== '' && selectedType !== 'Σχολικός Περίπατος'" x-transition.opacity>
                <h4 class="border-b border-gray-100 pb-3 text-lg font-semibold text-brand">Συμμετοχές</h4>
                <div class="grid grid-cols-1 gap-x-6 gap-y-5 pt-4 md:grid-cols-2">
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
                        </section>
                    @endforeach
                </div>
            </div>

            {{-- Signer / Submission Info --}}
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
                        </section>
                    @endforeach
                </div>
            </div>

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

            {{-- Actions --}}
            <div class="flex flex-col gap-3 sm:flex-row sm:flex-wrap sm:items-center">
                <button type="submit"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-brand px-5 py-2.5 text-base font-semibold text-white transition-colors hover:bg-brand-dark focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand sm:w-auto">
                    <i class="fas fa-save"></i> {{ $isEdit ? 'Αποθήκευση' : 'Δημιουργία' }}
                </button>
                @if ($isEdit)
                    <a href="{{ route('excursion.files', $excursion) }}"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-brand px-5 py-2.5 text-base font-medium text-brand transition-colors hover:bg-brand hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand sm:w-auto">
                        <i class="fas fa-folder-open"></i> Αρχεία
                    </a>
                @endif
                <a href="{{ route('dashboard') }}"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-gray-200 px-5 py-2.5 text-base font-medium text-gray-700 transition-colors hover:bg-gray-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand sm:w-auto">
                    {{ $isEdit ? 'Επιστροφή' : 'Ακύρωση' }}
                </a>
            </div>
        </form>
    </div>
</div>
