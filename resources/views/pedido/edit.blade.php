@extends ('welcome')
@section('contenido')
<div class="x_panel">

    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
    <div class="x_title">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <h3>Detalle de Pedido</h3>
        </div>
        <div class="clearfix"></div>
    </div>


    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {!!Form::model($pedido,['method'=>'PATCH','route'=>['pedido.update',$pedido->Id]])!!}
    {{Form::token()}}
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label class="col-sm-3 control-label">Cliente</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="Cliente" name="Cliente" class="form-control" value="{{$pedido->clientes->Nombre}}" disabled>

                </div>
                <label class="col-sm-3 control-label">&nbsp;</label>
            </div>
            <br>
            <br>
            <div class="form-group">
                <label class="col-sm-3 control-label">Fecha Despacho</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="date" name="FechaDespacho" id="FechaDespacho" class="form-control" autofocus="true" value="{{$pedido->FechaDespacho}}" disabled>
                </div>
                <label class="col-sm-3 control-label">&nbsp;</label>
            </div>
            <br>
            <br>
            <br>
        </div>
        <div class="x_title">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <h4>Listado de productos</h4>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Productos</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select name="Producto" id="Producto" class="form-control" select2 required>
                    @foreach($productos as $obj)
                    <option value="{{$obj->Id}}">{{$obj->Nombre}}</option>
                    @endforeach
                </select>
            </div>
            <label class="col-sm-3 control-label">&nbsp;</label>
        </div>
        <br>
        <br>
        <div class="form-group">
            <label class="col-sm-3 control-label">Cantidad</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="number" name="Cantidad" id="Cantidad" class="form-control" autofocus="true" min="1">
            </div>
            <label class="col-sm-3 control-label">&nbsp;</label>
        </div>
        <br>
        <br>
        <div class="form-group" align="center">
            <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Agregar </button>
        </div>
    </div>
    @include('sweet::alert')

    {!!Form::close()!!}
    @if($detalle->count() > 0)
    <div class="row">
        <div class="x_title">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <h4>Listado de productos agregados</h4>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table id="datatable" class="table table-striped table-bordered">
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
                            <a href=""><i class="fa fa-pencil"></i></a> &nbsp;
                            <i class="fa fa-trash fa-lg" onclick="modal_eliminar_producto(<?php echo $obj->Id; ?>)"></i>


                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="modal fade" id="modal_eliminar_producto" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true" data-tipo="1">
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
                        <input type="text" id="IdProducto" name="Id">
                        <input type="text" name="Pedido" value="{{$pedido->Id}}">

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
    @endif

</div>

<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>


<script type="text/javascript">
    function modal_eliminar_producto(id) {
        document.getElementById('IdProducto').value = id;

        $('#modal_eliminar_producto').modal('show');
    }

</script>








@endsection