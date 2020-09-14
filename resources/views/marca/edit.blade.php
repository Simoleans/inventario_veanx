@extends('layouts.app')
@section('titulo','Marca - '.config('app.name'))
@section('header','Marca')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Editar Marca</li>
</ol>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Editar Marca</h3>
      </div>
      <div class="card-body">
          <form action="{{ route('marca.update',$dato->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="input-group mb-3 col-md-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                  </div>
                  <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Nombre" value="{{ $dato->name }}">
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
            <button type="submit" class="btn btn-info">Editar</button>
            <a href="{{ route('marca.index') }}" class="btn btn-link float-right">volver</a>
          </div>
        </form>
      </div>
    </div>
  </div> <!-- col-md -->
</div>
<!-- /row -->
@endsection