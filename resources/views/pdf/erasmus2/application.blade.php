@extends('layouts.pdf')

@section('content')
    <x-excursion.transmittal.header :date="$excursion->hmera_diavivastikou?->format('d-m-Y')" :protocol="$excursion->ar_prot_sxoleiou" />

    <p class="center title">ΑΙΤΗΣΗ<br>Για έγκριση μετακίνησης μαθητών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2</p>
    <p class="center">Παρακαλούμε να εγκρίνετε την παρακάτω μετακίνηση των
        μαθητών/τριών και εκπαιδευτικών του σχολείου μας, στο εξωτερικό με
        πρόγραμμα Erasmus+ΚΑ2
    </p>

    <br>
    <table>
        <tr>
            <td>
                <b>Α. ΣΤΟΙΧΕΙΑ ΣΧΟΛΙΚΗΣ ΜΟΝΑΔΑΣ</b><br>
                <x-excursion.application.school-details :school-name="$excursion->school->displayname" :phone-numbers="$excursion->school->phonenumbers" :email="$excursion->school->email" /><br>
                {{ $excursion->prosfonisi_ypografonta }}: {{ $excursion->onoma_ypografonta }}
            </td>
            <td>
                <b>Β. ΤΟΠΟΣ, ΠΛΑΙΣΙΟ ΜΕΤΑΚΙΝΗΣΗΣ</b><br>
                Τόπος μετακίνησης: {{ $excursion->proorismos }}<br>
                Τίτλος προγράμματος: {{ $excursion->titlos_programmatos }}<br>
                Κωδικός: {{ $excursion->ar_pr_egrisis_programmatosdde }}<br>
                Αρ. Σύμβασης: {{ $excursion->erasmus_ar_simbasis }}<br>
            </td>
        </tr>
    </table>

    <p class="lh-1.5 page-break">
        <b>Γ. ΣΤΟΙΧΕΙΑ ΜΕΤΑΚΙΝΗΣΗΣ</b> (Η μετακίνηση πραγματοποιείται στο
        πλαίσιο των Y.A. 25735/H1/20-02-2020, (ΦΕΚ 625/τ.Β΄/27-02-2020) και
        Y.A. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β'/13-02-2020)).<br> <br>

        Αρ. πρωτοκόλλου και ημερομηνία διαβίβασης αιτήματος ανάρτησης προκήρυξης:<br>
        {{ $excursion->ar_pr_anartisisprok }} [Ανάρτηση για μειοδοτικό δε
        γίνεται όταν οι μετακινούμενοι είναι έως δέκα (10) μαζί με τους Εκπ/κούς]
        <br>

        Αριθμός και ημερομηνία πράξης του διευθυντή για την επιλογή του τουριστικού γραφείου:<br>
        {{ $excursion->praji_epilogi_praktoreiou }}
        [δε γίνεται όταν οι μετακινούμενοι είναι έως δέκα (10) μαζί με τους Εκπ/κούς]<br>

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
            Αριθμός/οί πρωτοκόλλου και ημερομηνία/ες βεβαίωσης/σεων του
            Διευθυντή/ντών του/των σχολείου/σχολείων για τον/τους
            εκπαιδευτικό/κούς που διδάσκουν και σε αυτό/τά: {{ $excursion->erasmus_ar_prot_beb_dieythinton }}<br>
        @endif

        Αριθμός Ασφαλιστηρίου Συμβολαίου Αστικής-Επαγγελματικής Ευθύνης για τη διάρκεια του
        ταξιδιού και της διαμονής: {{ $excursion->asf_symbolaio }}<br>

        Ημερομηνία Αναχώρησης: {{ $excursion->hmera_ekdromis_anaxorisis?->format('d-m-Y') }} Ημερομηνία Επιστροφής:
        {{ $excursion->hmera_epistrofis?->format('d-m-Y') }}<br>
        (Οποτεδήποτε μέσα στο σχολικό έτος εκτός της περιόδου των ενδοσχολικών
        και πανελλαδικών εξετάσεων και σύμφωνα με τις ημερομηνίες του προγράμματος)<br> <br>

        Διάρκεια μετακίνησης (σύνολο ημερών): {{ $excursion->diarkeia_hmeres }}<br>

        Ώρα αναχώρησης: {{ $excursion->ora_anaxorisis }} Ώρα επιστροφής: {{ $excursion->ora_epistrofis }}<br>

        Ώρα άφιξης στον προορισμό: {{ $excursion->ora_afijis }} Ώρα αναχώρησης για επιστροφή:
        {{ $excursion->ora_apoxorisis }}<br>

        Μεταφορικό μέσο: {{ $excursion->metaforika_mesa }}<br>
    </p>

    <p style="lh-1.5 page-break">
        <br>Ονοματεπώνυμο και τάξη μετακινούμενων μαθητών/τριών:<br>

    <ol>
        @foreach (explode("\n", $excursion->erasmus_lista_mathites_kaitaji) as $student)
            <li>$student</li>
        @endforeach
    </ol>

    <br>Ονοματεπώνυμο και ειδικότητα συνοδών εκπαιδευτικών<br>

    <ol>
        @foreach (explode("\n", $excursion->erasmus_lista_kathig_kaieidikotita) as $teacher)
            <li>$teacher</li>
        @endforeach
    </ol>

    <br>Ονοματεπώνυμο και ειδικότητα αναπληρωτών συνοδών εκπαιδευτικών<br>

    <ol>
        @foreach (explode("\n", $excursion->erasmus_lista_anaplirkathig_kaieid) as $teacher)
            <li>$teacher</li>
        @endforeach
    </ol>
    </p>

    <p class="lh-1.5">
        <br><br>
        <b>Δ. ΜΕ ΤΟ ΠΑΡΟΝ ΒΕΒΑΙΩΝΩ ΟΤΙ:</b><br>

        1. Έχουν κατατεθεί και τηρούνται στο σχολείο οι υπεύθυνες δηλώσεις των γονέων/κηδεμόνων των
        συμμετεχόντων μαθητών/τριών, με τις οποίες εγκρίνουν τη μετακίνηση τους, αφού προηγουμένως
        ενημερώθηκαν εγγράφως για το πρόγραμμα και τις υποχρεώσεις των μαθητών/τριών και αναγράφουν
        κάποιο πρόβλημα υγείας (εάν ναι επισυνάπτεται ενημερωτικό σημείωμα). (Σε περίπτωση που η μετακίνηση γίνεται
        πριν από τις 06:00 ή/και μετά τις 22:00 αναγράφεται στην υπεύθυνη δήλωση).<br>
        2. Ο αρχηγός της μετακίνησης και ο αναπληρωτής του είναι μόνιμοι εκπαιδευτικοί (ή αναπληρωτές πλήρους
        ωραρίου εφόσον δεν υπάρχει μόνιμος) οι συνοδοί και οι αναπληρωτές τους είναι εκπαιδευτικοί της Δ.Ε.
        και δεν είναι αναπληρωτές με μειωμένο ωράριο, ούτε ωρομίσθιοι. <br>
        3. Οι μετακινούμενοι εκπαιδευτικοί ανήκουν στο σχολείο και η αναλογία, κατά τη μετακίνηση, είναι 1/20
        μαθητές εκτός του αρχηγού. <br>
        4. Ότι πραγματοποιήθηκε μειοδοτικός διαγωνισμός για την επιλογή ταξιδιωτικού γραφείου ή ότι
        δεν απαιτείται (όταν οι μετακινούμενοι είναι έως δέκα (10) μαζί με τους εκπαιδευτικούς)<br>
        5. Όλοι οι εκπαιδευτικοί και οι αναπληρωτές τους είναι μέλη της παιδαγωγικής ομάδας.<br>
        6. Όλοι οι συμμετέχοντες έχουν Ευρωπαϊκή κάρτα ασφάλισης ή επισυνάπτονται τα ασφαλιστήρια
        συμβόλαια ιατροφαρμακευτικής κάλυψης των συμμετεχόντων.<br>
        7. Δε διαταράσσεται η ομαλή λειτουργία της σχολικής μονάδας και δεν προκύπτει δαπάνη
        για το δημόσιο.<br>
        8. Εφαρμόστηκαν όλα τα προβλεπόμενα στις με αρ. 25735/H1/20-02-2020 Y.A. (ΦΕΚ 625/τ.Β΄/27-02-2020) και
        20883/ΓΔ4/12-02-2020 Y.A. (ΦΕΚ 456/τ.Β'/13-02-2020) <br>
        <br> <br>
        Παρακαλούμε για τις δικές σας ενέργειες.<br>
    </p>

    ΟΙ ΣΥΜΜΕΤΕΧΟΝΤΕΣ/ΧΟΥΣΕΣ ΕΚΠΑΙΔΕΥΤΙΚΟΙ (υπογραφή)<br>
    <ol>
        @foreach (explode("\n", $excursion->erasmus_lista_kathig_kaieidikotita) as $teacher)
            <li>$teacher _________</li>
        @endforeach
    </ol>

    <x-excursion.transmittal.signature :title="$excursion->prosfonisi_ypografonta" :name="$excursion->onoma_ypografonta" class="signature" />
    <p class="center">(σφραγίδα - υπογραφή)</p>
@endsection
