@extends('layouts.app')

@section('title', 'Εκδρομές - Οδηγός Εκδρομών')

@section('content')
    <p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="20" />
    <x-excursion.wizard.ask question="Θα συμμετέχει στην εκδρομή όλο το σχολείο;" prevstep="start"
        replyA="Όχι, μόνο κάποια τμήματα ή μερικοί μαθητές" stepA=">ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ"
        replyB="Ναι, θα πάει εκδρομή όλο το σχολείο" stepB=">ΥΠΟΛΟΙΠΕΣ>ΟΛΟ" />

@endsection
