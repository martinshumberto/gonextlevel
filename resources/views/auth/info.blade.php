@extends('layouts.app')

@section('content')
    <section class="container">
        <section class="row">
            <section class="col-md-12">
                <form method="POST" action="{{ route('profile.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                        <div class="col-md-6">
                            <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" required>

                            @if ($errors->has('cpf'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cpf') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cell-phone" class="col-md-4 col-form-label text-md-right">{{ __('cell phone') }}</label>

                        <div class="col-md-6">
                            <input id="cell-phone" type="text" class="form-control{{ $errors->has('cell_phone') ? ' is-invalid' : '' }}" name="cell_phone" value="{{ old('cell_phone') }}" required>

                            @if ($errors->has('cell_phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cell_phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birth-date" class="col-md-4 col-form-label text-md-right">{{ __('Birth date') }}</label>

                        <div class="col-md-6">
                            <input id="birth-date" type="text" class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}" name="birth_date" value="{{ old('birth_date') }}" required>

                            @if ($errors->has('birth_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('birth_date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </section>
        </section>
    </section>
@endsection
