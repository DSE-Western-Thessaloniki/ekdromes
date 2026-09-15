@props(['excursion' => null, 'mode' => 'create'])

<div class="flex flex-col gap-2 mb-4">
    <x-excursion.form.ui.section title="Γενικά">
        <x-excursion.form.ui.input fieldName="titlos_programmatos" label="Στο πλαίσιο του μαθήματος" :value="$excursion->titlos_programmatos ?? ''" />
        <x-excursion.form.ui.input fieldName="ar_prajis_syllogou" label="Αριθμός και ημερομηνία πράξης συλλόγου"
            :value="$excursion->ar_prajis_syllogou ?? ''" />
        <x-excursion.form.ui.input fieldName="proorismos" label="Προορισμός" :value="$excursion->proorismos ?? ''" />
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Ημερομηνία">
        <x-excursion.form.ui.date fieldName="hmera_ekdromis_anaxorisis" label="Ημερομηνία επίσκεψης" :value="$excursion->hmera_ekdromis_anaxorisis?->format('Y-m-d')" />
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Συμμετοχές">
        <x-excursion.form.ui.input fieldName="tmimata" label="Τάξεις ή τμήματα" :value="$excursion->tmimata ?? ''" />
        <x-excursion.form.ui.input fieldName="ar_metakinoumenon" label="Αριθμός μετακινούμενων μαθητών" type="number"
            min="1" :value="$excursion->ar_metakinoumenon ?? ''" />
        <x-excursion.form.ui.input fieldName="plithos_synodoi" label="Πλήθος συνοδών" type="number" min="1"
            :value="$excursion->plithos_synodoi ?? ''" />
    </x-excursion.form.ui.section>
</div>
