@extends('layouts.app')

@section('title', 'Εκδρομές - Οδηγός Εκδρομών')

@section('content')
    <p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="10" />
    <x-excursion.wizard.ask
        question="Η εκδρομή αφορά βράβευση με ταξίδι στο εξωτερικό κατόπιν συμμετοχής σε διαγωνιστική διαδικασία εγκεκριμένη από το Υπουργείο Παιδείας;"
        prevstep=">ΕΔ_ERASM" replyA="Ναι, βράβευση με ταξίδι μετά από διαγωνισμό" stepA=">ΕΔ>ΒΡΑΒΕΥΣΗ" replyB="Όχι"
        stepB=">ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ" />

@endsection
