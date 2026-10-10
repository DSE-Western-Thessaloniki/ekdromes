<x-layouts.app>
    <x-slot:title>Διαχείριση διαχειριστών</x-slot:title>

    <div class="space-y-6">
        <div class="bg-coral text-white px-6 py-4 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold">Διαχειριστές εφαρμογής</h3>
        </div>

        <section class="bg-white rounded-lg shadow-md p-6">
            <h4 class="text-lg font-semibold mb-4">Προσθήκη διαχειριστή ΠΣΔ</h4>
            <form action="{{ route('admin.users.store') }}" method="POST" class="grid gap-4 sm:grid-cols-2">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium mb-1">Ονοματεπώνυμο</label>
                    <input id="name" name="name" value="{{ old('name') }}" maxlength="255" required
                        class="w-full rounded border border-gray-300 px-3 py-2">
                    @error('name')
                        <p class="text-sm text-red-700 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium mb-1">Email ΠΣΔ</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" maxlength="255" required
                        class="w-full rounded border border-gray-300 px-3 py-2">
                    @error('email')
                        <p class="text-sm text-red-700 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <button type="submit" class="rounded bg-coral px-4 py-2 font-semibold text-white hover:bg-coral-dark">
                        Προσθήκη διαχειριστή
                    </button>
                </div>
            </form>
        </section>

        <section class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 overflow-x-auto">
                <table id="usersTable" class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">Ονοματεπώνυμο</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Ενέργειες</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $user->name }}</td>
                                <td class="px-4 py-2 border">{{ $user->email }}</td>
                                <td class="px-4 py-2 border">
                                    @if ($users->count() > 1)
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                            onsubmit="return confirm('Να διαγραφεί ο διαχειριστής;')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded bg-red-600 px-3 py-1 text-white hover:bg-red-700">
                                                Διαγραφή
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-sm text-gray-600">Ο τελευταίος διαχειριστής δεν διαγράφεται</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <x-slot:scripts>
        <script>
            $(document).ready(function() {
                $('#usersTable').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Greek.json'
                    },
                    order: [
                        [0, 'asc']
                    ]
                });
            });
        </script>
    </x-slot:scripts>
</x-layouts.app>
