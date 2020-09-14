@extends('layouts.app')
@section('titulo','Inventario - '.config('app.name'))
@section('header','Inventario')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Inventario</li>
</ol>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Inventario General</h3>
      </div>
      <div class="card-body">
          <table class="table table-condensed data-table">
            <thead>
              <tr>
                <th class="text-center">Producto</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Último Movimiento</th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $m)
                  <tr>
                    <td class="text-center">{{ $m->producto->nombre }}</td>
                    <td class="text-center" style="background-color: {!! $m->colorInventario() !!} ;">{{ $m->cantidad }}</td>
                    <td class="text-center">{{ $m->updated_at->diffForHumans() }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
<!-- /row -->

@endsection