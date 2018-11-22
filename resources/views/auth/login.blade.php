@extends('layouts.guest')

@section('content')
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w">
        <div class="logo-w"><a href="/"><img alt="" src="img/logo-big.png"></a></div>
        <h4 class="auth-header">Login</h4>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="">Email</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
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
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="d-flex justify-content-around align-items-center mt-4">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{route('register')}}">Não é cadastrado?</a>
            </div>
        </form>
    </div>
</div>
@endsection
