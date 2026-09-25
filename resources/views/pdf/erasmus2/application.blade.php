@extends('layouts.pdf')

@section('content')
    <x-excursion.transmittal.header :date="$excursion->hmera_diavivastikou?->format('d-m-Y')" :protocol="$excursion->ar_prot_sxoleiou" />

    <p class="center title">ΑΙΤΗΣΗ<br>Για έγκριση μετακίνησης μαθητών και εκπαιδευτικών με πρόγραμμα ERASMUS+</p>
    <p class="center">Παρακαλούμε να εγκρίνετε την παρακάτω μετακίνηση των
        μαθητών/τριών και εκπαιδευτικών του σχολείου μας, στο εξωτερικό με
        πρόγραμμα Erasmus+
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
        πλαίσιο της Υ.Α. 109113/ΓΔ4/19-8-2026, (ΦΕΚ 5237/τ.Β'/19-08-2026) - άρθρο 12).
    </p>
    Στόχοι εκπαιδευτικής δράσης:
    <ul>
        @foreach ($excursion->stoxoi ?? [] as $stoxos)
            <li>{{ $stoxos }}</li>
        @endforeach
    </ul>
    <p class="lh-1.5">
        Αρ. πρωτοκόλλου και ημερομηνία διαβίβασης αιτήματος ανάρτησης προκήρυξης:<br>
        {{ $excursion->ar_pr_anartisisprok }} [Δεν απαιτείται όταν οι μετακινούμενοι είναι έως δέκα (10) μαζί με τους
        εκπ/κούς]
        <br>

        Αριθμός και ημερομηνία πράξης του διευθυντή για την επιλογή του τουριστικού γραφείου:<br>
        {{ $excursion->praji_epilogi_praktoreiou }}
        [Δεν απαιτείται όταν οι μετακινούμενοι είναι έως δέκα (10) μαζί με τους εκπ/κούς]<br>

        Αριθμός και ημερομηνία της πράξης του Σ.Δ. για τη συγκρότηση της παιδαγωγικής
        ομάδας: {{ $excursion->erasmus_ar_prajis_syllogou_sigrotisi }}<br>

        Αριθμός και ημερομηνία της πράξης του Σ.Δ. για την ανασυγκρότηση της παιδαγωγικής ομάδας:
        {{ $excursion->erasmus_ar_prajis_syllogou_anasigrotisi }} (εάν η Π.Ο. έχει τροποποιηθεί).<br>

        Αριθμός και ημερομηνία της πράξης του Σ.Δ. για την απόφαση της μετακίνησης:
        {{ $excursion->ar_prajis_syllogou }}<br>

        @if ($excursion->erasmus_ar_prajis_syllogon_sinainesi)
            Αριθμός και ημερομηνία της πράξης του/των Σ.Δ του/των ΕΠΑΛ ότι συναινεί/ούν για
            τη μετακίνηση του Ε.Κ: {{ $excursion->erasmus_ar_prajis_syllogon_sinainesi }}<br>
        @endif

        @if ($excursion->erasmus_ar_prot_beb_dieythinton)
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

        Ώρα αναχώρησης από Θεσσαλονίκη: {{ $excursion->ora_anaxorisis }} Ώρα αναχώρησης για επιστροφή:
        {{ $excursion->ora_apoxorisis }}<br>

        Ώρα άφιξης στον προορισμό: {{ $excursion->ora_afijis }} Ώρα άφιξης στη Θεσσαλονίκη:
        {{ $excursion->ora_epistrofis }}<br>

        Μεταφορικό μέσο: {{ $excursion->metaforika_mesa }}<br>
    </p>

    <div class="lh-1.5">
        <br>Ονοματεπώνυμο και τάξη μετακινούμενων μαθητών/τριών:<br>

        <ol>
            @foreach (explode("\n", $excursion->erasmus_lista_mathites_kaitaji ?? '') as $student)
                @if ($student)
                    <li>$student</li>
                @endif
            @endforeach
        </ol>

        <br>Ονοματεπώνυμο και ειδικότητα συνοδών εκπαιδευτικών:<br>

        <ol>
            @foreach (explode("\n", $excursion->erasmus_lista_kathig_kaieidikotita ?? '') as $teacher)
                @if ($teacher)
                    <li>$teacher</li>
                @endif
            @endforeach
        </ol>

        <br>Ονοματεπώνυμο και ειδικότητα αναπληρωτών συνοδών εκπαιδευτικών:<br>

        <ol>
            @foreach (explode("\n", $excursion->erasmus_lista_anaplirkathig_kaieid ?? '') as $teacher)
                @if ($teacher)
                    <li>$teacher</li>
                @endif
            @endforeach
        </ol>
    </div>

    <div class="lh-1.5 justify">
        <br><br>
        <b>Δ. ΜΕ ΤΟ ΠΑΡΟΝ ΒΕΒΑΙΩΝΩ ΟΤΙ:</b><br>

        <ol>
            <li>Έχουν κατατεθεί και τηρούνται στο αρχείο του σχολείου οι υπεύθυνες δηλώσεις συναίνεσης των ασκούντων την
                επιμέλεια των μαθητών/τριών που συμμετέχουν στη δράση σύμφωνα με τα οριζόμενα στο άρθρο 20 ή των ιδίων
                εφόσον πρόκειται για ενήλικους/ες μαθητές/τριες. </li>
            <li>α. Ο/Η αρχηγός της μετακίνησης και ο/η αναπληρωτής/τρια του/της ανήκουν στο Σύλλογο Διδασκόντων του σχολείου
                και είναι μόνιμοι εκπαιδευτικοί (ή αναπληρωτές/τριες πλήρους ωραρίου εφόσον δεν υπάρχει μόνιμος/η) και<br />
                β. οι συνοδοί και οι αναπληρωτές/τριες τους είναι μέλη του Συλλόγου Διδασκόντων. </li>
            <li>Δεν παρακωλύεται η ομαλή λειτουργία της σχολικής μονάδας. </li>
            <li>Πραγματοποιήθηκε η διαδικασία προκήρυξης εκδήλωσης ενδιαφέροντος, αξιολόγησης και επιλογής προσφοράς για
                εύρεση ταξιδιωτικού πρακτορείου (Δεν απαιτείται όταν οι μετακινούμενοι/ες είναι έως δέκα (10)
                συμπεριλαμβανομένων των εκπαιδευτικών)</li>
            <li>Όλοι οι συμμετέχοντες/ουσες έχουν Ευρωπαϊκή Κάρτα Ασφάλισης Ασθένειας ή ασφαλιστήριο συμβόλαιο ή βεβαίωση
                του ασφαλιστικού φορέα η οποία αναφέρει πως το ασφαλιστήριο συμβόλαιο καλύπτει τα έξοδα νοσηλείας του/της
                ασφαλισμένου/ης στη χώρα προορισμού</li>
            <li>Η διάρκεια μετακινήσεων των μαθητών/τριών στο πλαίσιο του Erasmus+ δεν υπερβαίνει τις είκοσι δύο (22) ημέρες
                ανά σχολικό έτος.</li>
            <li>Δεν προκύπτει δαπάνη για το δημόσιο.</li>
            <li>Εφαρμόστηκαν όλα τα προβλεπόμενα της Υ.Α. 109113/ΓΔ4/19-8-2026, (ΦΕΚ 5237/τ.Β'/19-08-2026)</li>
        </ol>
        <br> <br>
        Παρακαλούμε για τις δικές σας ενέργειες.<br>
    </div>

    ΟΙ ΣΥΜΜΕΤΕΧΟΝΤΕΣ/ΧΟΥΣΕΣ ΕΚΠΑΙΔΕΥΤΙΚΟΙ<br>
    (ονοματεπώνυμο - υπογραφή)<br>
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
