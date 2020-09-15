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
                <th class="text-center">Eliminar</th>
              </tr>
            </thead>
            <tbody id="content-producto">
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
                      <a href="{{ route('movimiento.egreso_producto',$p->id) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Salida de inventario">
                        <i class="fas fa-arrow-circle-up"></i>
                      </a>
                    </td>
                    <td class="text-center">
                      <button type="button" class="btn btn-danger btnDelete" data-url="{{ route('producto.destroy',$p->id) }}" data-id="{{ $p->id }}" data-nombre="{{ $p->nombre }}" data-toggle="modal" data-target="#exampleModalCenter">
                          <i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Eliminar"></i>
                      </button>
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-delete"  method="POST">
          @csrf
          @method('DELETE')
        ¿Desea Eliminar a <strong class="text-danger" id="name-producto"></strong>?<br>
        Se eliminaran todos los movimientos de esté producto.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-danger">Si</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
  $("#content-producto").on('click', '.btnDelete', function(event) {
    event.preventDefault();
    let nombre = $(this).data('nombre');
    let id = $(this).data('id');
    let url = $(this).data('url');

    $("#form-delete").attr('action',url);
    $("#name-producto").text(nombre);
  });
</script>
@endsection