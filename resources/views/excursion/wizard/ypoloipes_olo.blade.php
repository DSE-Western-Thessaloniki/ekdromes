@extends('layouts.app')

@section('title', 'Εκδρομές - Οδηγός Εκδρομών')

@section('content')
    <p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="50" />
    <x-excursion.wizard.ask question="Η εκδρομή αφορά 1 ημέρα; ή πολλές;" prevstep=">ΥΠΟΛΟΙΠΕΣ" replyA="1 ημέρα"
        stepA=">ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ" replyB="Πολλές ημέρες" stepB=">ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>ΠΟΛΛΕΣΗΜ" />

@endsection
