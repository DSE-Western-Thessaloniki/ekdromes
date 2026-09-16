@props(['excursion' => null, 'mode' => 'create'])

<div class="flex flex-col gap-2 mb-4">
    <x-excursion.form.ui.section title="Γενικά">
        <x-excursion.form.ui.input fieldName="eidos_programmatos" label="Είδος προγράμματος" :value="$excursion->eidos_programmatos ?? ''" />
        <x-excursion.form.ui.input fieldName="titlos_programmatos" label="Τίτλος του προγράμματος" :value="$excursion->titlos_programmatos ?? ''" />
        <x-excursion.form.ui.input fieldName="ar_pr_egrisis_programmatosdde" label="Κωδικός προγράμματος"
            :value="$excursion->ar_pr_egrisis_programmatosdde ?? ''" />
        <div>
            <x-excursion.form.ui.input fieldName="erasmus_ar_simbasis" label="Αριθμός σύμβασης" :value="$excursion->erasmus_ar_simbasis ?? ''" />
            <div class="text-sm">[εάν χρειάζεται]</div>
        </div>
        <div>
            <x-excursion.form.ui.input fieldName="ar_pr_anartisisprok"
                label="Αρ. Πρ. και ημερομηνία διαβίβασης αιτήματος ανάρτησης προκήρυξης" :value="$excursion->ar_pr_anartisisprok ?? ''"
                placeholder="Αριθμός και ημερομηνία" />
            <div class="text-sm">[δε γίνεται ανάρτηση όταν οι μετακινούμενοι είναι έως 10 μαζί με τους Εκπ/κούς]</div>
        </div>
        <div>
            <x-excursion.form.ui.input fieldName="ar_pr_anartisisprok"
                label="Πράξη του διευθυντή για την επιλογή του τουριστικού γραφείου" :value="$excursion->ar_pr_anartisisprok ?? ''"
                placeholder="Αριθμός και ημερομηνία" />
            <div class="text-sm">[δε γίνεται όταν οι μετακινούμενοι είναι έως 10 μαζί με τους Εκπ/κούς]</div>
        </div>
        <x-excursion.form.ui.input fieldName="erasmus_ar_prajis_syllogou_sigrotisi"
            label="Πράξη συλλόγου για τη συγκρότηση της παιδαγωγικής ομάδας" :value="$excursion->erasmus_ar_prajis_syllogou_sigrotisi ?? ''"
            placeholder="Αριθμός και ημερομηνία" />
        <div>
            <x-excursion.form.ui.input fieldName="erasmus_ar_prajis_syllogou_anasigrotisi"
                label="Πράξη συλλόγου για την ανασυγκρότηση της παιδαγωγικής ομάδας" :value="$excursion->erasmus_ar_prajis_syllogou_anasigrotisi ?? ''"
                placeholder="Αριθμός και ημερομηνία" />
            <div class="text-sm">
                [εάν έχει τροποποιηθεί αλλιώς κενό]</div>
        </div>
        <x-excursion.form.ui.input fieldName="ar_prajis_syllogou"
            label="Πράξη συλλόγου βάσει της οποίας γίνεται η μετακίνηση" :value="$excursion->ar_prajis_syllogou ?? ''"
            placeholder="Αριθμός και ημερομηνία" />
        <div>
            <x-excursion.form.ui.input fieldName="erasmus_ar_prajis_syllogon_sinainesi"
                label="Πράξη συλλόγου του/των ΕΠΑΛ ότι συναινεί/ούν για τη μετακίνηση του Ε.Κ." :value="$excursion->erasmus_ar_prajis_syllogon_sinainesi ?? ''"
                placeholder="Αριθμός και ημερομηνία" />
            <div class="text-sm">[εφόσον χρειάζεται]</div>
        </div>
        <div>
            <x-excursion.form.ui.input fieldName="erasmus_ar_prot_beb_dieythinton"
                label="Αριθμός πρωτοκόλλου και ημερομηνία βεβαίωσης/σεων του Διευθυντή/ντών του/των σχολείου/σχολείων για τον/τους εκπαιδευτικό/κούς που διδάσκουν και σε αυτό/τά"
                :value="$excursion->erasmus_ar_prot_beb_dieythinton ?? ''" placeholder="Αριθμός πρωτοκόλλου και ημερομηνία" />
            <div class="text-sm">[εφόσον χρειάζεται]</div>
        </div>
        <div></div>
        <x-excursion.form.ui.input fieldName="asf_symbolaio"
            label="Αριθμός ασφαλιστηρίου συμβολαίου αστικής-επαγγελματικής ευθύνης για τη διάρκεια του ταξιδιού και της διαμονής"
            :value="$excursion->asf_symbolaio ?? ''" />
        <div></div>
        <x-excursion.form.ui.input fieldName="proorismos" label="Προορισμός" :value="$excursion->proorismos ?? ''" />
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
        <x-excursion.form.ui.textarea fieldName="erasmus_lista_kathig_kaieidikotita"
            label="Ονομαστική λίστα μετακινούμενων εκπαιδευτικών (ονοματεπώνυμο και ειδικότητα)"
            lineNumbers>{{ $excursion->erasmus_lista_kathig_kaieidikotita ?? '' }}</x-excursion.form.ui.textarea>
    </x-excursion.form.ui.section>
</div>
