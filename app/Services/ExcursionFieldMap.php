<?php

declare(strict_types=1);

namespace App\Services;

class ExcursionFieldMap
{
    private const array FIELD_DEFINITIONS = [
        'ar_prajis_syllogou' => ['label' => 'Αρ. και ημ. πράξης συλλόγου', 'type' => 'text', 'placeholder' => 'Αριθμός και ημερομηνία'],
        'a_arithmos' => ['label' => 'Αύξων αριθμός εκδρομής', 'type' => 'number', 'min' => 1, 'value' => 1],
        'proorismos' => ['label' => 'Προορισμός', 'type' => 'text', 'placeholder' => 'Πόλη ή τοποθεσία'],
        'onoma_jenodoxeio' => ['label' => 'Όνομα Ξενοδοχείου', 'type' => 'text', 'placeholder' => 'Επωνυμία'],
        'onoma_praktoreio' => ['label' => 'Όνομα Πρακτορείου', 'type' => 'text', 'placeholder' => 'Επωνυμία'],
        'metakinisi' => ['label' => 'Τρόπος μετακίνησης', 'type' => 'select', 'options' => [
            'Πεζή',
            'Με μεταφορικό μέσο',
        ], 'default' => 'Πεζή', 'emptyItem' => false],
        'metaforika_mesa' => ['label' => 'Μεταφορικά μέσα', 'type' => 'text', 'placeholder' => 'π.χ. Λεωφορείο'],
        'mathimata' => ['label' => 'Μαθήματα ΑΠ', 'type' => 'textarea', 'placeholder' => '1ο μάθημα, 2ο μάθημα', 'help' => 'διαχωρίστε με κόμματα'],
        'tmimata' => ['label' => 'Τάξεις ή τμήματα', 'type' => 'text', 'placeholder' => 'Α, Β, Γ', 'help' => 'διαχωρίστε με κόμματα αν χρειάζεται'],
        'titlos_programmatos' => ['label' => 'Τίτλος προγράμματος', 'type' => 'text', 'placeholder' => 'Τίτλος'],
        'eidos_programmatos' => ['label' => 'Είδος προγράμματος', 'type' => 'select', 'options' => [
            'Περιβαλλοντικής εκπαίδευσης',
            'Αγωγής υγείας',
            'Πολιτιστικών θεμάτων',
            'Αγωγής σταδιοδρομίας',
        ]],
        'ar_pr_egrisis_programmatosdde' => ['label' => 'Αρ. πρωτ. έγκρισης προγράμματος', 'type' => 'text', 'placeholder' => 'Αριθμός και ημερομηνία'],
        'asf_symbolaio' => ['label' => 'Αρ. ασφαλιστηρίου συμβολαίου', 'type' => 'text', 'placeholder' => 'Αριθμός συμβολαίου'],
        'praji_epilogi_praktoreiou' => ['label' => 'Αρ. πράξης επιλογής τουριστικού γραφείου', 'type' => 'text', 'placeholder' => 'Αριθμός και ημερομηνία'],
        'ar_pr_anartisisprok' => ['label' => 'Αρ. Πρ. αιτήματος ανάρτησης προκήρυξης', 'type' => 'text', 'placeholder' => 'Αριθμός και ημερομηνία'],
        'hmera_ekdromis_anaxorisis' => ['label' => 'Ημερομηνία αναχώρησης', 'type' => 'date'],
        'hmera_epistrofis' => ['label' => 'Ημερομηνία επιστροφής', 'type' => 'date'],
        'diarkeia_hmeres' => ['label' => 'Διάρκεια (ημέρες)', 'type' => 'text'],
        'ora_anaxorisis' => ['label' => 'Ώρα αναχώρησης', 'type' => 'time'],
        'ora_afijis' => ['label' => 'Εκτιμώμενη ώρα άφιξης', 'type' => 'time'],
        'ora_apoxorisis' => ['label' => 'Εκτιμώμενη ώρα αποχώρησης', 'type' => 'time'],
        'ora_epistrofis' => ['label' => 'Ώρα επιστροφής', 'type' => 'time'],
        'ar_mathiton' => ['label' => 'Αρ. μαθητών', 'type' => 'number', 'min' => 0],
        'ar_metakinoumenon' => ['label' => 'Αρ. μετακινούμενων μαθητών', 'type' => 'number', 'min' => 0],
        'onoma_arxigos' => ['label' => 'Αρχηγός', 'type' => 'text', 'placeholder' => 'ονοματεπώνυμο'],
        'plithos_synodoi' => ['label' => 'Πλήθος συνοδών', 'type' => 'number', 'min' => 0],
        'plithos_ektosomadas_synodoi' => ['label' => 'Συνοδοί εκτός ομάδας', 'type' => 'number', 'min' => 0],
        'erasmus_ar_simbasis' => ['label' => 'Αρ. Σύμβασης', 'type' => 'text'],
        'erasmus_ar_prajis_syllogou_sigrotisi' => ['label' => 'Αρ. πράξης συλλόγου - συγκρότηση παιδαγωγικής ομάδας', 'type' => 'text'],
        'erasmus_ar_prajis_syllogou_anasigrotisi' => ['label' => 'Αρ. πράξης συλλόγου - ανασυγκρότηση παιδαγωγικής ομάδας', 'type' => 'text'],
        'erasmus_ar_prajis_syllogon_sinainesi' => ['label' => 'Αρ. πράξης συλλόγου ΕΠΑΛ - συναίνεση', 'type' => 'text'],
        'erasmus_ar_prot_beb_dieythinton' => ['label' => 'Αρ. πρωτ. βεβαίωσης Δ/ντών', 'type' => 'text'],
        'erasmus_lista_kathig_kaieidikotita' => ['label' => 'Ονομαστική λίστα συνοδών', 'type' => 'textarea', 'placeholder' => 'Επώνυμο Ονομα ΠΕΧΧ'],
        'erasmus_lista_anaplirkathig_kaieid' => ['label' => 'Ονομαστική λίστα αναπληρωτών συνοδών', 'type' => 'textarea', 'placeholder' => 'Επώνυμο Ονομα ΠΕΧΧ'],
        'erasmus_lista_mathites_kaitaji' => ['label' => 'Ονομαστική λίστα μαθητών', 'type' => 'textarea', 'placeholder' => 'Επώνυμο Ονομα της Χ\' τάξης'],
    ];

