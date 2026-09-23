@props(['excursion' => null, 'mode' => 'create'])

<div class="flex flex-col gap-2 mb-4">
    <x-excursion.form.ui.section title="Γενικά">
        <x-excursion.form.ui.select fieldName="eidos_programmatos" label="Είδος προγράμματος" :value="$excursion->eidos_programmatos ?? ''"
            :options="['Περιβαλλοντικής εκπαίδευσης', 'Αγωγής υγείας', 'Πολιτιστικών θεμάτων', 'Αγωγής σταδιοδρομίας']" :emptyItem="false" />
        <x-excursion.form.ui.input fieldName="titlos_programmatos" label="Τίτλος του προγράμματος" :value="$excursion->titlos_programmatos ?? ''" />
        <x-excursion.form.ui.input fieldName="aa_programmatos" label="Α/Α προγράμματος" :value="$excursion->aa_programmatos ?? ''" />
        <x-excursion.form.ui.input fieldName="ar_pr_egrisis_programmatosdde"
            label="Αριθμός πρωτοκόλλου έγκρισης προγράμματος" :value="$excursion->ar_pr_egrisis_programmatosdde ?? ''" />
        <x-excursion.form.ui.input fieldName="a_arithmos"
            label="Αύξων αριθμός εκδρομής αυτού του είδους (π.χ. 1 αν είναι η πρώτη για φέτος)" type="number"
            min="1" :value="$excursion->a_arithmos ?? 1" />
        <x-excursion.form.ui.input fieldName="ar_prajis_syllogou"
            label="Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση" :value="$excursion->ar_prajis_syllogou ?? ''" />
        <x-excursion.form.ui.input fieldName="proorismos" label="Προορισμός" :value="$excursion->proorismos ?? ''" />
        <x-excursion.form.ui.select fieldName="dianyktereush" label="Διανυκτέρευση" :value="$excursion->dianyktereush ?? 'Όχι'" :options="['Όχι', 'Ναι']"
            :emptyItem="false" />
        <x-excursion.form.ui.input fieldName="onoma_jenodoxeio" label="Όνομα ξενοδοχείου" :value="$excursion->onoma_jenodoxeio ?? ''" />
        <x-excursion.form.ui.input fieldName="onoma_praktoreio" label="Όνομα πρακτορείου" :value="$excursion->onoma_praktoreio ?? ''" />
        <x-excursion.form.ui.input fieldName="metaforika_mesa" label="Μεταφορικά μέσα" :value="$excursion->metaforika_mesa ?? ''" />
        @php
            $objectives = App\Services\ExcursionFieldMap::getObjectives();
            $options = array_map(
                fn($key, $item) => ['id' => "cb$key", 'value' => $item],
                range(1, count($objectives)),
                $objectives,
            );
        @endphp
        <x-excursion.form.ui.checkboxset fieldName="stoxoi" legend="Στόχοι εκπαιδευτικής δράσης" :options="$options"
            :value="$excursion->stoxoi ?? []" class="col-span-2 border p-2 space-y-1.5" />

    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Ημερομηνίες">
        <x-excursion.form.ui.date fieldName="hmera_ekdromis_anaxorisis" label="Ημερομηνία αναχώρησης"
            :value="$excursion?->hmera_ekdromis_anaxorisis?->format('Y-m-d')" />
        <x-excursion.form.ui.date fieldName="hmera_epistrofis" label="Ημερομηνία επιστροφής" :value="$excursion?->hmera_epistrofis?->format('Y-m-d')" />
        <x-excursion.form.ui.time fieldName="ora_anaxorisis"
            label="Ώρα αναχώρησης από το σχολείο ή από άλλο καθορισμένο χώρο" :value="$excursion->ora_anaxorisis ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_afijis" label="Εκτιμώμενη ώρα άφιξης στον/στους προορισμό/σμούς"
            :value="$excursion->ora_afijis ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_apoxorisis" label="Εκτιμώμενη ώρα αποχώρησης" :value="$excursion->ora_apoxorisis ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_epistrofis"
            label="Ώρα επιστροφής στο σχολείο ή σε άλλο καθορισμένο χώρο" :value="$excursion->ora_epistrofis ?? ''" />
        <x-excursion.form.ui.input fieldName="diarkeia_hmeres" label="Διάρκεια (ημέρες)" type="number" min="1"
            :value="$excursion->diarkeia_hmeres ?? ''" />
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Συμμετοχές">
        <x-excursion.form.ui.input fieldName="ar_mathiton" label="Αριθμός συμμετεχόντων μαθητών στην παιδαγωγική ομάδα"
            type="number" min="1" :value="$excursion->ar_mathiton ?? 0" />
        <x-excursion.form.ui.input fieldName="ar_metakinoumenon" label="Αριθμός μετακινούμενων μαθητών" type="number"
            min="1" :value="$excursion->ar_metakinoumenon ?? 0" />
        <x-excursion.form.ui.input fieldName="plithos_synodoi" label="Πλήθος συνοδών" type="number" min="0"
            :value="$excursion->plithos_synodoi ?? 0" />
        <div></div>
        <x-excursion.form.ui.input fieldName="onoma_arxigos" label="Αρχηγός" :value="$excursion->onoma_arxigos ?? ''"
            placeholder="Ονοματεπώνυμο και ειδικότητα" />
        <div></div>
        <x-excursion.form.ui.textarea fieldName="onomata_synodoi" label="Συνοδοί (Ονοματεπώνυμο και ειδικότητα)"
            :value="$excursion->onomata_synodoi ?? ''" lineNumbers="true" />
        <div></div>
        <div class="flex flex-col gap-2">
            <div class="space-x-2">
                <input type="hidden" name="70percent" value="true">
                <label for="inp_70_percent">Υπάρχει το ποσοστό 70% της παιδαγωγικής ομάδας:</label><input
                    type="checkbox" checked name="inp_70_percent" id="inp_70_percent" />
            </div>
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
        document.querySelector('#plithos_synodoi').addEventListener("input", () => {
            document.querySelector('#covered').value = document.querySelector('#plithos_synodoi')
                .value * 25;
        });

        document.querySelector('#inp_70_percent').addEventListener("change", (event) => {
            console.log(event.target.checked);
            document.querySelector('input[name="70percent"]').value = event.target.checked;
        });

        document.querySelector('#inp_declarations').addEventListener("change", (event) => {
            console.log(event.target.checked);
            document.querySelector('input[name="declarations"]').value = event.target.checked;
        });

        function setDianyktereush(value) {
            if (value === 'Όχι') {
                document.querySelector('#onoma_jenodoxeio').parentElement.classList.add('hidden');
                document.querySelector('#hmera_epistrofis').parentElement.classList.add('hidden');
                document.querySelector('#ora_afijis').parentElement.classList.add('hidden');
                document.querySelector('#ora_apoxorisis').parentElement.classList.add('hidden');
                document.querySelector('#diarkeia_hmeres').parentElement.classList.add('hidden');
            } else {
                document.querySelector('#onoma_jenodoxeio').parentElement.classList.remove('hidden');
                document.querySelector('#hmera_epistrofis').parentElement.classList.remove('hidden');
                document.querySelector('#ora_afijis').parentElement.classList.remove('hidden');
                document.querySelector('#ora_apoxorisis').parentElement.classList.remove('hidden');
                document.querySelector('#diarkeia_hmeres').parentElement.classList.remove('hidden');
            }
        }

        document.querySelector('#dianyktereush').addEventListener("change", (event) => {
            console.log(event.target.value);
            setDianyktereush(event.target.value);
        })

        setDianyktereush(document.querySelector('#dianyktereush').value);
    })();
</script>
