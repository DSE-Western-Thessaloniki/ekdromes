@extends('layouts.app')

@section('title', 'Εκδρομές - Οδηγός Εκδρομών')

@section('content')
    <p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="70" />
    <x-excursion.wizard.ask question="Η εκδρομή θα έχει διάρκεια εντός ωραρίου του σχολείου;" prevstep=">ΥΠΟΛΟΙΠΕΣ>ΟΛΟ"
        replyA="Ναι, εντός ωραρίου" stepA=">ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ>ΕΝΤΟΣ_Ω" replyB="Οχι, πλέον ωραρίου (ημερήσια εκδρομή)"
        stepB=">ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ>ΠΛΕΟΝ_Ω" />

@endsection
