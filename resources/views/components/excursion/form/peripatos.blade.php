@props(['excursion' => null, 'mode' => 'create'])

@php
    $isEdit = $mode === 'edit';
@endphp

<div class="flex flex-col gap-2 mb-4">
    <x-excursion.form.ui.section title="Γενικά">
        <x-excursion.form.ui.input fieldName="ar_prajis_syllogou"
            label="Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση" :value="$excursion->ar_prajis_syllogou ?? ''" />
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
    </x-excursion.form.ui.section>

    <x-excursion.form.ui.section title="Ημερομηνίες">
        <x-excursion.form.ui.date fieldName="hmera_ekdromis_anaxorisis" label="Ημερομηνία εκδρομής" :value="$excursion->hmera_ekdromis_anaxorisis?->format('Y-m-d')" />
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
