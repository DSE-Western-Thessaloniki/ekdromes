@extends('layouts.app')

@section('title', 'Επεξεργασία Εκδρομής')

@section('content')
    @include('excursion._form', [
        'excursion' => $excursion,
        'types' => $types,
        'fieldMap' => $fieldMap,
        'mode' => 'edit',
    ])
@endsection
