<x-layouts.app>
<x-slot:title>Εκδρομές - Οδηγός Εκδρομών</x-slot:title>

<p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="80" />
    <div class="flex flex-col items-center gap-4 pb-4">
        Με βάση τις προηγούμενες απαντήσεις <b>δε βρέθηκαν</b> συμβατά είδη εκδρομών.<br>Παρακαλούμε επικοινωνήστε με το
        τμήμα εκδρομών της ΔΔΕ για οδηγίες.
    </div>

    <p><a href="{{ route('excursion.wizard', ['step' => '>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ']) }}" class='btn btn-warning'> <i
                class='fas fa-angle-left'></i>
            Προηγούμενο βήμα</a></p>
</x-layouts.app>
