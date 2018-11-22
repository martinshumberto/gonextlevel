@extends('layouts.app')

@section('content')
    <profile-user :user="{{ json_encode(auth()->user()) }}"></profile-user>
@endsection
