@extends('layouts.app')

@section('content')
    <div class="my-account">
        <div class="row">
            <div class="col-md-4" style="border-right: solid 1px black">
                <h2>Mis datos</h2>
                {!!
                    Form::open([
                    'url' => route('account.update', $user),
                    'method' => 'POST',
                    ])
                !!}
                @csrf
                <div class=" justify-content-center">
                    <div class="form-group">
                        {!!
                            Form::text('firstname', $user->firstname , [
                                'class' => 'form-control',
                                'placeholder' => 'Nombre',
                                'required' => 'required',
                            ])
                        !!}
                        {!! $errors->first('firstname', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        {!!
                            Form::text('lastname', $user->lastname, [
                                'class' => 'form-control',
                                'placeholder' => 'Apellido',
                                'required' => 'required',
                            ])
                        !!}
                        {!! $errors->first('lastname', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        {!!
                            Form::email('email', $user->email, [
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
                            ])
                        !!}
                        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        {!!
                            Form::password('password_confirmation', [
                                'class' => 'form-control',
                                'placeholder' => 'Confirmar contraseña',
                            ])
                        !!}
                        {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        {!!
                            Form::text('address', $user->address, [
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
                                Form::number('postal_code', $user->postal_code, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Codigo postal',
                                    'required' => 'required',
                                ])
                            !!}
                            {!! $errors->first('postal_code', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group col-md-6">
                            {!!
                                Form::text('city', $user->city, [
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
                            Form::text('country', $user->country, [
                                'class' => 'form-control',
                                'placeholder' => 'Pais',
                                'required' => 'required',
                            ])
                        !!}
                        {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div>

                        <p><input type="checkbox" name="newsletter" value="1" @if ($user->newsletter == 1)
                            checked @endif> Acepto recibir noticias de la newsletter</p>

                        {!! Form::submit(' GUARDAR', ['class' => 'btn btn-moutarde btn-sm float-right',])!!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>

            <div class="col-md-8">
                <h2>Mis compras</h2>

                <div class="buying">
                    <div class="row item">
                        <div class="col-md-4">
                            <img src="/img/image-blue.jpg"class="img-fluid" alt="">
                        </div>
                        <div class="col-md-8">
                            <h3>Les rabietes</h3>
                            <p>Comprado el XX/XX/2018 | <a href="">Descargar la factura</a></p>
                            <bouton class="btn btn-sm btn-moutarde">VER</bouton>
                        </div>
                    </div>

                    <div class="row item">
                        <div class="col-md-4">
                            <img src="/img/image-blue.jpg"class="img-fluid" alt="">
                        </div>
                        <div class="col-md-8">
                            <h3>Les rabietes</h3>
                            <p>Comprado el XX/XX/2018 | <a href="">Descargar la factura</a></p>
                            <bouton class="btn btn-sm btn-moutarde">VER</bouton>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
