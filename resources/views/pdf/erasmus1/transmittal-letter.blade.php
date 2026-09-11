@extends('layouts.pdf')

@section('content')
    <x-excursion.transmittal.header :date="$excursion->hmera_diavivastikou?->format('d-m-Y')" :protocol="$excursion->ar_prot_sxoleiou" />

    <x-excursion.transmittal.school-details :school-name="$excursion->school->displayname" :phone-numbers="$excursion->school->phonenumbers" :email="$excursion->school->email" class="details" />

    @php
        $hmera_ekdromis = $excursion->hmera_ekdromis_anaxorisis?->format('d-m-Y');
        $hmera_epistrofis = $excursion->hmera_epistrofis?->format('d-m-Y');
    @endphp
    <p class="center title">ΔΙΑΒΙΒΑΣΤΙΚΟ
    <p>
    <p class="title">ΘΕΜΑ: Αποστολή αίτησης και δικαιολογητικών για την έγκριση
        μετακίνησης εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ1</p>

    <p class="indent justify">
        Σύμφωνα με τις Υ.Α 25735/Η1/20-02-2020, (ΦΕΚ 625/τ.Β'/27-02-2020) και
        Υ.Α.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β'/13-02-2020), σας διαβιβάζουμε την
        αίτηση μαζί με τα απαραίτητα δικαιολογητικά σχετικά με την έγκριση της
        μετακίνησης στον προορισμό: <i>{{ $excursion->proorismos }}</i> των:<br>
    <ol>
        @foreach (explode("\n", $excursion->erasmus_lista_kathig_kaieidikotita ?? '') as $teacher)
            @if ($teacher)
                <li>{{ $teacher }}</li>
            @endif
        @endforeach
    </ol>
    <br>στο πλαίσιο του Ευρωπαϊκού Προγράμματος Erasmus+ ΚΑ1 <i>{{ $excursion->eidos_programmatos }}</i>,
    με τίτλο: « {{ $excursion->titlos_programmatos }} » και
    κωδικό : {{ $excursion->ar_pr_egrisis_programmatosdde }}.<br>
    Η μετακίνηση θα πραγματοποιηθεί
    @if ($hmera_ekdromis !== $hmera_epistrofis)
        από <b>{{ $hmera_ekdromis }}</b> έως <b>{{ $hmera_epistrofis }}</b>.
    @else
        στις <b>{{ $hmera_ekdromis }}</b>.
    @endif
    <br> <br>
    </p>

    <p>
        Ο/Η Διευθυντής/ντρια του σχολείου και ο Σύλλογος Διδασκόντων <u>εισηγούμαστε</u> για την πραγματοποίησή της.
    </p>
    <p>
        Συνημμένα, σας υποβάλλουμε:<br>
    <ol class="justify">
        <li>Αίτηση για την έγκριση της μετακίνησης</li>
        <li>Πρόσκληση ονομαστική για την επίσκεψη/συμμετοχή από το φορέα υποδοχής/διοργάνωσης</li>
        <li>Πρόγραμμα της επίσκεψης από το φορέα υποδοχής/διοργάνωσης</li>
        <li>Επίσημο έγγραφο ((υπογεγραμμένο)) έγκρισης του προγράμματος από τον
            φορέα συντονισμού σε εθνικό επίπεδο. (Ι.Κ.Υ.)</li>
        <li>Σύμβαση (υπογεγραμμένη) με τον φορέα συντονισμού/διοργάνωσης στο
            σχετικό παράρτημα της οποίας αναγράφονται το/τα όνομα/ματα του/των
            συμμετέχοντος/ντων</li>
        <li>Αντίγραφο του Πρακτικού του Συλλόγου Διδασκόντων για τη συγκρότηση
            της παιδ/γικής ομάδας</li>
        @if ($excursion->erasmus_ar_prajis_syllogou_anasigrotisi !== '')
            <li>Αντίγραφο του Πρακτικού του Συλλόγου Διδασκόντων για ανασυγκρότηση
                της παιδαγωγικής ομάδας</li>
        @endif
        <li>Αντίγραφο του πρακτικού του Συλλόγου Διδασκόντων για τη μετακίνηση
            (όπου αναγράφονται η Υ.Α. για το Erasmus+ΚΑ1/ο τίτλος και ο κωδικός
            του προγράμματος/ προορισμός-πόλη - χώρα/ μεταφορικό μέσο/ διαμονή/
            υγειονομική περίθαλψη/ ονόματα και επίθετα των εκπαιδευτικών/
            αριθμοί πτήσεων και εταιρεία/ αναλυτικό πρόγραμμα της κάθε ημέρας)</li>
        @if ($excursion->erasmus_ar_prajis_syllogon_sinainesi !== '')
            <li>Αντίγραφο του/των Πρακτικού/κών του Συλλόγου Διδασκόντων του/των
                ΕΠΑΛ ότι συναινεί/ουν για τη μετακίνηση των μαθητών/τριών και
                εκπαιδευτικών του Ε.Κ.</li>
        @endif
        @if ($excursion->erasmus_ar_prot_beb_dieythinton !== '')
            <li>Για τους εκπαιδευτικούς που διδάσκουν και σε άλλο/άλλα σχολεία
                βεβαίωση του/των Διευθυντή/ντών του/των άλλου/άλλων σχολείων ότι
                συναινεί/νουν για τη μετακίνηση του/των εκπαιδευτικών</li>
        @endif
        @if ($excursion->praji_epilogi_praktoreiou !== '')
            <li>Βεβαίωση του/της Διευθυντή/ντριας ότι πραγματοποιήθηκε
                μειοδοτικός διαγωνισμός για την επιλογή ταξιδιωτικού γραφείου</li>
        @endif
        <li>Αντίγραφο ασφαλιστηρίου συμβολαίου αστικής- επαγγελματικής ευθύνης.</li>
        <li>Για την περίπτωση μετακίνησης που απαιτείται: Βεβαίωση του/της
            Διευθυντή/τριας ότι όλοι οι συμμετέχοντες έχουν Ευρωπαϊκή κάρτα
            ασφάλισης ή αντίγραφο του ασφαλιστηρίου συμβολαίου για ιατροφαρμακευτική
            κάλυψη ή αντίγραφο της σχετικής βεβαίωσης της ασφαλιστικής εταιρείας
            όπου αναφέρονται τα ονόματα των ασφαλισμένων, η χρονική διάρκεια
            της κάλυψης και οι καλύψεις</li>
    </ol>
    </p>
    <p>
        Παρακαλούμε για τις δικές σας ενέργειες.
    </p>

    <x-excursion.transmittal.signature :title="$excursion->prosfonisi_ypografonta" :name="$excursion->onoma_ypografonta" class="signature" />
@endsection
