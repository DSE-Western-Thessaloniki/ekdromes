<x-layouts.app>
<x-slot:title>Εκδρομές - Οδηγός Εκδρομών</x-slot:title>

<p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="80" />
    <div class="flex flex-col items-center gap-4 pb-4">
        Με βάση τις προηγούμενες απαντήσεις, επιλέξτε το είδος της νέας εκδρομής για καταχώρηση από τις παρακάτω επιλογές:
        <!-- TODO: Add a form to create a new excursion -->
        <a class='btn btn-primary'
            href="{{ route('excursion.create', ['excursionType' => 'Εκπαιδευτική επίσκεψη μέσω προγράμματος(περιβαλλοντικό/πολιτισμικό) στο εσωτερικό']) }}">Εκπαιδευτική
            επίσκεψη
            μέσω προγράμματος(περιβαλλοντικό/πολιτισμικό κτλ) στο εσωτερικό</a>
        <a class='btn btn-primary'
            href="{{ route('excursion.create', ['excursionType' => 'Εκπαιδευτική εκδρομή στο εσωτερικό']) }}">Εκπαιδευτική
            εκδρομή στο εσωτερικό(στο πλαίσιο του αναλυτικού προγράμματος)</a>
        <a class='btn btn-primary'
            href="{{ route('excursion.create', ['excursionType' => 'Επίσκεψη στη Βουλή των Ελλήνων']) }}">Επίσκεψη στη
            Βουλή των Ελλήνων</a>
        <a class='btn btn-primary'
            href="{{ route('excursion.create', ['excursionType' => 'Συμμετοχή μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού']) }}">Συμμετοχή
            μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού</a>
    </div>

    <p><a href="{{ route('excursion.wizard', ['step' => '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>ΠΟΛΛΕΣΗΜ']) }}" class='btn btn-warning'> <i
                class='fas fa-angle-left'></i>
            Προηγούμενο βήμα</a></p>
</x-layouts.app>
