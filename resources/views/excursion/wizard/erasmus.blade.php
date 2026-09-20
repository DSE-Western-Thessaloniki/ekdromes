<x-layouts.app>
<x-slot:title>Εκδρομές - Οδηγός Εκδρομών</x-slot:title>

<p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="50" />
    <x-excursion.wizard.ask question="Θα μετακινηθούν μόνο εκπαιδευτικοί ή εκπαιδευτικοί μαζί με μαθητές/τριες;"
        prevstep=">ΕΔ_ERASM" replyA="Μόνο εκπαιδευτικοί (ERASMUS KA1)" stepA=">ERASMUS>ΜΟΝΟΕΚΠ"
        replyB="Εκπαιδευτικοί και μαθητές/τριες (ERASMUS KA2)" stepB=">ERASMUS>ΕΚΠΜΑΘ" />
</x-layouts.app>
