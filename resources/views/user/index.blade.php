@extends('layouts.app')
@section('titulo','Usuarios - '.config('app.name'))
@section('header','Usuarios')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Ver Usuarios</li>
</ol>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Lista de Usuario</h3>
      </div>
      <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Estatus</th>
              </tr>
            </thead>
            <tbody>
              <tbody>
                @foreach($users as $u)
                  <tr>
                    <td><a href="#">{{ $u->name }}</a></td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->status }}</td>
                  </tr>
                @endforeach
              </tbody>
            </tbody>
          </table>
      </div>
    </div>
  </div>
<!-- /row -->
@endsection