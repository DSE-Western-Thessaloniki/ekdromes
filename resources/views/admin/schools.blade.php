<x-layouts.app>
    <x-slot:title>Σχολεία</x-slot:title>

    <div class="space-y-6">
        <div class="bg-brand text-white px-6 py-4 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold">
                Σχολικές μονάδες - {{ $currentYear->sxoliko_etos }}
                <span class="ml-2 inline-block bg-white/20 text-white text-xs px-2 py-1 rounded-full">{{ count($schools) }}</span>
            </h3>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <section class="bg-white rounded-lg shadow-md p-6">
                <h4 class="text-lg font-semibold mb-4">Προσθήκη σχολικής μονάδας</h4>
                <form action="{{ route('admin.schools.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="kodikos_sxoleiou" class="block text-sm font-medium mb-1">Κωδικός σχολείου</label>
                            <input id="kodikos_sxoleiou" name="kodikos_sxoleiou" value="{{ old('kodikos_sxoleiou') }}"
                                maxlength="10" required class="w-full rounded border border-gray-300 px-3 py-2">
                            @error('kodikos_sxoleiou')
                                <p class="text-sm text-red-700 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="typos_sxoleiou" class="block text-sm font-medium mb-1">Τύπος σχολείου</label>
                            <select id="typos_sxoleiou" name="typos_sxoleiou" required
                                class="w-full rounded border border-gray-300 px-3 py-2">
                                <option value="">-- Επιλέξτε τύπο --</option>
                                @foreach ($schoolTypes as $schoolType)
                                    <option value="{{ $schoolType }}" @selected(old('typos_sxoleiou') === $schoolType)>
                                        {{ $schoolType }}
                                    </option>
                                @endforeach
                            </select>
                            @error('typos_sxoleiou')
                                <p class="text-sm text-red-700 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="displayname" class="block text-sm font-medium mb-1">Επωνυμία</label>
                        <input id="displayname" name="displayname" value="{{ old('displayname') }}" maxlength="255"
                            required class="w-full rounded border border-gray-300 px-3 py-2">
                        @error('displayname')
                            <p class="text-sm text-red-700 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="phonenumbers" class="block text-sm font-medium mb-1">Τηλέφωνο</label>
                            <input id="phonenumbers" name="phonenumbers" value="{{ old('phonenumbers') }}" maxlength="20"
                                class="w-full rounded border border-gray-300 px-3 py-2">
                            @error('phonenumbers')
                                <p class="text-sm text-red-700 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium mb-1">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" maxlength="255"
                                class="w-full rounded border border-gray-300 px-3 py-2">
                            @error('email')
                                <p class="text-sm text-red-700 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="rounded bg-brand px-4 py-2 font-semibold text-white hover:bg-brand-dark">
                        Προσθήκη
                    </button>
                </form>
            </section>

            <section class="bg-white rounded-lg shadow-md p-6">
                <h4 class="text-lg font-semibold mb-4">Αντιγραφή σχολικών μονάδων σε άλλο έτος</h4>
                <form action="{{ route('admin.schools.copy') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="source_school_year_id" class="block text-sm font-medium mb-1">Από σχολικό έτος</label>
                        <select id="source_school_year_id" name="source_school_year_id" required
                            class="w-full rounded border border-gray-300 px-3 py-2">
                            <option value="">-- Επιλέξτε έτος --</option>
                            @foreach ($schoolYears as $schoolYear)
                                <option value="{{ $schoolYear->id }}" @selected((int) old('source_school_year_id', $currentYear->id) === $schoolYear->id)>
                                    {{ $schoolYear->sxoliko_etos }}
                                </option>
                            @endforeach
                        </select>
                        @error('source_school_year_id')
                            <p class="text-sm text-red-700 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="target_school_year_id" class="block text-sm font-medium mb-1">Σε σχολικό έτος</label>
                        <select id="target_school_year_id" name="target_school_year_id" required
                            class="w-full rounded border border-gray-300 px-3 py-2">
                            <option value="">-- Επιλέξτε έτος --</option>
                            @foreach ($schoolYears as $schoolYear)
                                <option value="{{ $schoolYear->id }}" @selected((int) old('target_school_year_id') === $schoolYear->id)>
                                    {{ $schoolYear->sxoliko_etos }}
                                </option>
                            @endforeach
                        </select>
                        @error('target_school_year_id')
                            <p class="text-sm text-red-700 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <p class="text-sm text-gray-600">Οι μονάδες που υπάρχουν ήδη στο έτος προορισμού δεν θα τροποποιηθούν.</p>
                    <button type="submit" class="rounded bg-brand px-4 py-2 font-semibold text-white hover:bg-brand-dark">
                        Αντιγραφή
                    </button>
                </form>
            </section>
        </div>

        <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <div class="overflow-x-auto p-4 sm:p-6">
                <table id="schoolsTable" aria-label="Σχολικές μονάδες" class="admin-list-table w-full text-left">
                    <thead>
                        <tr class="bg-gray-100">
                            <th scope="col">Κωδικός</th>
                            <th scope="col">Τύπος</th>
                            <th scope="col">Επωνυμία</th>
                            <th scope="col">Τηλέφωνο</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ενέργειες</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($schools as $school)
                            <tr class="transition-colors odd:bg-white even:bg-gray-50/50 hover:bg-blue-50">
                                <td class="whitespace-nowrap">{{ $school->kodikos_sxoleiou }}</td>
                                <td class="whitespace-nowrap">{{ $school->typos_sxoleiou }}</td>
                                <td>{{ $school->displayname }}</td>
                                <td class="whitespace-nowrap">{{ $school->phonenumbers }}</td>
                                <td>{{ $school->email }}</td>
                                <td class="whitespace-nowrap">
                                    @if ($school->excursions_count === 0)
                                        <form action="{{ route('admin.schools.destroy', $school) }}" method="POST"
                                            onsubmit="return confirm('Να διαγραφεί η σχολική μονάδα;')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded bg-red-600 px-3 py-1 text-white hover:bg-red-700">
                                                Διαγραφή
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-sm text-gray-600">Υπάρχει καταχωρημένη εκδρομή</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-sm text-gray-500">
                                    Δεν υπάρχουν σχολικές μονάδες
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script>
            $(document).ready(function() {
                $('#schoolsTable').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Greek.json'
                    },
                    order: [
                        [2, 'asc']
                    ]
                });
            });
        </script>
    </x-slot:scripts>

</x-layouts.app>