    private const array SIGNER_FIELDS = [
        'prosfonisi_ypografonta' => ['label' => 'Προσφώνηση υπογραφής', 'type' => 'text', 'value' => 'Ο/Η ΔΙΕΥΘΥΝΤΗΣ/ΝΤΡΙΑ ΤΗΣ ΣΧΟΛΙΚΗΣ ΜΟΝΑΔΑΣ'],
        'onoma_ypografonta' => ['label' => 'Ονοματεπώνυμο υπογράφοντα', 'type' => 'text', 'placeholder' => 'Όνοματεπώνυμο Δντη/ντριας'],
        'ar_prot_sxoleiou' => ['label' => 'Αρ. Πρωτ. σχολείου', 'type' => 'text', 'placeholder' => 'Αρ. Πρωτ.'],
        'hmera_diavivastikou' => ['label' => 'Ημερομηνία διαβιβαστικού', 'type' => 'date', 'default' => 'today'],
    ];

    private const array TYPE_SECTIONS = [
        'Σχολικός Περίπατος' => [
            'general' => ['ar_prajis_syllogou', 'a_arithmos', 'proorismos', 'metakinisi', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis'],
            'participation' => [],
        ],
        'Ημερήσια δίχως διανυκτέρευση' => [
            'general' => ['ar_prajis_syllogou', 'a_arithmos', 'proorismos', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis'],
            'participation' => ['ar_mathiton', 'ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Πολυήμερη τελευταίας τάξης στο εσωτερικό' => [
            'general' => ['ar_prajis_syllogou', 'a_arithmos', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres'],
            'participation' => ['ar_metakinoumenon', 'onoma_arxigos', 'plithos_synodoi'],
        ],
        'Πολυήμερη τελευταίας τάξης στο εξωτερικό' => [
            'general' => ['ar_prajis_syllogou', 'a_arithmos', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres'],
            'participation' => ['ar_metakinoumenon', 'onoma_arxigos', 'plithos_synodoi'],
        ],
        'Εκπαιδευτική επίσκεψη μέσω προγράμματος(περιβαλλοντικό/πολιτισμικό) στο εσωτερικό' => [
            'general' => ['eidos_programmatos', 'titlos_programmatos', 'ar_pr_egrisis_programmatosdde', 'ar_prajis_syllogou', 'a_arithmos', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres'],
            'participation' => ['ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Εκπαιδευτικές επισκέψεις στο ΕΞΩΤΕΡΙΚΟ στο πλαίσιο εγκεκριμένων εκπαιδευτικών προγραμμάτων σχολικών δραστηριοτήτων' => [
            'general' => ['eidos_programmatos', 'titlos_programmatos', 'ar_pr_egrisis_programmatosdde', 'ar_prajis_syllogou', 'asf_symbolaio', 'praji_epilogi_praktoreiou', 'a_arithmos', 'ar_pr_anartisisprok', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis'],
            'participation' => ['ar_mathiton', 'ar_metakinoumenon', 'plithos_synodoi', 'plithos_ektosomadas_synodoi'],
        ],
        'Εκπαιδευτική εκδρομή στο εσωτερικό' => [
            'general' => ['ar_prajis_syllogou', 'mathimata', 'a_arithmos', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres'],
            'participation' => ['tmimata', 'ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Εκπαιδευτική εκδρομή στο εξωτερικό' => [
            'general' => ['ar_prajis_syllogou', 'asf_symbolaio', 'praji_epilogi_praktoreiou', 'a_arithmos', 'ar_pr_anartisisprok', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis'],
            'participation' => ['ar_mathiton', 'ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Διδακτική επίσκεψη' => [
            'general' => ['titlos_programmatos', 'ar_prajis_syllogou', 'a_arithmos', 'proorismos'],
            'dates' => ['hmera_ekdromis_anaxorisis'],
            'participation' => ['tmimata', 'ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Επίσκεψη στη Βουλή των Ελλήνων' => [
            'general' => ['ar_prajis_syllogou', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_epistrofis'],
            'participation' => ['tmimata', 'ar_mathiton', 'ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Συμμετοχή μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού' => [
            'general' => ['titlos_programmatos', 'ar_prajis_syllogou', 'a_arithmos', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_epistrofis'],
            'participation' => ['ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Εκπαιδευτικών ανταλλαγών σε συνέχεια διακρατικών συμφωνιών/μνημονίων συνεργασίας/εκτελεστικών προγραμμάτων' => [
            'general' => ['titlos_programmatos', 'ar_prajis_syllogou', 'asf_symbolaio', 'praji_epilogi_praktoreiou', 'ar_pr_anartisisprok', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis'],
            'participation' => ['ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Αδελφοποιήσεων' => [
            'general' => ['titlos_programmatos', 'ar_prajis_syllogou', 'asf_symbolaio', 'praji_epilogi_praktoreiou', 'ar_pr_anartisisprok', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis'],
            'participation' => ['ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Εκπαιδευτικών προγραμμάτων της Γενικής Γραμματείας Θρησκευμάτων' => [
            'general' => ['titlos_programmatos', 'ar_prajis_syllogou', 'asf_symbolaio', 'praji_epilogi_praktoreiou', 'ar_pr_anartisisprok', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis'],
            'participation' => ['ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Ευρωπαϊκών προγραμμάτων δραστηριοτήτων/προγραμμάτων που δε γίνονται στο πλαίσιο του ευρωπαϊκού προγράμματος Erasmus' => [
            'general' => ['titlos_programmatos', 'ar_prajis_syllogou', 'asf_symbolaio', 'praji_epilogi_praktoreiou', 'ar_pr_anartisisprok', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis'],
            'participation' => ['ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Προγραμμάτων διεθνών οργανισμών' => [
            'general' => ['titlos_programmatos', 'ar_prajis_syllogou', 'asf_symbolaio', 'praji_epilogi_praktoreiou', 'ar_pr_anartisisprok', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis'],
            'participation' => ['ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Συμμετοχών σε διεθνείς συναντήσεις, συνέδρια, ημερίδες, διαγωνισμούς, μαθητικές επιστημονικές ολυμπιάδες και άλλες διεθνής εκδηλώσεις' => [
            'general' => ['titlos_programmatos', 'ar_prajis_syllogou', 'asf_symbolaio', 'praji_epilogi_praktoreiou', 'ar_pr_anartisisprok', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis'],
            'participation' => ['ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Προσκλήσεις σχολείων της περ.α του άρθρου 3 του ν. 4415/2016 (Α΄ 159)' => [
            'general' => ['titlos_programmatos', 'ar_prajis_syllogou', 'asf_symbolaio', 'praji_epilogi_praktoreiou', 'ar_pr_anartisisprok', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis'],
            'participation' => ['ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Βράβευσης με ταξίδι στο εξωτερικό κατόπιν συμμετοχής σε διαγωνιστική διαδικασία εγκεκριμένη από το Υπουργείο Παιδείας' => [
            'general' => ['titlos_programmatos', 'ar_prajis_syllogou', 'asf_symbolaio', 'praji_epilogi_praktoreiou', 'ar_pr_anartisisprok', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis'],
            'participation' => ['ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Πιλοτικών προγραμμάτων διεθνών σχολικών δικτύων που εγκρίνονται ή συντονίζονται από το Υπουργείο Παιδείας' => [
            'general' => ['titlos_programmatos', 'ar_prajis_syllogou', 'asf_symbolaio', 'praji_epilogi_praktoreiou', 'ar_pr_anartisisprok', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis'],
            'participation' => ['ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Επισκέψεων σε ερευνητικά κέντρα, εκπαιδευτικά ιδρύματα, πανεπιστήμια, κέντρα πολιτισμού και/ή αθλητισμού' => [
            'general' => ['titlos_programmatos', 'ar_prajis_syllogou', 'asf_symbolaio', 'praji_epilogi_praktoreiou', 'ar_pr_anartisisprok', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis'],
            'participation' => ['ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Επισκέψεων σε ευρωπαϊκούς θεσμούς/διεθνείς οργανώσεις κατόπιν σχετικής πρόσκλησης και αποδοχής τυχόν αιτήματος από το διεθνή οργανισμό' => [
            'general' => ['titlos_programmatos', 'ar_prajis_syllogou', 'asf_symbolaio', 'praji_epilogi_praktoreiou', 'ar_pr_anartisisprok', 'proorismos', 'onoma_jenodoxeio', 'onoma_praktoreio', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis'],
            'participation' => ['ar_metakinoumenon', 'plithos_synodoi'],
        ],
        'Μετακίνηση εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ1' => [
            'general' => ['eidos_programmatos', 'titlos_programmatos', 'ar_pr_egrisis_programmatosdde', 'erasmus_ar_simbasis', 'ar_pr_anartisisprok', 'praji_epilogi_praktoreiou', 'erasmus_ar_prajis_syllogou_sigrotisi', 'erasmus_ar_prajis_syllogou_anasigrotisi', 'ar_prajis_syllogou', 'erasmus_ar_prajis_syllogon_sinainesi', 'erasmus_ar_prot_beb_dieythinton', 'asf_symbolaio', 'proorismos', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis'],
            'participation' => ['plithos_synodoi', 'erasmus_lista_kathig_kaieidikotita'],
        ],
        'Μετακίνηση μαθητών-τριών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2' => [
            'general' => ['eidos_programmatos', 'titlos_programmatos', 'ar_pr_egrisis_programmatosdde', 'erasmus_ar_simbasis', 'ar_pr_anartisisprok', 'praji_epilogi_praktoreiou', 'erasmus_ar_prajis_syllogou_sigrotisi', 'erasmus_ar_prajis_syllogou_anasigrotisi', 'ar_prajis_syllogou', 'erasmus_ar_prajis_syllogon_sinainesi', 'erasmus_ar_prot_beb_dieythinton', 'asf_symbolaio', 'proorismos', 'metaforika_mesa'],
            'dates' => ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'diarkeia_hmeres', 'ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis'],
            'participation' => ['plithos_synodoi', 'onoma_arxigos', 'erasmus_lista_kathig_kaieidikotita', 'erasmus_lista_anaplirkathig_kaieid', 'erasmus_lista_mathites_kaitaji'],
        ],
    ];

    public function getSections(string $type): array
    {
        $sections = self::TYPE_SECTIONS[$type] ?? [];

        $result = [];
        foreach ($sections as $sectionKey => $fieldNames) {
            $fields = [];
            foreach ($fieldNames as $fieldName) {
                if (isset(self::FIELD_DEFINITIONS[$fieldName])) {
                    $fields[$fieldName] = self::FIELD_DEFINITIONS[$fieldName];
                }
            }
            if ($fields !== []) {
                $result[$sectionKey] = $fields;
            }
        }

        return $result;
    }

    public function getSignerFields(): array
    {
        return self::SIGNER_FIELDS;
    }

    public function getFieldDefinition(string $fieldName): ?array
    {
        return self::FIELD_DEFINITIONS[$fieldName] ?? self::SIGNER_FIELDS[$fieldName] ?? null;
    }

    public function getRequiredFields(string $type): array
    {
        $required = ['proorismos', 'hmera_ekdromis_anaxorisis'];

        $sections = self::TYPE_SECTIONS[$type] ?? [];
        foreach ($sections as $fieldNames) {
            foreach ($fieldNames as $fieldName) {
                if (in_array($fieldName, ['ar_prajis_syllogou', 'a_arithmos', 'ar_mathiton', 'ar_metakinoumenon', 'plithos_synodoi'])) {
                    $required[] = $fieldName;
                }
            }
        }

        return array_unique($required);
    }

    public function getValidationRules(string $type): array
    {
        $baseRules = [
            'eidos_ekdromis' => 'required|string',
            'proorismos' => 'required|string',
            'hmera_ekdromis_anaxorisis' => 'required|date',
        ];

        $sections = self::TYPE_SECTIONS[$type] ?? [];

        foreach ($sections as $fieldNames) {
            foreach ($fieldNames as $fieldName) {
                if (isset($baseRules[$fieldName])) {
                    continue;
                }

                $def = self::FIELD_DEFINITIONS[$fieldName] ?? null;
                if (! $def) {
                    continue;
                }

                $fieldRules = match ($def['type']) {
                    'number' => 'nullable|integer|min:0',
                    'date' => 'nullable|date',
                    'time' => 'nullable|date_format:H:i',
                    default => 'nullable|string',
                };

                if (in_array($fieldName, ['ar_prajis_syllogou', 'a_arithmos', 'ar_mathiton', 'ar_metakinoumenon', 'plithos_synodoi'])) {
                    $fieldRules = str_replace('nullable', 'required', $fieldRules);
                }

                $baseRules[$fieldName] = $fieldRules;
            }
        }

        foreach (self::SIGNER_FIELDS as $fieldName => $def) {
            $baseRules[$fieldName] ??= 'nullable|string';
        }

        $baseRules['paratiriseis'] = 'nullable|string';

        return $baseRules;
    }

    public function getSectionLabel(string $sectionKey): string
    {
        return match ($sectionKey) {
            'general' => 'Γενικά',
            'dates' => 'Ημερομηνίες',
            'participation' => 'Συμμετοχές',
            default => $sectionKey,
        };
    }

    public function getTypesWithSections(): array
    {
        $result = [];
        foreach (array_keys(self::TYPE_SECTIONS) as $type) {
            $result[$type] = array_keys(self::TYPE_SECTIONS[$type]);
        }

        return $result;
    }

    public function hasSection(string $type, string $section): bool
    {
        return isset(self::TYPE_SECTIONS[$type][$section]) && ! empty(self::TYPE_SECTIONS[$type][$section]);
    }

    public function isDateField(string $fieldName): bool
    {
        return in_array($fieldName, ['hmera_ekdromis_anaxorisis', 'hmera_epistrofis', 'hmera_diavivastikou']);
    }

    public function isTimeField(string $fieldName): bool
    {
        return in_array($fieldName, ['ora_anaxorisis', 'ora_afijis', 'ora_apoxorisis', 'ora_epistrofis']);
    }
}
