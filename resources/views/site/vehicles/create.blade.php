@extends('adminlte::page')



@section('title', "Adicionar veículo" )

@section('content_header')
<h1>Cadastrar veículo:</h1>
@stop

@section('content')
<div>
<p class="text-muted">Cadastre seus veículos para gerenciamento</p>
</div>

<form action="{{ Route('user.vehicle.store') }}" method="post" id="form-ajax">
    @csrf
    
    <div id="message">

    </div>

    
    <div class="form-group">
        <label for="name">Marca:</label>
        <input type="text" id="name" name="brand" class="form-control">        
    </div>

    <div class="form-group">
        <label for="model">Modelo:</label>
        <input type="text" name="model" id="model" class="form-control">        
    </div>

    <div class="form-group">
        <label for="board">Placa:</label>
        <input type="text" name="board" id="board" class="form-control">        
    </div>

    <div class="col-12" >
        <button class="btn btn-primary" style="width: 100%;">
            Cadastrar
        </button>
    </div>
</form>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">


@stop

@section('js')
<script src="{{ asset('site/js/ajaxLoad.js') }}"></script>
<script src="{{ asset('site/js/insertMessage.js') }}"></script>
<script src="{{ asset('site/js/formAjax.js') }}"></script>  
@stop