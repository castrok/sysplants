@extends('app')
@section('template')
    <style>
        body, html {
            overflow-y: hidden;
            overflow-x: hidden;
            background-image: url({{url('images/background.jpg')}});
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            color: black; !important;
        }
    </style>
    {{--<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h4 class="logo-name">CK</h4>

            </div>
            <h2><b>Bem Vindo !</b></h2>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (CK)-->
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" method="POST" action="{{ route('login') }}" autocomplete="on">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  placeholder="E-Mail" required autofocus>
                    <label for="email"></label>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert"> <strong>{{ $errors->first('email') }}</strong> </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="password" type="password" placeholder="Senha" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <label for="password"></label>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert"> <strong>{{ $errors->first('password') }}</strong> </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Entrar</button>
                <button class="btn btn-primary block full-width m-b">Esqueceu a senha ?</button>

            </form>
            <h4 class="m-t"><b>Developed by Akheem CK {{date('Y')}}</b></h4>
        </div>
    </div>
@endsection