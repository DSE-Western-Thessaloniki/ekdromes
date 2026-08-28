@extends('layouts.app')

@section('title', 'Σχολεία')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Σχολεία - {{ $currentYear->sxoliko_etos }}
                    <span class="badge">{{ count($schools) }}</span>
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="schoolsTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Κωδικός</th>
                                <th>Τύπος</th>
                                <th>Επωνυμία</th>
                                <th>Τηλέφωνο</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($schools as $school)
                                <tr>
                                    <td>{{ $school->kodikos_sxoleiou }}</td>
                                    <td>{{ $school->typos_sxoleiou }}</td>
                                    <td>{{ $school->displayname }}</td>
                                    <td>{{ $school->phonenumbers }}</td>
                                    <td>{{ $school->email }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Δεν υπάρχουν σχολεία
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
    $('#schoolsTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Greek.json'
        },
        order: [[2, 'asc']]
    });
});
</script>
@endsection
