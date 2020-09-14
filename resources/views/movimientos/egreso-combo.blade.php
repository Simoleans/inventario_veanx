@extends('layouts.app')
@section('titulo','Combos - '.config('app.name'))
@section('header','Salida en Inventario a '.$combo->name)

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Salida Inventario</li>
</ol>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">Hacer Salida</h3>
      </div>
      <div class="card-body">
          <form action="{{ route('store.egreso.combo') }}" method="POST">
              @csrf
              @foreach($combo->productos as $p)
                <input type="hidden" name="producto_id[]" value="{{ $p->producto_id }}">
              @endforeach
              <input type="hidden" name="tipo" value="0">
              <input type="hidden" name="combo_id" value="{{ $combo->id }}">
              <div class="row">
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
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
         <span class="float-right">
           
          </span>
        <h3 class="card-title">Productos de {{ $combo->name }}</h3>
      </div>
      <div class="card-body">
          <table class="table table-condensed data-table">
            <thead>
              <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Cantidad Disponible</th>
                <th class="text-center">Unidad</th>
                <th class="text-center">C/Unidad</th>
                <th class="text-center">Atributo</th>
                
              </tr>
            </thead>
            <tbody id="content-producto">
                @foreach($combo->productos as $p)
                  <tr>
                    <td class="text-center">
                      <a href="{{ route('producto.edit',['producto' => encrypt($p->producto->id)]) }}">{{ $p->producto->nombre }}</a>
                    </td>
                    <td class="text-center">{{ $p->producto->descripcion }}</td>
                    <td class="text-center" style="background-color: {!! $p->producto->colorInventario() !!} ;">{{ $p->producto->inventario->cantidad }}</td>
                    <td class="text-center">{{ $p->producto->unidad }}</td>
                    <td class="text-center">{{ $p->producto->c_unidad }}</td>
                    <td class="text-center">{{ $p->producto->atributo->name }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
<!-- /row -->

@endsection