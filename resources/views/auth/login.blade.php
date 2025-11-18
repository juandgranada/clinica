@extends('adminlte::auth.login')

@section('auth_body')

<form action="{{ url('/login') }}" method="POST">
    @csrf

    @if($errors->has('loginError'))
        <div class="alert alert-danger text-center">
            {{ $errors->first('loginError') }}
        </div>
    @endif

    <div class="input-group mb-3">
        <input type="text" name="username" class="form-control" placeholder="Correo electrónico" required>
        <div class="input-group-text">
            <span class="fas fa-user"></span>
        </div>
    </div>

    <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>

    <button class="btn btn-primary btn-block">Ingresar</button>
</form>

@endsection
