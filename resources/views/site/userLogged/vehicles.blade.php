


@extends('adminlte::page')

@section('title', "Meus veículos" )

@section('content_header')
<div style="display: flex; align-items: center;">
    <h1>Meus veículos: </h1>
    <a style="margin-left: 10px;" href="{{ Route('user.vehicle.create')}}"><button class="btn btn-sm btn-primary">Cadastrar</button></a>
</div>




@stop

@section('content')
<p class="text-muted">Faça o gerenciamento dos seus veículos cadastrados</p>


<div id="message">
    @include('flash::message')
</div>



<table class="table align-middle" style="margin-top: 15px;">    
    <thead>
        <tr>                
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Placa</th>            
        </tr>
    </thead>    
    @forelse ($vehicles as $vehicle)
    <tbody>
        <tr>                
            <td>{{ $vehicle->brand }}</td>
            <td>{{ $vehicle->model }}</td>
            <td>{{ $vehicle->board }}</td>            
            <td class="d-flex">
                <a href="{{ Route('user.vehicle.edit', $vehicle->id)}}">
                    <i id="edit" class="fas fa-edit mx-3" 
                    style="color: rgb(14, 137, 252); margin-top: 6px;"></i>
                </a>
                
                <form id="form-ajax-remove" action="{{ Route('user.vehicle.destroy', $vehicle->id) }}" method="post">
                    @csrf
                    @method("DELETE")                    
                    <button type="submit" class="btn btn-sm">
                        <i id="trash" class="fas fa-trash "
                        style="color:rgb(143, 19, 19)">
                    </i>
                </button>
            </form>
        </td>
    </tr>                    
</tbody>    

@empty
<div class="message alert">
    Não existem veículos cadastrados.
</div>    
@endforelse 

</table>

{{ $vehicles->links()}}




@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">


@stop

@section('js')
<script src="{{ asset('site/js/ajaxLoad.js') }}"></script>
<script src="{{ asset('site/js/insertMessage.js') }}"></script>
<script src="{{ asset('site/js/formAjax.js') }}"></script>  

@stop