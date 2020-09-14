
<style type="text/css">
    table{width:100%;border-collapse:collapse;margin:0 0 .3em 0;caption-side:top}caption,td,th{padding:.3em}thead{border-bottom:dotted #000;border-top-style:dotted}td,th{width:auto;max-width:7.1%;border-width:1px}caption{font-weight:700;font-style:italic}.text-center{text-align:center!important}
</style>
<div class="row">
    <div class="col-lg-12">
        <h1 class="padding_05em bg-info"><i class="fa fa-arrow-right"></i> Reporte Del Inventario</h1>
        <span class="pull-right">
            <strong>{{ date('d/m/Y') }}</strong>
        </span>
        <br>
    </div>
    <div class="col-lg-12">
        <table class="table table-bordered table-striped">
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
