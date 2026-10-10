<x-layouts.app>
<x-slot:title>Νέα Εκδρομή</x-slot:title>
<div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div class="text-gray-700">
            Διαλέξτε το είδος της νέας εκδρομής:
        </div>
        <div>
            <a href="{{ route('excursion.wizard') }}" class="btn btn-success inline-flex items-center gap-2">
                <i class="fas fa-circle-question"></i> Χρειάζομαι καθοδήγηση
            </a>
        </div>
    </div>

    <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="admin-list-table w-full min-w-[48rem] text-left" aria-label="Είδη σχολικών εκδρομών">
                <thead>
                    <tr>
                        <th scope="col">αα</th>
                        <th scope="col">Τίτλος</th>
                        <th scope="col">Είδη σχ. μονάδων</th>
                        <th scope="col">Νομοθεσία</th>
                        <th scope="col">Αρχεία Οδηγιών/ Νομοθεσίας</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $key => $type)
                        <tr class="transition-colors">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a class="inline-flex items-center rounded-md bg-brand px-3 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-dark focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand"
                                    href="{{ route('excursion.create', ['excursionType' => $key]) }}">{{ $key }}
                                    {{ $type['category'] }}</a>
                            </td>
                            <td>
                                @foreach ($type['school_types'] as $school_type)
                                    {{ $school_type }}@if (!$loop->last)
                                        <br>
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $type['legislation'] }}</td>
                            <td>
                                @forelse ($type['legislation_files']() as $file)
                                    <a class="inline-flex items-center gap-2 text-brand hover:underline"
                                        href="{{ str_replace('+', '%2B', Storage::disk('public')->url($file)) }}"
                                        target="_blank" rel="noopener noreferrer">{{ basename($file) }}<i
                                            class="fas fa-download" aria-hidden="true"></i></a>@if (!$loop->last)
                                        <br>
                                    @endif
                                @empty
                                    <span class="text-gray-500">Δεν υπάρχουν αρχεία</span>
                                @endforelse
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <div class="mt-4 flex justify-end">
        <a href="{{ route('excursion.wizard') }}" class="btn btn-success inline-flex items-center gap-2">
            <i class="fas fa-circle-question"></i> Χρειάζομαι καθοδήγηση
        </a>
    </div>
</x-layouts.app>
