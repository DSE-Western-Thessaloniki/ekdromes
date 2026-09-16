@props(['excursion' => null, 'mode' => 'create'])

<div class="flex flex-col gap-2 mb-4">
    <x-excursion.form.ui.section title="Γενικά">
        <div>
            <x-excursion.form.ui.input fieldName="titlos_programmatos" label="Κυρίως έγγραφο μετακίνησης"
                :value="$excursion->titlos_programmatos ?? ''" />
            <div class="text-sm">[Τίτλος εγγράφου που να αποδεικνύει το λόγο της μετακίνησης πχ. την πρόσκληση, το
                επιβεβαιωμένο ραντεβού, την αποδοχή αιτήματος, το πρόγραμμα διοργάνωσης (π.χ. MUN) ή το αντίγραφο
                έγκρισης προγράμματος από το ΥΠΑΙΘ ή αντίγραφο διακρατικής συμφωνίας/μνημόνιο, κλπ]</div>
        </div>
        <x-excursion.form.ui.input fieldName="ar_prajis_syllogou"
            label="Πράξη συλλόγου βάσει της οποίας γίνεται η μετακίνηση" :value="$excursion->ar_prajis_syllogou ?? ''"
            placeholder="Αριθμός και ημερομηνία" />
        <x-excursion.form.ui.input fieldName="asf_symbolaio"
            label="Αριθμός ασφαλιστηρίου συμβολαίου για τη διάρκεια του ταξιδιού και της διαμονής" :value="$excursion->asf_symbolaio ?? ''" />
        <x-excursion.form.ui.input fieldName="praji_epilogi_praktoreiou"
            label="Πράξη διευθυντή για την επιλογή του τουριστικού γραφείου" :value="$excursion->praji_epilogi_praktoreiou ?? ''"
            placeholder="Αριθμός και ημερομηνία" />
        <x-excursion.form.ui.input fieldName="ar_pr_anartisisprok"
            label="Αρ. πρ. και ημερομηνία διαβίβασης αιτήματος ανάρτησης προκήρυξης" :value="$excursion->ar_pr_anartisisprok ?? ''" />
        <div></div>
        <x-excursion.form.ui.input fieldName="proorismos" label="Προορισμός" :value="$excursion->proorismos ?? ''" />
        <x-excursion.form.ui.input fieldName="onoma_jenodoxeio" label="Όνομα ξενοδοχείου" :value="$excursion->onoma_jenodoxeio ?? ''" />
        <x-excursion.form.ui.input fieldName="onoma_praktoreio" label="Όνομα πρακτορείου" :value="$excursion->onoma_praktoreio ?? ''" />
        <x-excursion.form.ui.input fieldName="metaforika_mesa" label="Μεταφορικά μέσα" :value="$excursion->metaforika_mesa ?? ''" />
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Ημερομηνίες και ώρες">
        <x-excursion.form.ui.date fieldName="hmera_ekdromis_anaxorisis" label="Ημερομηνία αναχώρησης"
            :value="$excursion->hmera_ekdromis_anaxorisis?->format('Y-m-d')" />
        <x-excursion.form.ui.date fieldName="hmera_epistrofis" label="Ημερομηνία επιστροφής" :value="$excursion->hmera_epistrofis?->format('Y-m-d')" />
        <x-excursion.form.ui.input fieldName="diarkeia_hmeres" label="Διάρκεια (ημέρες)" type="number" min="1"
            :value="$excursion->diarkeia_hmeres ?? ''" />
        <div></div>
        <x-excursion.form.ui.time fieldName="ora_anaxorisis"
            label="Ώρα αναχώρησης από το σχολείο ή από άλλο καθορισμένο χώρο" :value="$excursion->ora_anaxorisis ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_afijis"
            label="Εκτιμώμενη (τοπική) ώρα άφιξης στον/στους προορισμό/σμούς" :value="$excursion->ora_afijis ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_apoxorisis" label="Εκτιμώμενη (τοπική) ώρα αποχώρησης"
            :value="$excursion->ora_apoxorisis ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_epistrofis"
            label="Ώρα επιστροφής στο σχολείο ή σε άλλο καθορισμένο χώρο" :value="$excursion->ora_epistrofis ?? ''" />
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Συμμετοχές">
        <x-excursion.form.ui.input fieldName="ar_metakinoumenon" label="Αριθμός μετακινούμενων μαθητών" type="number"
            min="1" :value="$excursion->ar_metakinoumenon ?? ''" />
        <div></div>
        <x-excursion.form.ui.input fieldName="plithos_synodoi" label="Πλήθος συνοδών (εκτός του αρχηγού)" type="number"
            min="0" :value="$excursion->plithos_synodoi ?? ''" />
        <x-excursion.form.ui.input fieldName="covered" label="Καλυπτόμενοι μαθητές" type="number" :value="0"
            :readonly="true" />
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
        document.querySelector('#covered').value = document.querySelector('#plithos_synodoi').value * 20;
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
