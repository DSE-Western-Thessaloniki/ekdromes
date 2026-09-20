<x-layouts.app>
<x-slot:title>Εκδρομές - Οδηγός Εκδρομών</x-slot:title>

<p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="70" />
    <x-excursion.wizard.ask question="Η εκδρομή θα έχει διάρκεια εντός ωραρίου του σχολείου;" prevstep=">ΥΠΟΛΟΙΠΕΣ>ΟΛΟ"
        replyA="Ναι, εντός ωραρίου" stepA=">ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ>ΕΝΤΟΣ_Ω" replyB="Οχι, πλέον ωραρίου (ημερήσια εκδρομή)"
        stepB=">ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ>ΠΛΕΟΝ_Ω" />
</x-layouts.app>
