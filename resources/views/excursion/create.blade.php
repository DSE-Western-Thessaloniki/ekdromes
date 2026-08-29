@extends('layouts.app')

@section('title', 'Νέα Εκδρομή')

@section('content')
    @include('excursion._form', [
        'excursion' => null,
        'types' => $types,
        'fieldMap' => $fieldMap,
        'mode' => 'create',
    ])
@endsection
