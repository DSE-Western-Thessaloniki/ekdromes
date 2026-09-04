@extends('layouts.app')

@section('title', 'Εκδρομές - Οδηγός Εκδρομών')

@section('content')
    <p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="70" />
    <div class="flex flex-col items-center gap-4 pb-4">
        Με βάση τις προηγούμενες απαντήσεις, καταχωρήστε νέα εκδρομή:
        <!-- TODO: Add a form to create a new excursion -->
        <a class='btn btn-primary'
            value='Βράβευσης με ταξίδι στο εξωτερικό κατόπιν συμμετοχής σε διαγωνιστική διαδικασία εγκεκριμένη από το Υπουργείο Παιδείας'>Βράβευσης
            με ταξίδι στο εξωτερικό κατόπιν συμμετοχής σε διαγωνιστική διαδικασία εγκεκριμένη από το Υπουργείο Παιδείας</a>
    </div>

    <p><a href="{{ route('excursion.wizard', ['step' => '>ΕΔ']) }}" class='btn btn-warning'> <i class='fas fa-angle-left'></i>
            Προηγούμενο βήμα</a></p>

@endsection
