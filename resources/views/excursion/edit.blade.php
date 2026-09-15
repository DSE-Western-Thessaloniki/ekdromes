<x-layouts.form :isEdit="true" :excursion="$excursion" :fieldMap="$fieldMap">
    <x-slot:title>
        Επεξεργασία Εκδρομής
    </x-slot>

    <x-dynamic-component :component="$form" mode="edit" :excursion="$excursion" :fieldMap="$fieldMap" />
</x-layouts.form>
