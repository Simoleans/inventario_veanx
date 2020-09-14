@extends('layouts.app')
@section('titulo','Producto - '.config('app.name'))
@section('header','Producto')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Crear Producto</li>
</ol>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Registrar Producto</h3>
      </div>
      <div class="card-body">
          <form action="{{ route('producto.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="input-group mb-3 col-md-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
                  </div>
                  <input type="text" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
                </div>
                
                <div class="input-group mb-3 col-md-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                  </div>
                  <textarea class="form-contro{{ $errors->has('descripcion') ? ' is-invalid' : '' }}l" placeholder="Descripción">{{ old('descripcion') }}</textarea>
                </div>
                
                <div class="input-group mb-3 col-md-4">
                  
                 <select name="tipo_id" class="form-control">
                   <option value="">Tipo...</option>
                   @foreach(tipo() as $t)
                      <option value="{{ $t->id }}">{{ $t->name }}</option>
                   @endforeach
                 </select>
                </div>
               
                <div class="input-group mb-3 col-md-4">
                 <select  name="marca_id" class="form-control">
                   <option value="">Marca...</option>
                   @foreach(marca() as $m)
                      <option value="{{ $m->id }}">{{ $m->name }}</option>
                   @endforeach
                 </select>
                </div>

                <div class="input-group mb-3 col-md-4">
                 <select  name="marca_id" class="form-control">
                   <option value="">Pack...</option>
                   @foreach(pack_producto() as $m)
                      <option value="{{ $m->id }}">{{ $m->name }}</option>
                   @endforeach
                 </select>
                </div>

                <div class="input-group mb-3 col-md-4">
                 <select  name="atributo_id" class="form-control">
                   <option value="">Atributo...</option>
                   @foreach(atributo() as $a)
                      <option value="{{ $a->id }}">{{ $a->name }}</option>
                   @endforeach
                 </select>
                </div>

                <div class="input-group mb-3 col-md-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                  </div>
                  <input type="text" class="form-control" name="atributo_1" placeholder="Atributo 2">
                </div>

                <div class="input-group mb-3 col-md-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                  </div>
                  <input type="text" class="form-control" name="atributo_2" placeholder="Atributo 3">
                </div>
                <div class="input-group mb-3 col-md-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" name="valor_venta" placeholder="Valor Venta">
                </div>

                <div class="input-group mb-3 col-md-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" name="valor_venta_1" placeholder="Valor Venta 2">
                </div>

                 <div class="input-group mb-3 col-md-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" name="valor_venta_2" placeholder="Valor Venta 3">
                </div>
                <div class="input-group mb-3 col-md-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Unidad</span>
                  </div>
                  <input type="text" class="form-control" name="unidad" placeholder="Unidad">
                </div>
                <div class="input-group mb-3 col-md-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text">C/Unidad</span>
                  </div>
                  <input type="text" class="form-control" name="c_unidad" placeholder="C/Unidad">
                </div>
              </div> <!-- fin row -->

              </div>
          </div> <!-- /.card-body -->
          @if(count($errors) > 0)
                <div class="form-group">
                  <div class="text-danger">
                    <ul class="m-0">
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              @endif
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Registrar</button>
            <a href="{{ route('producto.index') }}" class="btn btn-link float-right">volver</a>
          </div>
        </form>
      </div>
    </div>
  </div> <!-- col-md -->
</div>
<!-- /row -->
@endsection