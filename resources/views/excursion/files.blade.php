@extends('layouts.app')

@section('title', 'Αρχεία Εκδρομής')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Αρχεία Εκδρομής #{{ $excursion->id }}
                    - {{ $excursion->eidos_ekdromis }}
                </h3>
            </div>
            <div class="panel-body">
                <!-- File Upload -->
                <div class="row">
                    <div class="col-md-12">
                        <h4>Μεταφόρτωση Αρχείου</h4>
                        <form action="{{ route('excursion.upload-file', $excursion) }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="file" class="form-control"
                                       accept=".xlsx,.xls,.doc,.docx,.pdf,.txt" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-upload"></span> Μεταφόρτωση
                            </button>
                        </form>
                        <hr>
                    </div>
                </div>

                <!-- File List -->
                <div class="row">
                    <div class="col-md-12">
                        <h4>Υπάρχοντα Αρχεία</h4>
                        @if(count($files) > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Όνομα Αρχείου</th>
                                        <th>Τύπος</th>
                                        <th>Μέγεθος</th>
                                        <th>Ενέργειες</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($files as $file)
                                        <tr>
                                            <td>{{ $file['original_name'] }}</td>
                                            <td>
                                                @if($file['type'] === 'F')
                                                    <span class="label label-primary">Τελικό</span>
                                                @elseif($file['type'] === 'A')
                                                    <span class="label label-success">Έγκριση</span>
                                                @else
                                                    <span class="label label-default">Χρήστη</span>
                                                @endif
                                            </td>
                                            <td>{{ number_format($file['size'] / 1024, 1) }} KB</td>
                                            <td>
                                                <a href="{{ route('excursion.download-file', [$excursion, $file['name']]) }}"
                                                   class="btn btn-sm btn-success" title="Λήψη">
                                                    <span class="glyphicon glyphicon-download"></span>
                                                </a>
                                                <form action="{{ route('excursion.delete-file', [$excursion, $file['name']]) }}"
                                                      method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Διαγραφή αρχείου;')" title="Διαγραφή">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">
                                Δεν υπάρχουν αρχεία για αυτή την εκδρομή.
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Actions -->
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <a href="{{ route('excursion.edit', $excursion) }}" class="btn btn-default">
                            <span class="glyphicon glyphicon-arrow-left"></span> Επιστροφή
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
