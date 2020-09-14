@extends('layouts.app')
@section('titulo','Productos - '.config('app.name'))
@section('header','Productos')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Productos</li>
</ol>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
         <span class="float-right">
            <a class="btn btn-danger btn-sm" href="{{ route('producto.create') }}" title="Registrar Tipo"><i class="fas fa-plus-square"></i></a>
          </span>
        <h3 class="card-title">Lista de Productos</h3>
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
                <th class="text-center">Ingreso</th>
                <th class="text-center">Salida</th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $p)
                  <tr>
                    <td class="text-center">
                      <a href="{{ route('producto.edit',['producto' => encrypt($p->id)]) }}">{{ $p->nombre }}</a>
                    </td>
                    <td class="text-center">{{ $p->descripcion }}</td>
                    <td class="text-center" style="background-color: {!! $p->colorInventario() !!} ;">{{ $p->inventario->cantidad }}</td>
                    <td class="text-center">{{ $p->unidad }}</td>
                    <td class="text-center">{{ $p->c_unidad }}</td>
                    <td class="text-center">{{ $p->atributo->name }}</td>
                    <td class="text-center">
                      <a href="{{ route('movimiento.ingreso_producto',$p->id) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Ingreso de inventario">
                        <i class="fas fa-arrow-circle-down"></i>
                      </a>
                    </td>
                    <td class="text-center">
                      <a href="{{ route('movimiento.egreso_producto',$p->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Salida de inventario">
                        <i class="fas fa-arrow-circle-up"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
<!-- /row -->
@endsection