<x-layouts.app>
<x-slot:title>Εκδρομές - Οδηγός Εκδρομών</x-slot:title>

<p class="font-bold underline text-center pb-4">Νέα εκδρομή</p>
    <x-excursion.wizard.progress percent="30" />
    <x-excursion.wizard.ask question="O προορισμός της εκδρομής είναι εντός της χώρας ή στο εξωτερικό;" prevstep=">ΥΠΟΛΟΙΠΕΣ"
        replyA="Εσωτερικό" stepA=">ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ" replyB="Εξωτερικό" stepB=">ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΞΩΤ" />
</x-layouts.app>
