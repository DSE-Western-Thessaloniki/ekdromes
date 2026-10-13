@props(['excursion' => null, 'mode' => 'create'])

<div class="flex flex-col gap-2 mb-4">
    <x-excursion.form.ui.section title="Γενικά">
        <div>
            <x-excursion.form.ui.input fieldName="titlos_programmatos" label="Τίτλος αθλητικής δραστηριότητας"
                :value="$excursion->titlos_programmatos ?? ''" />
            <div class="text-sm">[γράφεται κατά περίπτωση το είδος της δράσης πχ. ενδοσχολικοί αγώνες]</div>
        </div>
        <x-excursion.form.ui.input fieldName="a_arithmos"
            label="Αύξων αριθμός εκδρομής αυτού του είδους (π.χ. 1 αν είναι η πρώτη για φέτος)" type="number"
            min="1" :value="$excursion->a_arithmos ?? 1" />
        <x-excursion.form.ui.input fieldName="ar_prajis_syllogou"
            label="Πράξη συλλόγου βάσει της οποίας γίνεται η μετακίνηση" :value="$excursion->ar_prajis_syllogou ?? ''"
            placeholder="Αριθμός και ημερομηνία" />
        <x-excursion.form.ui.input fieldName="proorismos" label="Προορισμός" :value="$excursion->proorismos ?? ''" />
        @php
            $objectives = App\Services\ExcursionFieldMap::getObjectives();
            $options = array_map(
                fn($key, $item) => ['id' => "cb$key", 'value' => $item],
                range(1, count($objectives)),
                $objectives,
            );
        @endphp
        <x-excursion.form.ui.checkboxset fieldName="stoxoi[]" legend="Στόχοι εκπαιδευτικής δράσης" :options="$options"
            :value="$excursion->stoxoi ?? []" class="col-span-2 border p-2 space-y-1.5" />
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Ημερομηνίες και ώρες">
        <x-excursion.form.ui.date fieldName="hmera_ekdromis_anaxorisis" label="Ημερομηνία δράσης" :value="$excursion?->hmera_ekdromis_anaxorisis?->format('Y-m-d')" />
        <div></div>
        <x-excursion.form.ui.time fieldName="ora_anaxorisis" label="Ώρα αναχώρησης" :value="$excursion?->ora_anaxorisis?->format('H:i') ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_epistrofis" label="Ώρα επιστροφής" :value="$excursion?->ora_epistrofis?->format('H:i') ?? ''" />
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Συμμετοχές">
        <x-excursion.form.ui.input fieldName="ar_metakinoumenon" label="Αριθμός μετακινούμενων μαθητών" type="number"
            min="1" :value="$excursion->ar_metakinoumenon ?? 0" />
        <div></div>
        <x-excursion.form.ui.input fieldName="plithos_synodoi" label="Πλήθος συνοδών (εκτός του αρχηγού)" type="number"
            min="0" :value="$excursion->plithos_synodoi ?? 0" />
        <x-excursion.form.ui.input fieldName="covered" label="Καλυπτόμενοι μαθητές" type="number" :value="0"
            :readonly="true" />
        <x-excursion.form.ui.input fieldName="onoma_arxigos" label="Αρχηγός" :value="$excursion->onoma_arxigos ?? ''" />
        <div></div>
        <x-excursion.form.ui.textarea fieldName="onomata_synodoi" label="Συνοδοί (Ονοματεπώνυμο και ειδικότητα)"
            :value="$excursion->onomata_synodoi ?? ''" lineNumbers="true" />
        <div></div>

        <div class="flex flex-col gap-2">
            <div class="space-x-2">
                <input type="hidden" name="declarations" value="true">
                <label for="inp_declarations">Υπάρχουν υπεύθυνες δηλώσεις γονέων και κηδεμόνων:</label><input
                    type="checkbox" checked name="inp_declarations" id="inp_declarations" />
            </div>
        </div>
    </x-excursion.form.ui.section>
</div>
<script>
    (function() {
        document.querySelector('#covered').value = document.querySelector('#plithos_synodoi').value * 25;
        document.querySelector('#plithos_synodoi').addEventListener("input", () => {
            document.querySelector('#covered').value = document.querySelector('#plithos_synodoi')
                .value * 25;
        });

        document.querySelector('#inp_declarations').addEventListener("change", (event) => {
            console.log(event.target.checked);
            document.querySelector('input[name="declarations"]').value = event.target.checked;
        });
    })();
</script>
