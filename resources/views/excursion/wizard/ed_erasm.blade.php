<x-layouts.app>
<x-slot:title>Εκδρομές - Οδηγός Εκδρομών</x-slot:title>

<p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="5" />
    <x-excursion.wizard.ask question="Η εκδρομή γίνεται στα πλαίσια προγράμματος Erasmus;" prevstep="start" replyA="Όχι"
        stepA=">ΕΔ" replyB="Ναι, είναι εκδρομή προγράμματος Erasmus" stepB=">ERASMUS" />
</x-layouts.app>
