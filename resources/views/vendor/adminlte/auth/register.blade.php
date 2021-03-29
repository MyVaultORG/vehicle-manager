@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
@php( $login_url = $login_url ? route($login_url) : '' )
@php( $register_url = $register_url ? route($register_url) : '' )
@else
@php( $login_url = $login_url ? url($login_url) : '' )
@php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('auth_body')
<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <div class="ajax_load_box_title">Aguarde, carregando...</div>
    </div>
</div>

<form id="form-ajax" action="{{ Route('auth.register') }}" method="post">
    {{ csrf_field() }}
    
    <div id="message">
        @include('flash::message')
    </div>
    
    {{-- Name field --}}
    <div class="input-group mb-3">
        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
        value="{{ old('name') }}" placeholder="Nome:" autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
            </div>
        </div>
        @if($errors->has('name'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </div>
        @endif
    </div>
    
    {{-- Email field --}}
    <div class="input-group mb-3">
        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
        value="{{ old('email') }}" placeholder="Email:">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
            </div>
        </div>
        @if($errors->has('email'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </div>
        @endif
    </div>
    
    {{-- Password field --}}
    <div class="input-group mb-3">
        <input type="password" name="password"
        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
        placeholder="Senha:">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
            </div>
        </div>
        @if($errors->has('password'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </div>
        @endif
    </div>
    
    {{-- Confirm password field --}}
    <div class="input-group mb-3">
        <input type="password" name="password_confirmation"
        class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
        placeholder="Confirme a senha:">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
            </div>
        </div>
        @if($errors->has('password_confirmation'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </div>
        @endif
    </div>
    
    {{-- Register button --}}
    <button type="submit" class="btn btn-block btn-success">
        <span class="fas fa-user-plus"></span>
        Cadastrar
    </button>
    
    <div class="row" style="margin-top: 15px">
        <div class="col-12">
            <p>Já tem uma conta? <a href="{{ Route('web.login') }}">Entrar</a></p>
        </div>
    </div>
    
</form>
@stop

@section('scripts')
<script src="{{ asset('site/js/ajaxLoad.js') }}"></script>
<script src="{{ asset('site/js/insertMessage.js') }}"></script>
<script src="{{ asset('site/js/formAjax.js') }}"></script>    
@endsection
