@extends('layouts.app')

@section('title', 'Αρχική - Εκδρομές')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-coral text-white px-6 py-4">
        <h3 class="text-xl font-semibold">
            Λίστα Εκδρομών - {{ $currentYear->sxoliko_etos }}
        </h3>
    </div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <table id="excursionsTable" class="w-full text-left border-collapse" data-url="{{ $apiUrl }}" data-school-id="{{ $schoolId }}">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border" data-col="index">αα</th>
                        <th class="px-4 py-2 border" data-col="eidos_ekdromis">Είδος Εκδρομής</th>
                        <th class="px-4 py-2 border" data-col="proorismos">Προορισμός</th>
                        <th class="px-4 py-2 border" data-col="hmera_ekdromis_anaxorisis">Ημ. Εκδρομής</th>
                        <th class="px-4 py-2 border" data-col="hmera_epistrofis">Ημ. Επιστροφής</th>
                        <th class="px-4 py-2 border" data-col="ar_mathiton">Μαθητές</th>
                        <th class="px-4 py-2 border" data-col="status">Κατάσταση</th>
                        <th class="px-4 py-2 border" data-col="actions">Ενέργειες</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
