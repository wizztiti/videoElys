@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="text-center">Mis datos</h1>
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
                    Form::text('firstname', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Nombre',
                        'required' => 'required',
                    ])
                !!}
                {!! $errors->first('firstname', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group">
                {!!
                    Form::text('lastname', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Apellido',
                        'required' => 'required',
                    ])
                !!}
                {!! $errors->first('lastname', '<span class="help-block">:message</span>') !!}
            </div>

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
        </div>
        <div class="col-md-5">
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

            <div class="form-group">
                {!!
                    Form::text('address', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Direcion',
                        'required' => 'required',
                    ])
                !!}
                {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    {!!
                        Form::number('code-post', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Codigo postal',
                            'required' => 'required',
                        ])
                    !!}
                    {!! $errors->first('code-post', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group col-md-6">
                    {!!
                        Form::text('city', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Ciudad',
                            'required' => 'required',
                        ])
                    !!}
                    {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
                </div>

            </div>

            <div class="form-group">
                {!!
                    Form::text('country', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Pais',
                        'required' => 'required',
                    ])
                !!}
                {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-10 offset-md-1">
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
