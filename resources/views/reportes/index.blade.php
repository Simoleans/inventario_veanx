@extends('layouts.app')
@section('titulo','Reporte - '.config('app.name'))
@section('header','Reporte')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Crear Reporte</li>
</ol>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Busquedas Avanzadas (Inventario)</h3>
      </div>
      <div class="card-body">
          <form action="{{ route('reporte.inventario') }}" method="POST" target="_blank">
              @csrf
              <div class="row">
                <div class="input-group mb-3 col-md-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                  </div>
                  <input type="number" class="form-control" name="cantidad" placeholder="Cantidad MENOR en inventario">
                </div>
              </div>
          </div> <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-danger float-right"><i class="fas fa-file-pdf"></i> Imprimir</button>
          </div>
        </form>
      </div>
    </div>
  </div> <!-- col-md -->
</div>
<!-- /row -->

<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Busquedas Avanzadas (Movimiento)</h3>
      </div>
      <div class="card-body">
          <form action="{{ route('pack.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="input-group mb-3 col-md-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Desde</span>
                  </div>
                  <input type="date" class="form-control" name="desde">
                </div>
                <div class="input-group mb-3 col-md-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Hasta</span>
                  </div>
                  <input type="date" class="form-control" name="hasta">
                </div>
              </div>
          </div> <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-danger float-right"><i class="fas fa-file-pdf"></i> Imprimir</button>
          </div>
        </form>
      </div>
    </div>
  </div> <!-- col-md -->
</div>
<!-- /row -->
@endsection