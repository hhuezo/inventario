@extends ('welcome')
@section('contenido')
    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
    <div class="x_panel">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-horizontal form-label-left">

                <div class="x_title">
                    <h2>Escritorio <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">

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
                    <br />
                    @foreach ($clientes as $cliente)
                        <div class="col-md-3   widget widget_tally_box">

                            <div class="x_panel fixed_height_300">
                                <div class="x_content">
                                    <div class="flex">
                                        <ul class="list-inline widget_profile_box">
                                            <li>
                                                <a>
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <img src="{{ asset('img/usuario.jpg') }}" alt="..."
                                                    class="img-circle profile_img">
                                            </li>
                                            <li>
                                                <a>
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="name">{{ $cliente->Nombre }}</h3>

                                    <h3>Telefono: {{ $cliente->Telefono }}</h3>
                                    <a href="{{ url('pedido') }}/{{ $cliente->Id }}/edit">
                                        <button class="btn btn-primary float-right">Seleccionar</button>
                                    </a>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <script src="{{ asset('gentella/vendors/jquery/dist/jquery.min.js') }}"></script>
    @endsection
