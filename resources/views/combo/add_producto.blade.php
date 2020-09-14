@extends('layouts.app')
@section('titulo','Combos - '.config('app.name'))
@section('header','Agregar productos a '.$combo->name)

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Agregar Productos</li>
</ol>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
         <span class="float-right">
           <form method="POST" action="{{ route('combo.store_productos') }}">
                @csrf
                <div id="content-form">
                    
                </div>
            
                <input type="hidden" name="combo_id" value="{{ $combo->id }}">
                <h4 class="mt-0 header-title">
                    <span class="float-right"><button type="submit" class="btn btn-danger"><i class="fa fa-plus"></i> Insertar Producto(s)</button></span>
                </h4>
            </form>
            {{-- <a class="btn btn-danger btn-sm" href="{{ route('producto.create') }}" title="Registrar Tipo"><i class="fas fa-plus-square"></i></a> --}}
          </span>
        <h3 class="card-title">Productos Disponibles</h3>
      </div>
      <div class="card-body">
          <table class="table table-condensed data-table">
            <thead>
              <tr>
                <th class="text-center"></th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Cantidad Disponible</th>
                <th class="text-center">Unidad</th>
                <th class="text-center">C/Unidad</th>
                <th class="text-center">Atributo</th>
                
              </tr>
            </thead>
            <tbody id="content-producto">
                @foreach($productos as $p)
                  <tr>
                    <td class="text-center">
                        <div class="form-check">
                          {!! $p->optionTableCombo($combo->id) !!}
                        </div>
                    </td> 
                    <td class="text-center">
                      <a href="{{ route('producto.edit',['producto' => encrypt($p->id)]) }}">{{ $p->nombre }}</a>
                    </td>
                    <td class="text-center">{{ $p->descripcion }}</td>
                    <td class="text-center" style="background-color: {!! $p->colorInventario() !!} ;">{{ $p->inventario->cantidad }}</td>
                    <td class="text-center">{{ $p->unidad }}</td>
                    <td class="text-center">{{ $p->c_unidad }}</td>
                    <td class="text-center">{{ $p->atributo->name }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
<!-- /row -->

<!-- Modal -->
<div class="modal fade" id="delete_producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content card-danger">
      <div class="modal-header" style="background-color: #17a2b8 ">
        <h5 class="modal-title" id="exampleModalLabel">Combo - {{ $combo->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('combo.delete_productos') }}" method="POST">
          @csrf
          @method('DELETE')
          <input type="hidden" name="producto_id" id="producto-eliminar">
          <input type="hidden" name="combo_id" id="combo-eliminar">
          <div class="row">
            <div class="input-group mb-3 col-md-12">
              <strong>¿Desea eliminar <span id="producto_nombre" class="text-danger"></span> de este combo?</strong>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-success">Si</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  $('input[type="checkbox"]').click(function(){
        if($(this).prop("checked") == true){
            var html = '<input type="hidden" name="producto_id[]" value="'+$(this).val()+'" id="producto-'+$(this).val()+'">'
            $("#content-form").append(html)

        }
        else if($(this).prop("checked") == false){
            $('#user-'+$(this).val()).remove();
        }
    });

  $("#content-producto").on('click', '.deleteProductCombo', function(event) {
      event.preventDefault();
      let producto = $(this).data('producto');
      let nombre = $(this).data('nombre');
      let combo = $(this).data('combo');

      $("#producto-eliminar").val(producto);
      $("#combo-eliminar").val(combo);
      $("#producto_nombre").text(nombre);

      $("#delete_producto").modal('show');


  });
</script>
@endsection