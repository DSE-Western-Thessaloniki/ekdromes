@props(['excursion' => null, 'mode' => 'create'])

<div class="flex flex-col gap-2 mb-4">
    <x-excursion.form.ui.section title="Γενικά">
        <x-excursion.form.ui.input fieldName="eidos_programmatos" label="Είδος προγράμματος" :value="$excursion->eidos_programmatos ?? ''" />
        <x-excursion.form.ui.input fieldName="titlos_programmatos" label="Τίτλος του προγράμματος" :value="$excursion->titlos_programmatos ?? ''" />
        <x-excursion.form.ui.input fieldName="ar_pr_egrisis_programmatosdde" label="Κωδικός προγράμματος"
            :value="$excursion->ar_pr_egrisis_programmatosdde ?? ''" />
        <x-excursion.form.ui.input fieldName="erasmus_ar_simbasis" label="Αριθμός σύμβασης" :value="$excursion->erasmus_ar_simbasis ?? ''" />
        <x-excursion.form.ui.input fieldName="ar_prajis_syllogou" label="Αριθμός και ημερομηνία πράξης συλλόγου"
            :value="$excursion->ar_prajis_syllogou ?? ''" />
        <x-excursion.form.ui.input fieldName="proorismos" label="Προορισμός" :value="$excursion->proorismos ?? ''" />
        <x-excursion.form.ui.input fieldName="metaforika_mesa" label="Μεταφορικά μέσα" :value="$excursion->metaforika_mesa ?? ''" />
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Ημερομηνίες και ώρες">
        <x-excursion.form.ui.date fieldName="hmera_ekdromis_anaxorisis" label="Ημερομηνία αναχώρησης"
            :value="$excursion->hmera_ekdromis_anaxorisis?->format('Y-m-d')" />
        <x-excursion.form.ui.date fieldName="hmera_epistrofis" label="Ημερομηνία επιστροφής" :value="$excursion->hmera_epistrofis?->format('Y-m-d')" />
        <x-excursion.form.ui.input fieldName="diarkeia_hmeres" label="Διάρκεια (ημέρες)" type="number" min="1"
            :value="$excursion->diarkeia_hmeres ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_anaxorisis" label="Ώρα αναχώρησης" :value="$excursion->ora_anaxorisis ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_afijis" label="Εκτιμώμενη ώρα άφιξης" :value="$excursion->ora_afijis ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_apoxorisis" label="Εκτιμώμενη ώρα αποχώρησης" :value="$excursion->ora_apoxorisis ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_epistrofis" label="Ώρα επιστροφής" :value="$excursion->ora_epistrofis ?? ''" />
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Συμμετοχές">
        <x-excursion.form.ui.textarea fieldName="erasmus_lista_kathig_kaieidikotita"
            label="Ονομαστική λίστα μετακινούμενων εκπαιδευτικών (ονοματεπώνυμο και ειδικότητα)"
            lineNumbers>{{ $excursion->erasmus_lista_kathig_kaieidikotita ?? '' }}</x-excursion.form.ui.textarea>
    </x-excursion.form.ui.section>
</div>
