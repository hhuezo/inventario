@extends ('welcome')
@section('contenido')
    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
    <div class="x_panel">
    <div class="clearfix"></div>

    <center>
        <h2>Pedidos </h2>
    </center>
    <script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>
    <div class="x_title">
    

        <ul class="nav navbar-right panel_toolbox">

        </ul>
        <div class="clearfix"></div>
    </div>


    <br />
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Fecha Despacho</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $obj)
                    <tr>
                        <td>{{ $obj->clientes->Nombre}}</td>
                        <td>{{ date('d/m/Y', strtotime($obj->FechaDespacho)) }}</td>
                        <td align="center">
                            <a href="{{ url('pedido') }}/{{ $obj->Id }}/edit" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                            &nbsp;&nbsp;
                            <a href="" data-target="#modal-delete-{{$obj->Id}}" data-toggle="modal"><i class="fa fa-trash"></i></a>
                           
                        </td>
                    </tr>
                    @include('pedido.modal')
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix"></div>
        </div>

        @include('sweet::alert')

    </div>
</div>
    @endsection
