@extends('layouts.guest')

@section('content')
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w">
        <div class="logo-w"><a href="/"><img alt="" src="img/logo-big.png"></a></div>
        <h4 class="auth-header">Logar</h4>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="">E-mail</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <div class="pre-icon os-icon os-icon-user-male-circle"></div>
            </div>
            <div class="form-group">
                <label for="">Senha</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Senha" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <div class="pre-icon os-icon os-icon-fingerprint"></div>
            </div>
            <div class="buttons-w">
                <button type="submit" class="btn btn-primary">Logar</button>
                <a href="{{route('register')}}" class="btn btn-secondary">Ainda não é cadastrado?</a>
            </div>

            <div class="form-group mt-10">
                <a href="#">Esqueceu sua senha?</a>
            </div>
        </form>
    </div>
</div>
@endsection
