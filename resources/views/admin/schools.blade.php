@extends('layouts.app')

@section('title', 'Σχολεία')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-coral text-white px-6 py-4">
        <h3 class="text-xl font-semibold">
            Σχολεία - {{ $currentYear->sxoliko_etos }}
            <span class="ml-2 inline-block bg-white/20 text-white text-xs px-2 py-1 rounded-full">{{ count($schools) }}</span>
        </h3>
    </div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <table id="schoolsTable" class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">Κωδικός</th>
                        <th class="px-4 py-2 border">Τύπος</th>
                        <th class="px-4 py-2 border">Επωνυμία</th>
                        <th class="px-4 py-2 border">Τηλέφωνο</th>
                        <th class="px-4 py-2 border">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($schools as $school)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $school->kodikos_sxoleiou }}</td>
                            <td class="px-4 py-2 border">{{ $school->typos_sxoleiou }}</td>
                            <td class="px-4 py-2 border">{{ $school->displayname }}</td>
                            <td class="px-4 py-2 border">{{ $school->phonenumbers }}</td>
                            <td class="px-4 py-2 border">{{ $school->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 border text-center text-gray-500">
                                Δεν υπάρχουν σχολεία
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
    $('#schoolsTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Greek.json'
        },
        order: [[2, 'asc']]
    });
});
</script>
@endsection
