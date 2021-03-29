@extends('adminlte::auth.login')

@section('css')
<link rel="stylesheet" href="{{asset('site/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('site/js/ajaxLoad.js') }}"></script>
<script src="{{ asset('site/js/insertMessage.js') }}"></script>
<script src="{{ asset('site/js/formAjax.js') }}"></script>    
@endsection