@props(['excursion' => null, 'mode' => 'create'])

@php
    $isEdit = $mode === 'edit';
@endphp

<div class="flex flex-col gap-2 mb-4">
    <x-excursion.form.ui.section title="Γενικά">
        <x-excursion.form.ui.input fieldName="ar_prajis_syllogou"
            label="Πράξη συλλόγου βάσει της οποίας γίνεται η μετακίνηση" :value="$excursion->ar_prajis_syllogou ?? ''"
            placeholder="Αριθμός και ημερομηνία" />
        <x-excursion.form.ui.input fieldName="a_arithmos"
            label="Αύξων αριθμός εκδρομής αυτού του είδους (π.χ. 1 αν είναι η πρώτη για φέτος)" type="number"
            min="1" :value="$excursion->a_arithmos ?? 1" />
        <x-excursion.form.ui.input fieldName="proorismos" label="Προορισμός" :value="$excursion->proorismos ?? ''" />
        @php
            if ($isEdit && $excursion->metaforika_mesa !== '') {
                $metakinisi_selected = 'Με μεταφορικό μέσο';
            } else {
                $metakinisi_selected = '';
            }
        @endphp
        <x-excursion.form.ui.select fieldName="metakinisi" label="Τρόπος μετακίνησης" :value="$metakinisi_selected"
            :emptyItem="false" :options="['Πεζή', 'Με μεταφορικό μέσο']" />
        <x-excursion.form.ui.input fieldName="metaforika_mesa" label="Μεταφορικό μέσο" :value="$excursion->metaforika_mesa ?? ''"
            class="{{ $metakinisi_selected ? '' : 'hidden' }}" />
        <div></div>
        @php
            $objectives = App\Services\ExcursionFieldMap::getObjectives();
            $options = array_map(
                fn($key, $item) => ['id' => "cb$key", 'value' => $item],
                range(1, count($objectives)),
                $objectives,
            );
        @endphp
        <x-excursion.form.ui.checkboxset fieldName="stoxoi" legend="Στόχοι εκπαιδευτικής δράσης" :options="$options"
            class="col-span-2 border p-2 space-y-1.5" />
    </x-excursion.form.ui.section>

    <x-excursion.form.ui.section title="Ημερομηνίες και ώρες">
        <x-excursion.form.ui.date fieldName="hmera_ekdromis_anaxorisis" label="Ημερομηνία εκδρομής" :value="$excursion?->hmera_ekdromis_anaxorisis?->format('Y-m-d')" />
        <div></div>
        <x-excursion.form.ui.time fieldName="ora_anaxorisis" label="Ώρα αναχώρησης από το σχολείο" :value="$excursion->ora_anaxorisis ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_epistrofis" label="Ώρα επιστροφής στο σχολείο" :value="$excursion->ora_epistrofis ?? ''" />
    </x-excursion.form.ui.section>

    <x-excursion.form.ui.section title="Συμμετοχές">
        <x-excursion.form.ui.input fieldName="onoma_arxigos" label="Αρχηγός" :value="$excursion->onoma_arxigos ?? ''"
            placeholder="Ονοματεπώνυμο και ειδικότητα" />
        <div></div>
        <div>
            <x-excursion.form.ui.textarea fieldName="onomata_synodoi" label="Συνοδοί (Ονοματεπώνυμο και ειδικότητα)"
                :value="$excursion->onomata_synodoi ?? ''" />
            <div class="text-sm">[Στην περίπτωση συμμετοχής όλων των διδασκόντων αφήνεται κενό]</div>
        </div>
    </x-excursion.form.ui.section>
</div>

<script>
    (function() {
        document.querySelector('#metakinisi').addEventListener("change", () => {
            if (document.querySelector('#metakinisi').value === 'Πεζή') {
                document.querySelector('#metaforika_mesa').parentElement.classList.add('hidden')
            } else {
                document.querySelector('#metaforika_mesa').parentElement.classList.remove('hidden')
            }
        })
    })();
</script>
