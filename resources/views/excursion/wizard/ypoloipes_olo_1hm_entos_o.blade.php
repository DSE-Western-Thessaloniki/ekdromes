<x-layouts.app>
<x-slot:title>Εκδρομές - Οδηγός Εκδρομών</x-slot:title>

<p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="80" />
    <div class="flex flex-col items-center gap-4 pb-4">
        Με βάση τις προηγούμενες απαντήσεις, έχετε δύο (2) επιλογές για καταχώρηση νέας εκδρομής:
        <!-- TODO: Add a form to create a new excursion -->
        <a class='btn btn-primary' href="{{ route('excursion.create', ['excursionType' => 'Σχολικός Περίπατος']) }}">Απλός
            Σχολικός Περίπατος</a>
        <a class='btn btn-primary' href="{{ route('excursion.create', ['excursionType' => 'Διδακτική επίσκεψη']) }}">Διδακτική
            επίσκεψη</a>
    </div>

    <p><a href="{{ route('excursion.wizard', ['step' => '>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ']) }}" class='btn btn-warning'> <i
                class='fas fa-angle-left'></i>
            Προηγούμενο βήμα</a></p>
</x-layouts.app>
