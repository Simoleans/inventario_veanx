@extends('layouts.app')
@section('titulo','Usuario - '.config('app.name'))
@section('header','Usuario')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Crear Usuario</li>
</ol>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Registrar Usuario</h3>
      </div>
      <div class="card-body">
          <form action="{{ route('user.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="input-group mb-3 col-md-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Nombre" value="{{ old('name') }}">
                </div>
                
                <div class="input-group mb-3 col-md-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required="">
                </div>
                
                <div class="input-group mb-3 col-md-6">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-unlock-alt"></i></span>
                  </div>
                  <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required="">
                </div>
               
                <div class="input-group mb-3 col-md-6">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-unlock-alt"></i></span>
                  </div>
                  <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="Repetir Contraseña" required="">
                </div>
              </div>
          </div> <!-- /.card-body -->
          @if(count($errors) > 0)
                <div class="form-group">
                  <div class="text-danger">
                    <ul class="m-0">
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              @endif
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Registrar</button>
            <a href="{{ route('user.index') }}" class="btn btn-link float-right">volver</a>
          </div>
        </form>
      </div>
    </div>
  </div> <!-- col-md -->
</div>
<!-- /row -->
@endsection