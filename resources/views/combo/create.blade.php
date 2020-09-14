@extends('layouts.app')
@section('titulo','Packs - '.config('app.name'))
@section('header','Packs')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Crear Packs</li>
</ol>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Registrar Pack</h3>
      </div>
      <div class="card-body">
          <form action="{{ route('pack.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="input-group mb-3 col-md-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                  </div>
                  <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Nombre" value="{{ old('name') }}">
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
            <a href="{{ route('pack.index') }}" class="btn btn-link float-right">volver</a>
          </div>
        </form>
      </div>
    </div>
  </div> <!-- col-md -->
</div>
<!-- /row -->
@endsection