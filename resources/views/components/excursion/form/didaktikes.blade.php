@props(['excursion' => null, 'mode' => 'create'])

<div class="flex flex-col gap-2 mb-4">
    <x-excursion.form.ui.section title="Γενικά">
        <x-excursion.form.ui.input fieldName="titlos_programmatos" label="Στο πλαίσιο του μαθήματος" :value="$excursion->titlos_programmatos ?? ''" />
        <div>
            <x-excursion.form.ui.input fieldName="ar_prajis_syllogou"
                label="Πράξη συλλόγου βάσει της οποίας γίνεται η μετακίνηση" :value="$excursion->ar_prajis_syllogou ?? ''"
                placeholder="Αριθμός και ημερομηνία" />
            <div class="text-sm col-span-2">[Απόφαση του Σ.Δ. για τη μετακίνηση 10 ημέρες πριν]</div>
        </div>
        <div>
            <x-excursion.form.ui.input fieldName="a_arithmos"
                label="Αύξων αριθμός εκδρομής αυτού του είδους (π.χ. 1 αν είναι η πρώτη για φέτος)" type="number"
                min="1" :value="$excursion->a_arithmos ?? 1" />
            <div class="text-sm col-span-2">[Έως εννέα (9) διδακτικές επισκέψεις, ανά τάξη ή τμήμα ή ομάδες τμημάτων,
                τομέα
                ειδικότητα ή τμήμα ειδικότητας]</div>
        </div>
        <x-excursion.form.ui.input fieldName="proorismos" label="Προορισμός" :value="$excursion->proorismos ?? ''" />
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Ημερομηνία">
        <x-excursion.form.ui.date fieldName="hmera_ekdromis_anaxorisis" label="Ημερομηνία επίσκεψης"
            :value="$excursion?->hmera_ekdromis_anaxorisis?->format('Y-m-d')" />
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Συμμετοχές">
        <x-excursion.form.ui.input fieldName="tmimata" label="Τάξεις ή τμήματα (διαχωρίστε με κόμματα αν χρειάζεται)"
            :value="$excursion->tmimata ?? ''" />
        <x-excursion.form.ui.input fieldName="ar_metakinoumenon" label="Αριθμός μετακινούμενων μαθητών" type="number"
            min="1" :value="$excursion->ar_metakinoumenon ?? ''" />
        <x-excursion.form.ui.input fieldName="plithos_synodoi" label="Πλήθος συνοδών (εκτός του αρχηγού)" type="number"
            min="1" :value="$excursion->plithos_synodoi ?? ''" />
        <x-excursion.form.ui.input fieldName="covered" label="Καλυπτόμενοι μαθητές" type="number" :value="0"
            :readonly="true" />
        <div class="text-sm col-span-2">[Ένας 1 συνοδός/25 μαθητές (εκτός του αρχηγού). Σε εξαιρετικές περιπτώσεις
            επιτρέπονται μέχρι δύο επιπλέον συνοδοί εφόσον ο Σύλλογος Διδασκόντων το κρίνει απαραίτητο και το αιτιολογεί
            πλήρως]</div>
    </x-excursion.form.ui.section>
</div>
<script>
    (function() {
        document.querySelector('#covered').value = document.querySelector('#plithos_synodoi').value * 25;
        document.querySelector('#plithos_synodoi').addEventListener("input", () => {
            document.querySelector('#covered').value = document.querySelector('#plithos_synodoi')
                .value * 25;
        });
    })();
</script>
