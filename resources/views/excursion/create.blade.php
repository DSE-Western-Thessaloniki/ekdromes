@extends('layouts.app')

@section('title', 'Νέα Εκδρομή')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Δημιουργία Νέας Εκδρομής</h3>
            </div>
            <div class="panel-body">
                <form action="{{ route('excursion.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="eidos_ekdromis">Είδος Εκδρομής *</label>
                                <select name="eidos_ekdromis" id="eidos_ekdromis" class="form-control" required>
                                    <option value="">-- Επιλέξτε --</option>
                                    @foreach($types as $key => $type)
                                        <option value="{{ $key }}">{{ $type['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="proorismos">Προορισμός *</label>
                                <input type="text" name="proorismos" id="proorismos"
                                       class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="hmera_ekdromis_anaxorisis">Ημ. Εκδρομής *</label>
                                <input type="date" name="hmera_ekdromis_anaxorisis"
                                       id="hmera_ekdromis_anaxorisis" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ora_anaxorisis">Ώρα Αναχώρησης *</label>
                                <input type="time" name="ora_anaxorisis" id="ora_anaxorisis"
                                       class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="hmera_epistrofis">Ημ. Επιστροφής *</label>
                                <input type="date" name="hmera_epistrofis" id="hmera_epistrofis"
                                       class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ora_epistrofis">Ώρα Επιστροφής *</label>
                                <input type="time" name="ora_epistrofis" id="ora_epistrofis"
                                       class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ar_mathiton">Αρ. Μαθητών *</label>
                                <input type="number" name="ar_mathiton" id="ar_mathiton"
                                       class="form-control" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ar_metakinoumenon">Αρ. Μετακινούμενων</label>
                                <input type="number" name="ar_metakinoumenon" id="ar_metakinoumenon"
                                       class="form-control" min="0" value="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="onoma_arxigos">Ον. Αρχηγού *</label>
                                <input type="text" name="onoma_arxigos" id="onoma_arxigos"
                                       class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="paratiriseis">Παρατηρήσεις</label>
                                <textarea name="paratiriseis" id="paratiriseis"
                                          class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Αποθήκευση
                            </button>
                            <a href="{{ route('dashboard') }}" class="btn btn-default btn-lg">
                                Ακύρωση
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
