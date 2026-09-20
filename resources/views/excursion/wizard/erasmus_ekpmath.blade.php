<x-layouts.app>
<x-slot:title>Εκδρομές - Οδηγός Εκδρομών</x-slot:title>

<p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="90" />
    <div class="flex flex-col items-center gap-4 pb-4">
        Με βάση τις προηγούμενες απαντήσεις, καταχωρήστε νέα εκδρομή:
        <!-- TODO: Add a form to create a new excursion -->
        <a class='btn btn-primary'
            href="{{ route('excursion.create', ['excursionType' => 'Μετακίνηση μαθητών-τριών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2']) }}">Μετακίνηση
            μαθητών-τριών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2</a>
    </div>

    <p><a href="{{ route('excursion.wizard', ['step' => '>ERASMUS']) }}" class='btn btn-warning'> <i
                class='fas fa-angle-left'></i> Προηγούμενο βήμα</a></p>
</x-layouts.app>
