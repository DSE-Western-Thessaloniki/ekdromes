@extends('layouts.app')

@section('title', 'Εκδρομές - Οδηγός Εκδρομών')

@section('content')
    <p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="80" />
    <div class="flex flex-col items-center gap-4 pb-4">
        Με βάση τις προηγούμενες απαντήσεις, επιλέξτε το είδος της νέας εκδρομής για καταχώρηση από τις παρακάτω επιλογές:
        <!-- TODO: Add a form to create a new excursion -->
        <a class='btn btn-primary' value='Πολυήμερη τελευταίας τάξης στο εξωτερικό'>Πολυήμερη τελευταίας τάξης στο
            εξωτερικό</a>
        <a class='btn btn-primary'
            value='Εκπαιδευτικές επισκέψεις στο ΕΞΩΤΕΡΙΚΟ στο πλαίσιο εγκεκριμένων εκπαιδευτικών προγραμμάτων σχολικών δραστηριοτήτων'>Εκπαιδευτική
            εκδρομή στο εξωτερικό(στο πλαίσιο εκπ/κού προγράμματος σχολικών
            δραστηριοτήτων)</a>
        <a class='btn btn-primary' value='Εκπαιδευτική εκδρομή στο εξωτερικό'>Εκπαιδευτική
            εκδρομή στο εξωτερικό(στο πλαίσιο του αναλυτικού προγράμματος)</a>
    </div>

    <p><a href="{{ route('excursion.wizard', ['step' => '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ']) }}" class='btn btn-warning'> <i
                class='fas fa-angle-left'></i>
            Προηγούμενο βήμα</a></p>

@endsection
