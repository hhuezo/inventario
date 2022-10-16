@extends ('welcome')
@section('contenido')
    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
    <div class="x_panel">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-horizontal form-label-left">

                <div class="x_title">
                    <h2>Clientes <small></small></h2>
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
                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 widget_tally_box">

                            <div class="x_panel fixed_height_150" >
                                <div class="x_content">
                                  
                                    {!!Form::open(array('url'=>'pedido','method'=>'POST','autocomplete'=>'off'))!!}
                                    {{Form::token()}}
                                    <h4>{{ $cliente->Nombre }}</h4>

                                    <h4>Telefono: {{ $cliente->Telefono }}</h4>
                                        <input type="hidden" value="{{$cliente->Id}}" name="Cliente">
                                        <button class="btn btn-primary" type="submit">Seleccionar</button>
                               

                                    {!!Form::close()!!}
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <script src="{{ asset('gentella/vendors/jquery/dist/jquery.min.js') }}"></script>
    @endsection