@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-md overflow-hidden" x-data="{ selectedType: '{{ $excursionType ?? '' }}' }">
        <div class="bg-coral text-white px-6 py-4">
            <h3 class="text-xl font-semibold">
                @if ($isEdit)
                    Επεξεργασία Εκδρομής {{ $excursion->id ? ' #' . $excursion->id : '' }}
                    @if ($excursion->hasProtocol())
                        <span class="ml-2 inline-block bg-green-600 text-white text-sm px-2 py-1 rounded-full">Ημερομηνία
                            Υποβολής: {{ $excursion->submit_datetime?->format('d-m-Y H:i') }}</span>
                        <span class="ml-2 inline-block bg-white/20 text-white text-xs px-2 py-1 rounded-full">Πρωτόκολλο:
                            {{ $excursion->ar_prot }}</span>
                    @else
                        <span class="ml-2 inline-block bg-orange-500 text-white text-xs px-2 py-1 rounded-full">Ημερομηνία
                            Αποθήκευσης: {{ $excursion->submit_datetime?->format('d-m-Y H:i') }}</span>
                    @endif
                @else
                    Δημιουργία Νέας Εκδρομής
                @endif
            </h3>
        </div>
        <div class="p-6">

            @if (isset($errors) && $errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ $isEdit ? route('excursion.update', $excursion) : route('excursion.store') }}" method="POST">
                @csrf
                @if ($isEdit)
                    @method('PUT')
                @endif

                {{-- @yield('content') --}}

                {{-- Actions --}}
                <div class="flex items-center space-x-4">
                    <button type="submit" class="bg-coral text-white px-6 py-2 rounded-lg text-lg hover:bg-coral-dark">
                        <i class="fas fa-save"></i> {{ $isEdit ? 'Αποθήκευση' : 'Δημιουργία' }}
                    </button>
                    @if ($isEdit)
                        <a href="{{ route('excursion.files', $excursion) }}"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg text-lg hover:bg-blue-600">
                            <i class="fas fa-folder-open"></i> Αρχεία
                        </a>
                    @endif
                    <a href="{{ route('dashboard') }}"
                        class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg text-lg hover:bg-gray-400">
                        {{ $isEdit ? 'Επιστροφή' : 'Ακύρωση' }}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
