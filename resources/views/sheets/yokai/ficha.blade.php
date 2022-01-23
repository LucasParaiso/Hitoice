@extends('sheets.master.layout')

@section('css')
<link rel="stylesheet" href="{{ url(mix('css/sheet.css')) }}">
@endsection

@section('content')
<header class="my-5">
    <h1>{{ $ficha->nome }}</h1>
</header>
@endsection