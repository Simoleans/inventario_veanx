@extends('layouts.app')
@section('titulo','Productos - '.config('app.name'))
@section('header','Ingreso en Inventario a '.strtoupper($producto->nombre))

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Ingreso Inventario</li>
</ol>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Hacer Ingreso</h3>
      </div>
      <div class="card-body">
          <form action="{{ route('store.ingreso.producto') }}" method="POST">
              @csrf
              
              <input type="hidden" name="tipo" value="1">
              <input type="hidden" name="producto_id" value="{{ $producto->id }}">
              <div class="row">

                <div class="input-group mb-3 col-md-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Producto</span>
                  </div>
                  <input type="text" class="form-control" required="" name="producto" disabled="" placeholder="Producto" value="{{ strtoupper($producto->nombre) }}">
                </div>

                <div class="input-group mb-3 col-md-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" required="" name="proveedor" placeholder="Proveedor">
                </div>

                 <div class="input-group mb-3 col-md-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
                  </div>
                  <input type="number" class="form-control" required="" name="precio" placeholder="Precio">
                </div>

                <div class="input-group mb-3 col-md-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-arrow-circle-down"></i></span>
                  </div>
                  <input type="number" class="form-control" required="" name="cantidad" placeholder="Cantidad">
                </div>

                <div class="input-group mb-3 col-md-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <textarea class="form-control" name="descripcion"></textarea>
                </div>
              </div>
          </div> <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info float-right">Registrar</button>
            <a href="{{ route('producto.index') }}" class="btn btn-link float-left">volver</a>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection