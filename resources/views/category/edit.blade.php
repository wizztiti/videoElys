@extends('layouts.default')

@section('content')
    <h4>Modifier la catégorie</h4>

    @include('category.form', ['action' => "update"])

@endsection