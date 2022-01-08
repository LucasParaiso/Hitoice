@extends('user.master.layout')

@section('title')
<h2>Login</h2>
@endsection

@section('formHead')
name="formLogin"
@endsection

@section('linkBack')
<a href="{{ route('user.create') }}">Criar uma Conta</a>
@endsection

@section('formbutton')
Entrar
@endsection