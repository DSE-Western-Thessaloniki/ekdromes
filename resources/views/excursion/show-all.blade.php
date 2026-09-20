<x-layouts.app>
<x-slot:title>Νέα Εκδρομή</x-slot:title>
<div class="flex justify-between items-center mb-4">
        <div>
            Διαλέξτε το είδος της νέας εκδρομής:
        </div>
        <div style="text-align:right">
            <a href="{{ route('excursion.wizard') }}" class="btn btn-success">
                <i class="fas fa-circle-question"></i> Χρειάζομαι καθοδήγηση
            </a>
        </div>
    </div>

    <table class="table table-bordered border">
        <tr>
            <th class="border p-1">αα</th>
            <th class="border p-1">Τίτλος</th>
            <th class="border p-1">Είδη σχ. μονάδων</th>
            <th class="border p-1">Νομοθεσία</th>
            <th class="border p-1">Αρχεία Οδηγιών/ Νομοθεσίας</th>
        </tr>
        @foreach ($types as $key => $type)
            <tr>
                <td class="border p-1">{{ $loop->iteration }}</td>
                <td class="border p-1 text-center">
                    <a class="btn btn-gray border"
                        href="{{ route('excursion.create', ['excursionType' => $key]) }}">{{ $key }}
                        {{ $type['category'] }}</a>
                </td>
                <td class="border p-1">
                    @foreach ($type['school_types'] as $school_type)
                        {{ $school_type }}<br>
                    @endforeach
                </td>
                <td class="border p-1">{{ $type['legislation'] }}</td>
                <td class="border p-1">
                    @forelse ($type['legislation_files']() as $file)
                        <a class="hover:underline" href="{{ str_replace('+', '%2B', Storage::disk('public')->url($file)) }}"
                            target="_blank">{{ basename($file) }}<i class="fas fa-download text-blue-600"></i></a><br>
                    @empty
                        Δεν υπάρχουν αρχεία
                    @endforelse
                </td>
            </tr>
        @endforeach
    </table>

    <div class="flex justify-end mt-4">
        <a href="{{ route('excursion.wizard') }}" class="btn btn-success">
            <i class="fas fa-circle-question"></i> Χρειάζομαι καθοδήγηση
        </a>
    </div>
</x-layouts.app>
