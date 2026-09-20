<x-layouts.app>
<x-slot:title>Αρχεία Εκδρομής</x-slot:title>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-coral text-white px-6 py-4">
        <h3 class="text-xl font-semibold">
            Αρχεία Εκδρομής #{{ $excursion->id }}
            - {{ $excursion->eidos_ekdromis }}
        </h3>
    </div>
    <div class="p-6">
        <!-- File Upload -->
        <div class="mb-6">
            <h4 class="text-lg font-semibold mb-3">Μεταφόρτωση Αρχείου</h4>
            <form action="{{ route('excursion.upload-file', $excursion) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="file" name="file"
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
                           accept=".xlsx,.xls,.doc,.docx,.pdf,.txt" required>
                </div>
                <button type="submit" class="bg-coral text-white px-4 py-2 rounded hover:bg-coral-dark">
                    <i class="fas fa-upload"></i> Μεταφόρτωση
                </button>
            </form>
            <hr class="my-6 border-gray-200">
        </div>

        <!-- File List -->
        <div class="mb-6">
            <h4 class="text-lg font-semibold mb-3">Υπάρχοντα Αρχεία</h4>
            @if(count($files) > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 border">Όνομα Αρχείου</th>
                                <th class="px-4 py-2 border">Τύπος</th>
                                <th class="px-4 py-2 border">Μέγεθος</th>
                                <th class="px-4 py-2 border">Ενέργειες</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border">{{ $file['original_name'] }}</td>
                                    <td class="px-4 py-2 border">
                                        @if($file['type'] === 'F')
                                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Τελικό</span>
                                        @elseif($file['type'] === 'A')
                                            <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Έγκριση</span>
                                        @else
                                            <span class="inline-block bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">Χρήστη</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 border">{{ number_format($file['size'] / 1024, 1) }} KB</td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('excursion.download-file', [$excursion, $file['name']]) }}"
                                           class="inline-block bg-green-500 text-white px-3 py-1 rounded text-sm hover:bg-green-600" title="Λήψη">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <form action="{{ route('excursion.delete-file', [$excursion, $file['name']]) }}"
                                              method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-block bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600"
                                                    onclick="return confirm('Διαγραφή αρχείου;')" title="Διαγραφή">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded">
                    Δεν υπάρχουν αρχεία για αυτή την εκδρομή.
                </div>
            @endif
        </div>

        <!-- Actions -->
        <hr class="my-6 border-gray-200">
        <a href="{{ route('excursion.edit', $excursion) }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
            <i class="fas fa-arrow-left"></i> Επιστροφή
        </a>
    </div>
</div>
</x-layouts.app>
