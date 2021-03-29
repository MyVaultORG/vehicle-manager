@extends('adminlte::page')



@section('title', "Bem-vindo - {$user->name} " )

@section('content_header')
<h1>Todas os agendamentos de manutenções</h1>
@stop

@section('content')

<p class="text-muted">Acompanhe as manutenções de seus veículos</p>

<div id="message">
    @include('flash::message')
</div>




<table class="table align-middle" style="margin-top: 15px;">    
    <thead>
        <tr>                
            <th scope="col">Data da manutenção</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Placa</th>            
        </tr>
    </thead>    
    @forelse ($maintenances as $maintenance) 
    @if ($maintenance->vehicle->user_id == auth()->user()->id)
    <tbody>
        <tr>                
            <td>{{ date("d/m/Y", strtotime($maintenance->date)) }}</td>
            <td>{{ $maintenance->vehicle->brand }}</td>
            <td>{{ $maintenance->vehicle->model }}</td>
            <td>{{ $maintenance->vehicle->board }}</td>
            <td class="d-flex">
                <a href="{{ Route('user.maintenance.edit', $maintenance->id)}}">
                    <i id="edit" class="fas fa-edit mx-3" 
                    style="color: rgb(14, 137, 252); margin-top: 6px;"></i>
                </a>
                
                <form id="form-ajax-remove" action="{{ Route('user.maintenance.destroy', $maintenance->id) }}" method="post">
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
@endif   
@empty
<div class="message alert">
    Não existem agendamentos.
</div>    
@endforelse 

</table>

{{ $maintenances->links() }}



@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">


@stop

@section('js')
<script src="{{ asset('site/js/ajaxLoad.js') }}"></script>
<script src="{{ asset('site/js/insertMessage.js') }}"></script>
<script src="{{ asset('site/js/formAjax.js') }}"></script>  
@stop