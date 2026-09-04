@extends('layouts.app')

@section('title', 'Εκδρομές - Οδηγός Εκδρομών')

@section('content')
    <p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="80" />
    <div class="flex flex-col items-center gap-4 pb-4">
        Με βάση τις προηγούμενες απαντήσεις, καταχωρήστε νέα εκδρομή:
        <!-- TODO: Add a form to create a new excursion -->
        <a class='btn btn-primary' value='Εκπαιδευτικών προγραμμάτων της Γενικής Γραμματείας Θρησκευμάτων'>Εκπαιδευτικών
            προγραμμάτων της Γενικής Γραμματείας Θρησκευμάτων</a>
    </div>

    <p><a href="{{ route('excursion.wizard', ['step' => '>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ>ΟΧΙΑΔΕΛ']) }}" class='btn btn-warning'> <i
                class='fas fa-angle-left'></i>
            Προηγούμενο βήμα</a></p>

@endsection
