@extends('layouts.app')

@section('title', 'Εκδρομές - Οδηγός Εκδρομών')

@section('content')
    <p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="1" />
    <p class="pb-4">Απαντήστε σε μερικές απλές ερωτήσεις για να εντοπιστεί το κατάλληλο είδος εκδρομής με βάση τη
        νομοθεσία:</p>
    <x-excursion.wizard.ask
        question="Η εκδρομή γίνεται στα πλαίσια Ευρωπαικών ή Διεθνών δράσεων; ή Διεθνών Προγραμμάτων; (συμπερ. των Erasmus)"
        prevstep="0" replyA="Όχι" stepA=">ΥΠΟΛΟΙΠΕΣ" replyB="Ναι, έχει σχέση με άλλο κράτος ή διεθνή οργανισμό"
        stepB=">ΕΔ_ERASM" />

@endsection
