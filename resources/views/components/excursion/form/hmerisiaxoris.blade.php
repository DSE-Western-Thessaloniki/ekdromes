@props(['excursion' => null, 'mode' => 'create'])

@php
    $isEdit = $mode === 'edit';
@endphp

<div class="flex flex-col gap-2 mb-4">
    <x-excursion.form.ui.section title="Γενικά">
        <x-excursion.form.ui.input fieldName="ar_prajis_syllogou"
            label="Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση" :value="$excursion->ar_prajis_syllogou ?? ''" />
        <x-excursion.form.ui.input fieldName="a_arithmos"
            label="Αύξων αριθμός εκδρομής αυτού του είδους (επιτρέπεται μια ανά σχ. έτος)" type="number" min="1"
            :readonly="true" :value="$excursion->a_arithmos ?? 1" />
        <x-excursion.form.ui.input fieldName="proorismos" label="Προορισμός" :value="$excursion->proorismos ?? ''" />
        <x-excursion.form.ui.input fieldName="onoma_praktoreio" label="Μεταφορικό μέσο" :value="$excursion->onoma_praktoreio ?? ''" />
        <x-excursion.form.ui.input fieldName="metaforika_mesa" label="Μεταφορικό μέσο" :value="$excursion->metaforika_mesa ?? ''" />
    </x-excursion.form.ui.section>

    <x-excursion.form.ui.section title="Ημερομηνίες">
        <x-excursion.form.ui.date fieldName="hmera_ekdromis_anaxorisis"
            label="Ημερομηνία εκδρομής [Ενημερώστε τη ΔΔΕ (με οριστική υποβολή) τουλάχιστον μία ημέρα πριν]"
            :value="$excursion->hmera_ekdromis_anaxorisis?->format('Y-m-d')" />
    </x-excursion.form.ui.section>

    <x-excursion.form.ui.section title="Συμμετοχές">
        <x-excursion.form.ui.input fieldName="ar_mathiton" label="Αριθμός φοιτούντων μαθητών/τριών" type="number"
            min="1" :value="$excursion->ar_mathiton ?? 1" />
        <x-excursion.form.ui.input fieldName="ar_metakinoumenon" label="Αριθμός μετακινούμενων μαθητών" type="number"
            min="1" :value="$excursion->ar_metakinoumenon ?? 1" />
        <x-excursion.form.ui.input fieldName="plithos_synodoi"
            label="Πλήθος συνοδών εκπαιδευτικών(εκτός από τον αρχηγό της εκδρομής)" type="number" min="0"
            :value="$excursion->plithos_synodoi ?? 0" />
        <x-excursion.form.ui.input fieldName="covered" label="Καλυπτόμενοι μαθητές" type="number" :value="0"
            :readonly="true" />
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
