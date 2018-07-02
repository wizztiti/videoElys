@extends('layouts.default')

@section('content')
    <h4>Ajouter une nouvelle catégorie</h4>

    @include('category.form', ['action' => "store"])

@endsection