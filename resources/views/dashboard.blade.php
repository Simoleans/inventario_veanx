@extends('layouts.app')
@section('titulo','Inicio - '.config('app.name'))
@section('header','Inicio')

@section('content')

<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>150</h3>
        <p>Usuarios</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="#" class="small-box-footer">Ver Usuarios <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>65</h3>
        <p>Unique Visitors</p>
      </div>
      <div class="icon">
        <i class="fa fa-bookmark"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>




@endsection