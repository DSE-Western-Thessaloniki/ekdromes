<x-layouts.app>
<x-slot:title>Εκδρομές - Οδηγός Εκδρομών</x-slot:title>

<p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="30" />
    <x-excursion.wizard.ask question="Η εκδρομή αφορά εκπ/κό πρόγραμμα της Γενικής Γραμματείας Θρησκευμάτων;"
        prevstep=">ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ" replyA="Ναι, γίνεται στα πλαίσια προγράμματος της Γενικής Γραμματείας Θρησκευμάτων"
        stepA=">ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ>ΟΧΙΑΔΕΛ>ΘΡΗΣΚ" replyB="Όχι" stepB=">ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ>ΟΧΙΑΔΕΛ>ΟΧΙΘΡΗΣΚ" />
</x-layouts.app>
