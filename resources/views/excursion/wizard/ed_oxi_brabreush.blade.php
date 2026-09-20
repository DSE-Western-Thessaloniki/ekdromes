<x-layouts.app>
<x-slot:title>Εκδρομές - Οδηγός Εκδρομών</x-slot:title>

<p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="20" />
    <x-excursion.wizard.ask question="Η εκδρομή αφορά αδελφοποίηση σχολείων;" prevstep=">ΕΔ"
        replyA="Ναι, αφορά σύναψη αδελφοποίησης" stepA=">ΕΔ>ΒΡΑΒΕΥΣΗ>ΑΔΕΛ" replyB="Όχι" stepB=">ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ>ΟΧΙΑΔΕΛ" />
</x-layouts.app>
