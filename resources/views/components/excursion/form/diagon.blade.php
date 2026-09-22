@props(['excursion' => null, 'mode' => 'create'])

<div class="flex flex-col gap-2 mb-4">
    <x-excursion.form.ui.section title="Γενικά">
        <div>
            <x-excursion.form.ui.input fieldName="titlos_programmatos" label="Τίτλος εκδήλωσης" :value="$excursion->titlos_programmatos ?? ''" />
            <div class="text-sm">[διαγωνισμός/εκδήλωση/συνέδριο κτλ.]</div>
        </div>
        <div>
            <x-excursion.form.ui.input fieldName="ar_prajis_syllogou"
                label="Πράξη συλλόγου βάσει της οποίας γίνεται η μετακίνηση" :value="$excursion->ar_prajis_syllogou ?? ''"
                placeholder="Αριθμός και ημερομηνία" />
            <div class="text-sm">[10 ημέρες πριν από ημερήσια μετακίνηση και 20 ημέρες πριν από μετακίνηση με
                διανυκτέρευση]</div>
        </div>
        <x-excursion.form.ui.input fieldName="a_arithmos"
            label="Αύξων αριθμός εκδρομής αυτού του είδους (π.χ. 1 αν είναι η πρώτη για φέτος)" type="number"
            min="1" :value="$excursion->a_arithmos ?? 1" />
        <x-excursion.form.ui.input fieldName="proorismos" label="Προορισμός" :value="$excursion->proorismos ?? ''" />
        <x-excursion.form.ui.select fieldName="dianyktereush" label="Διανυκτέρευση" :value="$excursion->dianyktereush ?? 'Όχι'" :options="['Όχι', 'Ναι']"
            :emptyItem="false" />
        <x-excursion.form.ui.input fieldName="onoma_jenodoxeio" label="Όνομα ξενοδοχείου" :value="$excursion->onoma_jenodoxeio ?? ''" />
        <x-excursion.form.ui.input fieldName="onoma_praktoreio" label="Όνομα πρακτορείου" :value="$excursion->onoma_praktoreio ?? ''" />
        <x-excursion.form.ui.input fieldName="metaforika_mesa" label="Μεταφορικά μέσα" :value="$excursion->metaforika_mesa ?? ''" />
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Ημερομηνίες και ώρες">
        <x-excursion.form.ui.date fieldName="hmera_ekdromis_anaxorisis" label="Ημερομηνία αναχώρησης"
            :value="$excursion?->hmera_ekdromis_anaxorisis?->format('Y-m-d')" />
        <x-excursion.form.ui.date fieldName="hmera_epistrofis" label="Ημερομηνία επιστροφής" :value="$excursion?->hmera_epistrofis?->format('Y-m-d')" />
        <x-excursion.form.ui.input fieldName="diarkeia_hmeres" label="Διάρκεια (ημέρες)" type="number" min="1"
            :value="$excursion->diarkeia_hmeres ?? ''" />
        <div></div>
        <div>
            <x-excursion.form.ui.time fieldName="ora_anaxorisis" label="Ώρα αναχώρησης" :value="$excursion->ora_anaxorisis ?? ''" />
            <div class="text-sm">[μετά τις 6.00 π.μ.]</div>
        </div>
        <x-excursion.form.ui.time fieldName="ora_afijis" label="Εκτιμώμενη ώρα άφιξης στον/στους προορισμό/σμούς"
            :value="$excursion->ora_afijis ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_apoxorisis" label="Εκτιμώμενη ώρα αποχώρησης" :value="$excursion->ora_apoxorisis ?? ''" />
        <div>
            <x-excursion.form.ui.time fieldName="ora_epistrofis" label="Ώρα επιστροφής" :value="$excursion->ora_epistrofis ?? ''" />
            <div class="text-sm">[το αργότερο έως τις 10.00 μ.μ. όταν η εκδρομή πραγματοποιείται οδικώς]</div>
        </div>
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Συμμετοχές">
        <x-excursion.form.ui.input fieldName="ar_metakinoumenon" label="Αριθμός μετακινούμενων μαθητών" type="number"
            min="1" :value="$excursion->ar_metakinoumenon ?? ''" />
        <div></div>
        <x-excursion.form.ui.input fieldName="plithos_synodoi" label="Πλήθος συνοδών (εκτός του αρχηγού)" type="number"
            min="0" :value="$excursion->plithos_synodoi ?? ''" />
        <x-excursion.form.ui.input fieldName="covered" label="Καλυπτόμενοι μαθητές" type="number" :value="0"
            :readonly="true" />
        <x-excursion.form.ui.input fieldName="onoma_arxigos" label="Αρχηγός" :value="$excursion->onoma_arxigos ?? ''" />
        <x-excursion.form.ui.textarea fieldName="onomata_synodoi" label="Συνοδοί (Ονοματεπώνυμο και ειδικότητα)"
            :value="$excursion->onomata_synodoi ?? ''" lineNumbers="true" />
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
