@extends('layouts.app')
@section('titulo','Movimientos - '.config('app.name'))
@section('header','Movimientos')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Movimientos</li>
</ol>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Lista de Movimientos</h3>
      </div>
      <div class="card-body">
          <table class="table table-condensed data-table">
            <thead>
              <tr>
                <th class="text-center">Usuario</th>
                <th class="text-center">Descripcion</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Fecha</th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $m)
                  <tr class="{{ $m->tipo == 1 ? 'text-success' : 'text-danger' }}">
                    <td class="text-center">{{ $m->user->email }}</td>
                    <td class="text-center">{{ $m->descripcion }}</td>
                    <td class="text-center">{{ $m->precio }}</td>
                    <td class="text-center">{{ $m->cantidad }}</td>
                    <td class="text-center">{{ $m->created_at->diffForHumans() }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
<!-- /row -->

@endsection