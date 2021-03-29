@extends('adminlte::page')



@section('title', "Editar veículo" )

@section('content_header')
<h1>Editar veículo:</h1>
@stop

@section('content')

<form action="{{ Route('user.vehicle.update', $vehicle->id) }}" method="post" id="form-ajax">
    @csrf
    @method("PUT")
    
    <div id="message">

    </div>

    
    <div class="form-group">
        <label for="name">Marca:</label>
        <input type="text" id="name" value="{{ $vehicle->brand }}" name="brand" class="form-control">        
    </div>

    <div class="form-group">
        <label for="model">Modelo:</label>
        <input type="text" name="model" value="{{ $vehicle->model }}" id="model" class="form-control">        
    </div>

    <div class="form-group">
        <label for="board">Placa:</label>
        <input type="text" name="board" value="{{ $vehicle->board }}" id="board" class="form-control">        
    </div>

    <div class="col-12" >
        <button class="btn btn-primary" style="width: 100%;">
            Atualizar
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