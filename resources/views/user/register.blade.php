@extends('user.master.layout')

@section('style')
<style>
    main h2::before {
        width: 30px;
    }
</style>
@endsection

@section('title')
<h2>Registrar</h2>
@endsection

@section('formHead')
action="{{ route('user.store') }}" method="post"
@endsection

@section('linkBack')
<a href="{{ route('user.index') }}">Fazer Login</a>
@endsection

@section('formbutton')
Registrar
@endsection