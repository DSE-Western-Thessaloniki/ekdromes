@extends('layouts.app')

@section('title', 'Διαχείριση')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-coral text-white px-6 py-4">
        <h3 class="text-xl font-semibold">Διαχείριση Συστήματος</h3>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- School Year Switcher -->
            <div class="bg-white border rounded-lg overflow-hidden">
                <div class="bg-gray-100 px-4 py-3 border-b">
                    <h4 class="font-semibold">Αλλαγή Σχολικού Έτους</h4>
                </div>
                <div class="p-4">
                    <form action="{{ route('admin.switch-year') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="year_id" class="block text-sm font-medium text-gray-700 mb-1">
                                Τρέχον Σχολικό Έτος:
                                <strong>{{ $currentYear->sxoliko_etos }}</strong>
                            </label>
                            <select name="year_id" id="year_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent">
                                @foreach($years as $year)
                                    <option value="{{ $year->id }}"
                                        {{ $year->is_current ? 'selected' : '' }}>
                                        {{ $year->sxoliko_etos }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="bg-coral text-white px-4 py-2 rounded hover:bg-coral-dark">
                            <i class="fas fa-sync-alt"></i> Αλλαγή Έτους
                        </button>
                    </form>
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-white border rounded-lg overflow-hidden">
                <div class="bg-gray-100 px-4 py-3 border-b">
                    <h4 class="font-semibold">Ενέργειες</h4>
                </div>
                <div class="p-4">
                    <a href="{{ route('admin.schools') }}" class="block w-full bg-blue-500 text-white px-4 py-2 rounded text-center hover:bg-blue-600">
                        <i class="fas fa-list"></i> Λίστα Σχολείων
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
