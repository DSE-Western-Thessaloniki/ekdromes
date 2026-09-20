<x-layouts.app>
<x-slot:title>Εκδρομές - Οδηγός Εκδρομών</x-slot:title>

<p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="60" />
    <x-excursion.wizard.ask question="Η εκδρομή θα αφορά μία ημέρα ή πολλές;" prevstep=">ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ" replyA="Μία ημέρα"
        stepA=">ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>1ΗΜ" replyB="Πολλές ημέρες" stepB=">ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>ΠΟΛΛΕΣΗΜ" />
</x-layouts.app>
