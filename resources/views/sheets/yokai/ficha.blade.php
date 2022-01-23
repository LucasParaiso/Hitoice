@extends('sheets.master.layout')

@section('css')
<link rel="stylesheet" href="{{ url(mix('css/sheet.css')) }}">
@endsection

@if (Auth::User()->role_as == 'admin')
@section('sheetDelete')
<a class="btn btn-danger me-1" data-bs-toggle="modal" data-bs-target="#deleteSheetYokaiModal">Excluir</a>
@endsection
@endif

@section('content')
<header class="my-5">
    <h1>{{ $ficha->nome }}</h1>
</header>
@endsection

@section('modal')
@if(Auth::User()->role_as == 'admin')
<!-- DELETE MODAL YOKAI -->
<div class="modal fade" id="deleteSheetYokaiModal" tabindex="-1" aria-labelledby="deleteSheetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 id="deleteSheetModalLabel">Confirmação</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <p>Você tem certeza que deseja excluir essa ficha?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('yokai.destroy', ['fichasyokai' => $ficha->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Sim" class="btn btn-primary">
                </form>
                <input type="button" value="Fechar" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
            </div>
        </div>
    </div>
</div>
@endif
@endsection