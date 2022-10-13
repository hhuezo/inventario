@extends ('welcome')
@section('contenido')
    <div class="x_panel">

        <script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
        <div class="x_title">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <h3>Listado de escritorios</h3>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12" align="right">
                <a href="{{ url('escritorio/create') }}"><button class="btn btn-info float-right"> <i class="fa fa-plus"></i>
                    Nuevo</button></a>
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


        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Escritorio</th>
                            <th>Cola</th>
                            <th>Unidad laboral</th>
                            <th>Lugar origen</th>
                            <th>Activo</th>
                            <th>Usuario</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $obj)
                            <tr>
                                <td align="center">{{ $obj->ESC_ID_LINEA }}</td>
                                <td>{{ $obj->ESC_ESCRITORIO }}</td>
                                <td>{{ $obj->ESC_COLA }}</td>

                                @if ($obj->ESC_ULB_CODIGO)
                                <td>{{$obj->unidad_laboral->ULB_DESCRIPCION}}</td>
                                @else
                                <td></td>
                                @endif

                                @if ($obj->ESC_LOR_CODIGO)
                                <td>{{$obj->lugar_origen->LOR_DESCRIPCION}}</td>
                                @else
                                <td></td>
                                @endif
                                <td>
                                @if ($obj->ESC_ACTIVO == 1)
                                    <input type="checkbox" checked>
                                @else
                                <input type="checkbox">
                                @endif
                                </td>
                                <td>{{ $obj->ESC_USUARIO }}</td>

                                <td align="center">

                                        class="on-default edit-row"><i class="fa fa-pencil"></i></a>


                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('sweet::alert')
        </div>
    </div>





@endsection
