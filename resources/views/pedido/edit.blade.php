@extends ('welcome')
@section('contenido')
<script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
<style>
    .circulo {
     width: 5px;
     height: 5px;
     -moz-border-radius: 50%;
     -webkit-border-radius: 50%;
     border-radius: 50%;
     background: red;
     color: white;
     padding: 9%;
}
</style>
<div class="x_panel">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-horizontal form-label-left">

            <div class="x_title">
                <h2>Productos<small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <div class="col-md-6 col-sm-6 col-xs-12" align="right">
                        <a href="{{ route('listado_producto',$pedido->Id) }}"><button class="btn btn-info float-right"> <i class="fa fa-shopping-cart"></i></button><sup class="circulo"><strong>{{$conteo}}</strong></sup></a>
                    </div>
                </ul>
                <div class="clearfix"></div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="x_content">
                <h4>{{ $pedido->clientes->Nombre }}</h4>
                <br />
                @foreach ($productos as $producto)
                <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 widget_tally_box">

                    <div class="x_panel fixed_height_150">
                        <div class="x_content">

                            <h5>{{ $producto->Nombre }}</h5>

                            <input type="hidden" value="{{$producto->Id}}" name="Producto">
                            <i class="btn btn-primary fa fa-plus" onclick="modal_agregar_producto(<?php echo $producto->Id; ?>,'<?php echo $producto->Nombre; ?>')"> Agregar</i>

                        </div>
                    </div>

                </div>
                @endforeach

            </div>
        </div>
        <div class="modal fade" id="modal_agregar_producto" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-tipo="1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {!!Form::model($pedido,['method'=>'PATCH','route'=>['pedido.update',$pedido->Id]])!!}
                    <div class="modal-header">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar <label id="Nombre"></label></h5>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" id="IdProducto" name="IdProducto">


                    <div class="modal-body">
                        <div class="box-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Cantidad</label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table style="width: 50%;">
                                            <tr>
                                                <td><i class="btn btn-success fa fa-plus" id='aumentar' onclick="aumentar()"></i></td>
                                                <td><input type='number' id="Cantidad" name="Cantidad" class="form-control" value="1" style="width: 90%;"></td>
                                                <td> <i class="btn btn-success fa fa-minus" id='disminuir' onclick="disminuir()"></i></td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                                <br>
                                <br>
                                &nbsp;
                                <div class="clearfix"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                </div>

                                {{ Form::token() }}

                            </div>
                        </div>

                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('gentella/vendors/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>


        <script type="text/javascript">
            function modal_agregar_producto(id, nombre) {
                document.getElementById('IdProducto').value = id,
                    //  document.getElementById('Nombre').value = nombre,
                    $('#Nombre').html(nombre);
                $('#Cantidad').val(1);

                $('#modal_agregar_producto').modal('show');
            }

            var inicio = 0; //se inicializa una variable en 0

            function aumentar() { // se crean la funcion y se agrega al evento onclick en en la etiqueta button con id aumentar

                var cantidad = document.getElementById('Cantidad').value = ++inicio; //se obtiene el valor del input, y se incrementa en 1 el valor que tenga.
            }

            function disminuir() { // se crean la funcion y se agrega al evento onclick en en la etiqueta button con id disminuir

                var cantidad = document.getElementById('Cantidad').value = --inicio; //se obtiene el valor del input, y se decrementa en 1 el valor que tenga.
            }
        </script>
        @endsection