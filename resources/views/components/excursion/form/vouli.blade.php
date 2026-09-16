@props(['excursion' => null, 'mode' => 'create'])

<div class="flex flex-col gap-2 mb-4">
    <x-excursion.form.ui.section title="Γενικά">
        <div>
            <x-excursion.form.ui.input fieldName="ar_prajis_syllogou"
                label="Πράξη συλλόγου βάσει της οποίας γίνεται η μετακίνηση" :value="$excursion->ar_prajis_syllogou ?? ''"
                placeholder="Αριθμός και ημερομηνία" />
            <div class="text-sm">[20 ημέρες πριν από τη μετακίνηση]</div>
        </div>
        <x-excursion.form.ui.input fieldName="onoma_jenodoxeio" label="Όνομα ξενοδοχείου" :value="$excursion->onoma_jenodoxeio ?? ''" />
        <x-excursion.form.ui.input fieldName="onoma_praktoreio" label="Όνομα πρακτορείου" :value="$excursion->onoma_praktoreio ?? ''" />
        <x-excursion.form.ui.input fieldName="metaforika_mesa" label="Μεταφορικά μέσα" :value="$excursion->metaforika_mesa ?? ''" />
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Ημερομηνίες και ώρες">
        <x-excursion.form.ui.date fieldName="hmera_ekdromis_anaxorisis" label="Ημερομηνία αναχώρησης"
            :value="$excursion->hmera_ekdromis_anaxorisis?->format('Y-m-d')" />
        <x-excursion.form.ui.date fieldName="hmera_epistrofis" label="Ημερομηνία επιστροφής" :value="$excursion->hmera_epistrofis?->format('Y-m-d')" />
        <div class="text-sm col-span-2">[Από την έναρξη του διδακτικού έτους έως και δέκα (10) ημέρες πριν από τη λήξη
            των μαθημάτων]</div>
        <div>
            <x-excursion.form.ui.input fieldName="diarkeia_hmeres" label="Διάρκεια (ημέρες)" type="number"
                min="1" :value="$excursion->diarkeia_hmeres ?? ''" />
            <div class="text-sm col-span-2">[Μπορεί να συμπεριλαμβάνονται έως 2 διανυκτερεύσεις]</div>
        </div>
        <div></div>
        <div>
            <x-excursion.form.ui.time fieldName="ora_anaxorisis"
                label="Ώρα αναχώρησης από το σχολείο ή από άλλο καθορισμένο χώρο " :value="$excursion->ora_anaxorisis ?? ''" />
            <div class="text-sm">[μετά τις 6.00 π.μ.]</div>
        </div>
        <div>
            <x-excursion.form.ui.time fieldName="ora_epistrofis"
                label="Ώρα επιστροφής στο σχολείο ή σε άλλο καθορισμένο χώρο" :value="$excursion->ora_epistrofis ?? ''" />
            <div class="text-sm">[το αργότερο έως τις 10.00 μ.μ. όταν η εκδρομή πραγματοποιείται οδικώς]</div>
        </div>
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Συμμετοχές">
        <x-excursion.form.ui.input fieldName="tmimata" label="Τάξη ή/και τμήμα" :value="$excursion->tmimata ?? ''" />
        <div></div>
        <x-excursion.form.ui.input fieldName="ar_mathiton" label="Συνολικός αριθμός μαθητών" type="number"
            min="1" :value="$excursion->ar_mathiton ?? ''" />
        <x-excursion.form.ui.input fieldName="ar_metakinoumenon" label="Αριθμός μετακινούμενων μαθητών" type="number"
            min="1" :value="$excursion->ar_metakinoumenon ?? ''" />
        <x-excursion.form.ui.input fieldName="plithos_synodoi" label="Πλήθος συνοδών (εκτός του/της αρχηγού)"
            type="number" min="0" :value="$excursion->plithos_synodoi ?? ''" />
        <x-excursion.form.ui.input fieldName="covered" label="Καλυπτόμενοι μαθητές" type="number" :value="0"
            :readonly="true" />
        <div class="text-sm col-span-2">[Σε εξαιρετικές περιπτώσεις επιτρέπονται μέχρι δύο επιπλέον συνοδοί εφόσον ο
            Σύλλογος Διδασκόντων το κρίνει απαραίτητο και το αιτιολογεί πλήρως]</div>
        <div class="flex flex-col gap-2">
            <div class="space-x-2">
                <input type="hidden" name="70percent" value="true">
                <label for="inp_70_percent">Συμμετέχουν σε ποσοστό 70%:</label><input type="checkbox" checked
                    name="inp_70_percent" id="inp_70_percent" />
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
        document.querySelector('#covered').value = document.querySelector('#plithos_synodoi').value * 25;
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
    })();
</script>
