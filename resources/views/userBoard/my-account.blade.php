@extends('layouts.app')

@section('content')

    <h1>Mon compte</h1>

    <a href="{{ action('AccountController@showFormPassword') }}" class="btn btn-primary">Changer mon mot de passe</a>
@endsection
