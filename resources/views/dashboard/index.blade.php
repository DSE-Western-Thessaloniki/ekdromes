@extends('layouts.app')

@section('title', 'Αρχική - Εκδρομές')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Λίστα Εκδρομών - {{ $currentYear->sxoliko_etos }}
                    @if($isAdmin)
                        <span class="badge">Διαχειριστής</span>
                    @endif
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="excursionsTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Κωδικός</th>
                                @if($isAdmin)
                                    <th>Σχολείο</th>
                                @endif
                                <th>Είδος Εκδρομής</th>
                                <th>Προορισμός</th>
                                <th>Ημ. Εκδρομής</th>
                                <th>Ημ. Επιστροφής</th>
                                <th>Μαθητές</th>
                                <th>Κατάσταση</th>
                                <th>Ενέργειες</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($excursions as $excursion)
                                <tr>
                                    <td>{{ $excursion->id }}</td>
                                    @if($isAdmin)
                                        <td>{{ $excursion->school->displayname ?? 'N/A' }}</td>
                                    @endif
                                    <td>{{ $excursion->eidos_ekdromis }}</td>
                                    <td>{{ $excursion->proorismos }}</td>
                                    <td>{{ $excursion->hmera_ekdromis_anaxorisis?->format('d/m/Y') }}</td>
                                    <td>{{ $excursion->hmera_epistrofis?->format('d/m/Y') }}</td>
                                    <td>{{ $excursion->ar_mathiton }}</td>
                                    <td>
                                        @if($excursion->isSubmitted())
                                            <span class="label label-success">Υποβλήθηκε</span>
                                        @else
                                            <span class="label label-warning">Προσωρινή</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('excursion.edit', $excursion) }}"
                                           class="btn btn-sm btn-primary" title="Επεξεργασία">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="{{ route('excursion.files', $excursion) }}"
                                           class="btn btn-sm btn-info" title="Αρχεία">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                        </a>
                                        @if($excursion->isDraft())
                                            <form action="{{ route('excursion.destroy', $excursion) }}"
                                                  method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Είστε σίγουρος;')" title="Διαγραφή">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ $isAdmin ? 9 : 8 }}" class="text-center">
                                        Δεν υπάρχουν εκδρομές
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
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
