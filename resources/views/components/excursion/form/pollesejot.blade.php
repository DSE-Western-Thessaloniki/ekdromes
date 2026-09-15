@props(['excursion' => null, 'mode' => 'create'])

<div class="flex flex-col gap-2 mb-4">
    <x-excursion.form.ui.section title="Γενικά">
        <x-excursion.form.ui.input fieldName="ar_prajis_syllogou" label="Αριθμός και ημερομηνία πράξης συλλόγου"
            :value="$excursion->ar_prajis_syllogou ?? ''" />
        <x-excursion.form.ui.input fieldName="asf_symbolaio" label="Αριθμός ασφαλιστηρίου συμβολαίου" :value="$excursion->asf_symbolaio ?? ''" />
        <x-excursion.form.ui.input fieldName="praji_epilogi_praktoreiou"
            label="Πράξη διευθυντή για την επιλογή του τουριστικού γραφείου" :value="$excursion->praji_epilogi_praktoreiou ?? ''" />
        <x-excursion.form.ui.input fieldName="ar_pr_anartisisprok"
            label="Αρ. πρ. και ημερομηνία διαβίβασης αιτήματος ανάρτησης προκήρυξης" :value="$excursion->ar_pr_anartisisprok ?? ''" />
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
        <x-excursion.form.ui.time fieldName="ora_anaxorisis" label="Ώρα αναχώρησης" :value="$excursion->ora_anaxorisis ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_afijis" label="Εκτιμώμενη ώρα άφιξης" :value="$excursion->ora_afijis ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_apoxorisis" label="Εκτιμώμενη ώρα αποχώρησης" :value="$excursion->ora_apoxorisis ?? ''" />
        <x-excursion.form.ui.time fieldName="ora_epistrofis" label="Ώρα επιστροφής" :value="$excursion->ora_epistrofis ?? ''" />
    </x-excursion.form.ui.section>
    <x-excursion.form.ui.section title="Συμμετοχές">
        <x-excursion.form.ui.input fieldName="ar_mathiton" label="Συνολικός αριθμός μαθητών/τριών" type="number"
            min="1" :value="$excursion->ar_mathiton ?? ''" />
        <x-excursion.form.ui.input fieldName="ar_metakinoumenon" label="Αριθμός μετακινούμενων μαθητών" type="number"
            min="1" :value="$excursion->ar_metakinoumenon ?? ''" />
        <x-excursion.form.ui.input fieldName="plithos_synodoi" label="Πλήθος συνοδών" type="number" min="0"
            :value="$excursion->plithos_synodoi ?? ''" />
    </x-excursion.form.ui.section>
</div>
