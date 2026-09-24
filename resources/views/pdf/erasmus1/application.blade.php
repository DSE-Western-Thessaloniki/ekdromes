@extends('layouts.pdf')

@section('content')
    <x-excursion.transmittal.header :date="$excursion->hmera_diavivastikou?->format('d-m-Y')" :protocol="$excursion->ar_prot_sxoleiou" />

    <p class="center title">ΑΙΤΗΣΗ<br>Για έγκριση μετακίνησης εκπαιδευτικών με πρόγραμμα ERASMUS+</p>
    <p class="center">Παρακαλούμε να εγκρίνετε την παρακάτω μετακίνηση των
        εκπαιδευτικών του σχολείου μας, στο εξωτερικό με πρόγραμμα Erasmus+
    </p>

    <br>
    <table>
        <tr>
            <td class="w-50">
                <b>Α. ΣΤΟΙΧΕΙΑ ΣΧΟΛΙΚΗΣ ΜΟΝΑΔΑΣ</b><br>
                <x-excursion.application.school-details :school-name="$excursion->school->displayname" :phone-numbers="$excursion->school->phonenumbers" :email="$excursion->school->email" />
                Διευθυντής/ντρια: {{ $excursion->onoma_ypografonta }}
            </td>
            <td class="w-50">
                <b>Β. ΤΟΠΟΣ, ΠΛΑΙΣΙΟ ΜΕΤΑΚΙΝΗΣΗΣ</b><br>
                Τόπος μετακίνησης: {{ $excursion->proorismos }}<br>
                Τίτλος προγράμματος: {{ $excursion->titlos_programmatos }}<br>
                Κωδικός: {{ $excursion->ar_pr_egrisis_programmatosdde }}<br>
                Αρ. Σύμβασης: {{ $excursion->erasmus_ar_simbasis }}<br>
            </td>
        </tr>
    </table>

    <p class="lh-1.5">
        <b>Γ. ΣΤΟΙΧΕΙΑ ΜΕΤΑΚΙΝΗΣΗΣ</b> (Η μετακίνηση πραγματοποιείται στο
        πλαίσιο των Υ.Α. 109113/ΓΔ4/19-8-2026, (ΦΕΚ 5237/τ.Β'/19-08-2026) - άρθρο 12).
    </p>
    Στόχοι εκπαιδευτικής δράσης:
    <ul>
        @foreach ($excursion->stoxoi ?? [] as $stoxos)
            <li>{{ $stoxos }}</li>
        @endforeach
    </ul>

    <p class="lh-1.5">
        Αρ. πρωτοκόλλου και ημερομηνία διαβίβασης αιτήματος ανάρτησης προκήρυξης:
        {{ $excursion->ar_pr_anartisisprok }} [Ανάρτηση για μειοδοτικό δε
        γίνεται όταν οι μετακινούμενοι είναι έως δέκα (10)]
        <br>

        Αριθμός και ημερομηνία πράξης του διευθυντή για την επιλογή του τουριστικού γραφείου:
        {{ $excursion->praji_epilogi_praktoreiou }}
        [δε γίνεται όταν οι μετακινούμενοι είναι έως δέκα (10)]<br>

        Αριθμός και ημερομηνία της πράξης του Σ.Δ. για τη συγκρότηση της παιδαγωγικής
        ομάδας: {{ $excursion->erasmus_ar_prajis_syllogou_sigrotisi }}<br>

        Αριθμός και ημερομηνία της πράξης του Σ.Δ. για την ανασυγκρότηση της παιδαγωγικής ομάδας:
        {{ $excursion->erasmus_ar_prajis_syllogou_anasigrotisi }} (εάν η Π.Ο. έχει τροποποιηθεί).<br>

        Αριθμός και ημερομηνία της πράξης του Σ.Δ. για την απόφαση της μετακίνησης:
        {{ $excursion->ar_prajis_syllogou }}<br>

        @if ($excursion->erasmus_ar_prajis_syllogon_sinainesi !== '')
            Αριθμός και ημερομηνία της πράξης του/των Σ.Δ του/των ΕΠΑΛ ότι συναινεί/ούν για
            τη μετακίνηση του Ε.Κ: {{ $excursion->erasmus_ar_prajis_syllogon_sinainesi }}<br>
        @endif

        @if ($excursion->erasmus_ar_prot_beb_dieythinton !== '')
            Βεβαίωση συναίνεσης του/της Διευθυντή/ντριας της σχολικής μονάδας για τον/την εκπαιδευτικό που συμπληρώνει το
            διδακτικό του ωράριο σε άλλη σχολική μονάδα: {{ $excursion->erasmus_ar_prot_beb_dieythinton }}<br>
        @endif

        Αριθμός Ασφαλιστηρίου Συμβολαίου Αστικής-Επαγγελματικής Ευθύνης για τη διάρκεια του
        ταξιδιού και της διαμονής: {{ $excursion->asf_symbolaio }}<br>

        <b>Ημερομηνία Αναχώρησης: {{ $excursion->hmera_ekdromis_anaxorisis?->format('d-m-Y') }} Ημερομηνία Επιστροφής:
            {{ $excursion->hmera_epistrofis?->format('d-m-Y') }}</b><br>
        (Οποτεδήποτε μέσα στο σχολικό έτος εκτός της περιόδου των ενδοσχολικών
        και πανελλαδικών εξετάσεων και σύμφωνα με τις ημερομηνίες του προγράμματος)<br> <br>

        Διάρκεια μετακίνησης (σύνολο ημερών): {{ $excursion->diarkeia_hmeres }}<br>

        Ώρα αναχώρησης από Θεσσαλονίκη: {{ $excursion->ora_anaxorisis }} Ώρα αναχώρησης για επιστροφή:
        {{ $excursion->ora_apoxorisis }}<br>

        Ώρα άφιξης στον προορισμό: {{ $excursion->ora_afijis }} Ώρα άφιξης στη Θεσσαλονίκη:
        {{ $excursion->ora_epistrofis }}<br>

        Μεταφορικό μέσο: {{ $excursion->metaforika_mesa }}<br>
    </p>

    <p class="lh-1.5">
        <br>Ονοματεπώνυμο/κλάδος μετακινούμενων εκπαιδευτικών:<br>
    </p>
    <ol>
        @foreach (explode("\n", $excursion->erasmus_lista_kathig_kaieidikotita ?? '') as $teacher)
            @if ($teacher)
                <li>$teacher</li>
            @endif
        @endforeach
    </ol>
    <br><br>
    <b>Δ. ΜΕ ΤΟ ΠΑΡΟΝ ΒΕΒΑΙΩΝΩ ΟΤΙ:</b><br>

    <div class="justify">
        <ol>
            <li>
                Οι μετακινούμενοι/ες εκπαιδευτικοί ανήκουν στο σχολείο και είναι μέλη της παιδαγωγικής ομάδας.
            </li>
            <li>
                Ότι πραγματοποιήθηκε μειοδοτικός διαγωνισμός για την επιλογή ταξιδιωτικού γραφείου ή ότι
                δεν απαιτείται (όταν οι μετακινούμενοι είναι έως δέκα (10) μαζί με τους εκπαιδευτικούς).
            </li>
            <li>Δεν παρακωλύεται η ομαλή λειτουργία της σχολικής μονάδας.</li>
            <li>
                Όλοι οι συμμετέχοντες έχουν Ευρωπαϊκή κάρτα ασφάλισης ή επισυνάπτονται τα ασφαλιστήρια
                συμβόλαια ιατροφαρμακευτικής κάλυψης των συμμετεχόντων.
            </li>
            <li>Η διάρκεια μετακινήσεων των εκπαιδευτικών για κατάρτιση, επιμόρφωση ή διδασκαλία δεν υπερβαίνει τις
                δεκατέσσερις (14) ημέρες ανά διδακτικό έτος.</li>
            <li>
                Δεν προκύπτει δαπάνη για το δημόσιο.
            </li>
            <li>
                Εφαρμόστηκαν όλα τα προβλεπόμενα της Υ.Α. 109113/ΓΔ4/19-8-2026, (ΦΕΚ 5237/τ.Β'/19-08-2026).
            </li>
        </ol>

        Παρακαλούμε για τις δικές σας ενέργειες.<br>
    </div>
    <br>
    ΟΙ ΣΥΜΜΕΤΕΧΟΝΤΕΣ/ΧΟΥΣΕΣ ΕΚΠΑΙΔΕΥΤΙΚΟΙ<br>(ονοματεπώνυμο - υπογραφή)<br>
    <ol>
        @foreach (explode("\n", $excursion->erasmus_lista_kathig_kaieidikotita ?? '') as $teacher)
            @if ($teacher)
                <li>$teacher _________</li>
            @endif
        @endforeach
    </ol>

    <x-excursion.transmittal.signature :title="$excursion->prosfonisi_ypografonta" :name="$excursion->onoma_ypografonta" class="signature" />
    <p class="center">(σφραγίδα - υπογραφή)</p>
@endsection
