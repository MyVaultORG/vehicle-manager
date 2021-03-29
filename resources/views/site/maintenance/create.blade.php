@extends('adminlte::page')



@section('title', "Agendar manutenção" )

@section('content_header')
<h1>Agendar manutenção</h1>
@stop

@section('content')
<div>
<p class="text-muted">Escolha uma data e um veículo cadastrado para manutenção</p>
</div>

<form action="{{ Route('user.maintenance.store') }}" method="post" id="form-ajax">
    @csrf
    
    <div id="message">
        @include('flash::message')
    </div>

    
    <div class="form-group">
        <label for="date">Data:</label>
        <input type="date" min="{{ date('Y/m/d') }}" id="date" name="date" class="form-control">        
    </div>    

    <label for="vehicle">Veículo:</label>
    <div class="form-group">
        
        <select name="vehicle" class="form-select" id="vehicle">
            @foreach ($vehicles as $vehicle)
            <option value="{{ $vehicle->id }}"> {{ $vehicle->brand }} | {{ $vehicle->model }}</option>    
            @endforeach            
        </select>        
    </div>

    <div class="col-12" >
        <button class="btn btn-primary" style="width: 100%;">
            Agendar
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