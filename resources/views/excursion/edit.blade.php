@extends('layouts.app')

@section('title', 'Επεξεργασία Εκδρομής')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Επεξεργασία Εκδρομής #{{ $excursion->id }}
                    @if($excursion->hasProtocol())
                        <span class="label label-info">Πρωτόκολλο: {{ $excursion->ar_prot }}</span>
                    @endif
                </h3>
            </div>
            <div class="panel-body">
                <form action="{{ route('excursion.update', $excursion) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Είδος Εκδρομής</label>
                                <input type="text" class="form-control"
                                       value="{{ $excursion->eidos_ekdromis }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="proorismos">Προορισμός *</label>
                                <input type="text" name="proorismos" id="proorismos"
                                       class="form-control"
                                       value="{{ $excursion->proorismos }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="hmera_ekdromis_anaxorisis">Ημ. Εκδρομής *</label>
                                <input type="date" name="hmera_ekdromis_anaxorisis"
                                       id="hmera_ekdromis_anaxorisis" class="form-control"
                                       value="{{ $excursion->hmera_ekdromis_anaxorisis?->format('Y-m-d') }}"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ora_anaxorisis">Ώρα Αναχώρησης *</label>
                                <input type="time" name="ora_anaxorisis" id="ora_anaxorisis"
                                       class="form-control"
                                       value="{{ $excursion->ora_anaxorisis }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="hmera_epistrofis">Ημ. Επιστροφής *</label>
                                <input type="date" name="hmera_epistrofis" id="hmera_epistrofis"
                                       class="form-control"
                                       value="{{ $excursion->hmera_epistrofis?->format('Y-m-d') }}"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ora_epistrofis">Ώρα Επιστροφής *</label>
                                <input type="time" name="ora_epistrofis" id="ora_epistrofis"
                                       class="form-control"
                                       value="{{ $excursion->ora_epistrofis }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ar_mathiton">Αρ. Μαθητών *</label>
                                <input type="number" name="ar_mathiton" id="ar_mathiton"
                                       class="form-control" min="0"
                                       value="{{ $excursion->ar_mathiton }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ar_metakinoumenon">Αρ. Μετακινούμενων</label>
                                <input type="number" name="ar_metakinoumenon" id="ar_metakinoumenon"
                                       class="form-control" min="0"
                                       value="{{ $excursion->ar_metakinoumenon }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="onoma_arxigos">Ον. Αρχηγού *</label>
                                <input type="text" name="onoma_arxigos" id="onoma_arxigos"
                                       class="form-control"
                                       value="{{ $excursion->onoma_arxigos }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="paratiriseis">Παρατηρήσεις</label>
                                <textarea name="paratiriseis" id="paratiriseis"
                                          class="form-control" rows="3">{{ $excursion->paratiriseis }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Αποθήκευση
                            </button>
                            <a href="{{ route('excursion.files', $excursion) }}"
                               class="btn btn-info btn-lg">
                                <span class="glyphicon glyphicon-folder-open"></span> Αρχεία
                            </a>
                            <a href="{{ route('dashboard') }}" class="btn btn-default btn-lg">
                                Επιστροφή
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
