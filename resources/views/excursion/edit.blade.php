@extends('layouts.app')

@section('title', 'Επεξεργασία Εκδρομής')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-coral text-white px-6 py-4">
        <h3 class="text-xl font-semibold">
            Επεξεργασία Εκδρομής #{{ $excursion->id }}
            @if($excursion->hasProtocol())
                <span class="ml-2 inline-block bg-white/20 text-white text-xs px-2 py-1 rounded-full">Πρωτόκολλο: {{ $excursion->ar_prot }}</span>
            @endif
        </h3>
    </div>
    <div class="p-6">
        <form action="{{ route('excursion.update', $excursion) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Είδος Εκδρομής</label>
                    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100"
                           value="{{ $excursion->eidos_ekdromis }}" readonly>
                </div>
                <div>
                    <label for="proorismos" class="block text-sm font-medium text-gray-700 mb-1">Προορισμός *</label>
                    <input type="text" name="proorismos" id="proorismos"
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
                           value="{{ $excursion->proorismos }}" required>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-6">
                <div>
                    <label for="hmera_ekdromis_anaxorisis" class="block text-sm font-medium text-gray-700 mb-1">Ημ. Εκδρομής *</label>
                    <input type="date" name="hmera_ekdromis_anaxorisis"
                           id="hmera_ekdromis_anaxorisis" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
                           value="{{ $excursion->hmera_ekdromis_anaxorisis?->format('Y-m-d') }}" required>
                </div>
                <div>
                    <label for="ora_anaxorisis" class="block text-sm font-medium text-gray-700 mb-1">Ώρα Αναχώρησης *</label>
                    <input type="time" name="ora_anaxorisis" id="ora_anaxorisis"
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
                           value="{{ $excursion->ora_anaxorisis }}" required>
                </div>
                <div>
                    <label for="hmera_epistrofis" class="block text-sm font-medium text-gray-700 mb-1">Ημ. Επιστροφής *</label>
                    <input type="date" name="hmera_epistrofis" id="hmera_epistrofis"
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
                           value="{{ $excursion->hmera_epistrofis?->format('Y-m-d') }}" required>
                </div>
                <div>
                    <label for="ora_epistrofis" class="block text-sm font-medium text-gray-700 mb-1">Ώρα Επιστροφής *</label>
                    <input type="time" name="ora_epistrofis" id="ora_epistrofis"
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
                           value="{{ $excursion->ora_epistrofis }}" required>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-6">
                <div>
                    <label for="ar_mathiton" class="block text-sm font-medium text-gray-700 mb-1">Αρ. Μαθητών *</label>
                    <input type="number" name="ar_mathiton" id="ar_mathiton"
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
                           min="0" value="{{ $excursion->ar_mathiton }}" required>
                </div>
                <div>
                    <label for="ar_metakinoumenon" class="block text-sm font-medium text-gray-700 mb-1">Αρ. Μετακινούμενων</label>
                    <input type="number" name="ar_metakinoumenon" id="ar_metakinoumenon"
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
                           min="0" value="{{ $excursion->ar_metakinoumenon }}">
                </div>
                <div class="md:col-span-2">
                    <label for="onoma_arxigos" class="block text-sm font-medium text-gray-700 mb-1">Ον. Αρχηγού *</label>
                    <input type="text" name="onoma_arxigos" id="onoma_arxigos"
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
                           value="{{ $excursion->onoma_arxigos }}" required>
                </div>
            </div>

            <div class="mb-6">
                <label for="paratiriseis" class="block text-sm font-medium text-gray-700 mb-1">Παρατηρήσεις</label>
                <textarea name="paratiriseis" id="paratiriseis"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent" rows="3">{{ $excursion->paratiriseis }}</textarea>
            </div>

            <div class="flex items-center space-x-4">
                <button type="submit" class="bg-coral text-white px-6 py-2 rounded-lg text-lg hover:bg-coral-dark">
                    <i class="fas fa-save"></i> Αποθήκευση
                </button>
                <a href="{{ route('excursion.files', $excursion) }}"
                   class="bg-blue-500 text-white px-6 py-2 rounded-lg text-lg hover:bg-blue-600">
                    <i class="fas fa-folder-open"></i> Αρχεία
                </a>
                <a href="{{ route('dashboard') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg text-lg hover:bg-gray-400">
                    Επιστροφή
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
