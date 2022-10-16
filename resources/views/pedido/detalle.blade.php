@extends ('welcome')
@section('contenido')
<script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
<div class="x_panel">
    <div class="clearfix"></div>


    <div class="x_title">
        <center>
            <h2>Listado de Productos </h2>
        </center>

        <ul class="nav navbar-right panel_toolbox">
            <a href="{{ url('pedido') }}/{{ $pedido->Id }}/edit" class="btn btn-warning"><i class="fa fa-arrow-left"></i> </a>
        </ul>
        <div class="clearfix"></div>
    </div>


    <br />
    <div class="row">
        <div class="x_title">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <h4>Listado de productos agregados</h4>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalle as $obj)
                    <tr>
                        @if($obj->Producto)
                        <td align="center">{{ $obj->productos->Nombre }}</td>
                        @else
                        <td align="center"></td>
                        @endif
                        <td>{{ $obj->Cantidad }}</td>
                        <td align="center" class="on-default edit-row">

                            <i class="fa fa-trash fa-lg" onclick="modal_eliminar_producto(<?php echo $obj->Id; ?>)"></i>


                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

        <center>
            <button class="btn btn-success"><i class="fa fa-archive"></i> Reservar</button>
        </center>

    </div>
    <div class="modal fade" id="modal_eliminar_producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-tipo="1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ url('eliminar_producto') }}" method="POST">
                    <div class="modal-header">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" id="IdProducto" name="Id">
                    <input type="hidden" name="Pedido" value="{{$pedido->Id}}">

                    <div class="modal-body">
                        <div class="box-body">
                            Desea eliminar el registro?
                        </div>

                        <div class="clearfix"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>

                        {{ Form::token() }}

                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>


<script type="text/javascript">
    function modal_eliminar_producto(id) {
        document.getElementById('IdProducto').value = id;

        $('#modal_eliminar_producto').modal('show');
    }
</script>
@endsection