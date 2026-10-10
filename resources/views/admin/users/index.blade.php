<x-layouts.app>
    <x-slot:title>Διαχείριση διαχειριστών</x-slot:title>

    <div class="space-y-6">
        <div class="bg-brand text-white px-6 py-4 rounded-lg shadow-md">
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
                    <label for="email_username" class="block text-sm font-medium mb-1">Email ΠΣΔ</label>
                    <div class="flex rounded border border-gray-300 focus-within:border-brand focus-within:ring-2 focus-within:ring-brand">
                        <input id="email_username" name="email_username" type="text" inputmode="email"
                            value="{{ old('email_username') }}" maxlength="248" required
                            class="min-w-0 flex-1 rounded-l px-3 py-2 outline-none">
                        <span class="flex items-center rounded-r bg-gray-100 px-3 text-gray-700">@sch.gr</span>
                    </div>
                    @error('email_username')
                        <p class="text-sm text-red-700 mt-1">{{ $message }}</p>
                    @enderror
                    @error('email')
                        <p class="text-sm text-red-700 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <button type="submit" class="rounded bg-brand px-4 py-2 font-semibold text-white hover:bg-brand-dark">
                        Προσθήκη διαχειριστή
                    </button>
                </div>
            </form>
        </section>

        <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <div class="overflow-x-auto p-4 sm:p-6">
                <table id="usersTable" aria-label="Διαχειριστές εφαρμογής" class="admin-list-table w-full text-left">
                    <thead>
                        <tr class="bg-gray-100">
                            <th scope="col">Ονοματεπώνυμο</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ενέργειες</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="transition-colors odd:bg-white even:bg-gray-50/50 hover:bg-blue-50">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="whitespace-nowrap">
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
