@extends('layouts.app')

@section('title', 'Εκδρομές - Οδηγός Εκδρομών')

@section('content')
    <p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="70" />
    <x-excursion.wizard.ask question="Πρόκειται για την ετήσια πολυήμερη εκδρομή της τελευταίας τάξης του Λυκείου;"
        prevstep=">ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ" replyA="Ναι" stepA=">ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>ΠΟΛΛΕΣΗΜ>ΤΕΛΤΑΞΗ" replyB="Όχι"
        stepB=">ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>ΠΟΛΛΕΣΗΜ>ΟΧΙΤΕΛΤΑΞΗ" />

@endsection
