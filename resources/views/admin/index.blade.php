@extends('layouts.app')

@section('title', 'Διαχείριση')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Διαχείριση Συστήματος</h3>
            </div>
            <div class="panel-body">
                <!-- School Year Switcher -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Αλλαγή Σχολικού Έτους</h4>
                            </div>
                            <div class="panel-body">
                                <form action="{{ route('admin.switch-year') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="year_id">Τρέχον Σχολικό Έτος:
                                            <strong>{{ $currentYear->sxoliko_etos }}</strong>
                                        </label>
                                        <select name="year_id" id="year_id" class="form-control">
                                            @foreach($years as $year)
                                                <option value="{{ $year->id }}"
                                                    {{ $year->is_current ? 'selected' : '' }}>
                                                    {{ $year->sxoliko_etos }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-refresh"></span> Αλλαγή Έτους
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Ενέργειες</h4>
                            </div>
                            <div class="panel-body">
                                <a href="{{ route('admin.schools') }}" class="btn btn-info btn-block">
                                    <span class="glyphicon glyphicon-list"></span> Λίστα Σχολείων
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
