@extends('layouts.app')
@section('titulo','Marcas - '.config('app.name'))
@section('header','Marcas')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Marcas</li>
</ol>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
         <span class="float-right">
            <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#crear">
              <i class="fas fa-plus-square" data-toggle="tooltip" data-placement="top" title="Registrar Marca"></i>
            </button>
          </span>
        <h3 class="card-title">Lista de Marcas</h3>
      </div>
      <div class="card-body">
          <table class="table table-condensed data-table">
            <thead>
              <tr>
                <th class="text-center">Nombre</th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $u)
                  <tr>
                    <td class="text-center">
                      <a href="{{ route('marca.edit',$u->id) }}">{{ $u->name }}</a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
<!-- /row -->

<!-- Modal -->
<div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content card-danger">
      <div class="modal-header" style="background-color: #17a2b8 ">
        <h5 class="modal-title" id="exampleModalLabel">Crear Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('marca.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="input-group mb-3 col-md-12">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
              </div>
              <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required name="name" placeholder="Nombre" value="{{ old('name') }}">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection