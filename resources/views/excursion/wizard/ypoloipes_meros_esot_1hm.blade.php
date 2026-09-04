@extends('layouts.app')

@section('title', 'Εκδρομές - Οδηγός Εκδρομών')

@section('content')
    <p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="80" />
    <div class="flex flex-col items-center gap-4 pb-4">
        Με βάση τις προηγούμενες απαντήσεις, επιλέξτε το είδος της νέας εκδρομής για καταχώρηση από τις παρακάτω επιλογές:
        <!-- TODO: Add a form to create a new excursion -->
        <a class='btn btn-primary' value='Διδακτική επίσκεψη'>Διδακτική
            επίσκεψη</a>
        <a class='btn btn-primary' value='Επίσκεψη στη Βουλή των Ελλήνων'>Επίσκεψη στη Βουλή
            των Ελλήνων</a>
        <a class='btn btn-primary' value='Συμμετοχή μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού'>Συμμετοχή
            μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού</a>
    </div>

    <p><a href="{{ route('excursion.wizard', ['step' => '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ']) }}" class='btn btn-warning'> <i
                class='fas fa-angle-left'></i>
            Προηγούμενο βήμα</a></p>

@endsection
