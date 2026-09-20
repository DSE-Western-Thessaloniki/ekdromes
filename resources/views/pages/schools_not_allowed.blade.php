<x-layouts.app>
    <div class="jumbotron text-center bg-warning">
        <p class="p-4 bg-red-600 text-white">Δεν είναι δυνατή η σύνδεση των σχολικών μονάδων αυτή τη στιγμή.</p>
        @if ($no_school_access_text)
            <p class="py-4">{{ $no_school_access_text }}</p>
        @endif
        <a href="{{ route('logout') }}" class='mt-4 btn btn-primary'>Αποσύνδεση</a>
    </div>
</x-layouts.app>
