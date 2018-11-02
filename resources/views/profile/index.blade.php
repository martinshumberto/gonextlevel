@extends('layouts.app')

@section('content')
<section class="container">
    <section class="row">
        <section class="col-md-4">
            <picture>
                <img class="img-thumbnail rounded" src="https://bestcellphonespyapps.com/wp-content/uploads/2017/09/pexels-photo-220453-1-1001x1024.jpeg" alt="Profile picture">
            </picture>
            <section class="form-group">
                <input type="file">
            </section>
        </section>
        <section class="col-md-8">
            <section>
                <label for="name">Nome:</label>
                <span>{{$user->name}}</span>
            </section>
            <section>
                <label for="email">Email:</label>
                <span>{{$user->email}}</span>
            </section>
            <section>
                <label for="company">Minha Empresa:</label>
                <span>{{$user->company}}</span>
            </section>
            <section>
                <label for="phone">Telefone:</label>
                <span>{{$user->phone}}</span>
            </section>
        </section>
    </section>
</section>
@endsection