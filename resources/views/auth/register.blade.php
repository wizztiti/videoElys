@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="text-center">Register</h1>
    {!!
        Form::open([
        'url' => route('register'),
        'method' => 'POST',
        ])
    !!}
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="form-group">
                {!!
                    Form::email('email', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Email',
                        'required' => 'required',
                    ])
                !!}
                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group">
                {!!
                    Form::password('password', [
                        'class' => 'form-control',
                        'placeholder' => 'password',
                        'required' => 'required',
                    ])
                !!}
                {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group">
                {!!
                    Form::password('password_confirmation', [
                        'class' => 'form-control',
                        'placeholder' => 'Confirmar contraseña',
                        'required' => 'required',
                    ])
                !!}
                {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
            </div>

            <div>
                {{ Form::hidden('newsletter', 0 )}}
                <p>{!! Form::checkbox('newsletter', 1); !!} Acepto recibir noticias de la newsletter</p>
                <p>{!! Form::checkbox('accept-condition'); !!} Acepto las condiciones...</p>
                {!! $errors->first('accept-condition', '<span class="help-block">:message</span>') !!}
                {!! Form::submit(' GUARDAR', ['class' => 'btn btn-moutarde float-right',])!!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
