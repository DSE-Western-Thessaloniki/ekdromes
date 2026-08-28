@extends('layouts.app')

@section('title', 'Αρχική - Εκδρομές')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-coral text-white px-6 py-4">
        <h3 class="text-xl font-semibold">
            Λίστα Εκδρομών - {{ $currentYear->sxoliko_etos }}
            @if($isAdmin)
                <span class="ml-2 inline-block bg-white/20 text-white text-xs px-2 py-1 rounded-full">Διαχειριστής</span>
            @endif
        </h3>
    </div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <table id="excursionsTable" class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">Κωδικός</th>
                        @if($isAdmin)
                            <th class="px-4 py-2 border">Σχολείο</th>
                        @endif
                        <th class="px-4 py-2 border">Είδος Εκδρομής</th>
                        <th class="px-4 py-2 border">Προορισμός</th>
                        <th class="px-4 py-2 border">Ημ. Εκδρομής</th>
                        <th class="px-4 py-2 border">Ημ. Επιστροφής</th>
                        <th class="px-4 py-2 border">Μαθητές</th>
                        <th class="px-4 py-2 border">Κατάσταση</th>
                        <th class="px-4 py-2 border">Ενέργειες</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($excursions as $excursion)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $excursion->id }}</td>
                            @if($isAdmin)
                                <td class="px-4 py-2 border">{{ $excursion->school->displayname ?? 'N/A' }}</td>
                            @endif
                            <td class="px-4 py-2 border">{{ $excursion->eidos_ekdromis }}</td>
                            <td class="px-4 py-2 border">{{ $excursion->proorismos }}</td>
                            <td class="px-4 py-2 border">{{ $excursion->hmera_ekdromis_anaxorisis?->format('d/m/Y') }}</td>
                            <td class="px-4 py-2 border">{{ $excursion->hmera_epistrofis?->format('d/m/Y') }}</td>
                            <td class="px-4 py-2 border">{{ $excursion->ar_mathiton }}</td>
                            <td class="px-4 py-2 border">
                                @if($excursion->isSubmitted())
                                    <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Υποβλήθηκε</span>
                                @else
                                    <span class="inline-block bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">Προσωρινή</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 border">
                                <a href="{{ route('excursion.edit', $excursion) }}"
                                   class="inline-block bg-coral text-white px-3 py-1 rounded text-sm hover:bg-coral-dark" title="Επεξεργασία">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('excursion.files', $excursion) }}"
                                   class="inline-block bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600" title="Αρχεία">
                                    <i class="fas fa-folder-open"></i>
                                </a>
                                @if($excursion->isDraft())
                                    <form action="{{ route('excursion.destroy', $excursion) }}"
                                          method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600"
                                                onclick="return confirm('Είστε σίγουρος;')" title="Διαγραφή">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ $isAdmin ? 9 : 8 }}" class="px-4 py-2 border text-center text-gray-500">
                                Δεν υπάρχουν εκδρομές
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#excursionsTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Greek.json'
        },
        order: [[0, 'desc']]
    });
});
</script>
@endsection
