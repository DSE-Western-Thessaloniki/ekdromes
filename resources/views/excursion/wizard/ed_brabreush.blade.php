<x-layouts.app>
    <x-slot:title>Εκδρομές - Οδηγός Εκδρομών</x-slot:title>

    <p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="70" />
    <div class="flex flex-col items-center gap-4 pb-4">
        Με βάση τις προηγούμενες απαντήσεις, καταχωρήστε νέα εκδρομή:
        <!-- TODO: Add a form to create a new excursion -->
        <a class='btn btn-primary'
            href="{{ route('excursion.create', ['excursionType' => \App\Services\ExcursionService::ARTICLE_11_GENERAL_TITLE]) }}">{{ \App\Services\ExcursionService::ARTICLE_11_GENERAL_TITLE }}</a>
        <p class="text-sm text-center">Η συγκεκριμένη περίπτωση (π.χ. Βράβευσης με ταξίδι στο εξωτερικό) επιλέγεται ως
            πλαίσιο μετακίνησης μέσα στη φόρμα.</p>
    </div>

    <p><a href="{{ route('excursion.wizard', ['step' => '>ΕΔ']) }}" class='btn btn-warning'> <i
                class='fas fa-angle-left'></i>
            Προηγούμενο βήμα</a></p>
</x-layouts.app>
