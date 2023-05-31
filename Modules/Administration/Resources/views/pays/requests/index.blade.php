@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pagos realizados via transferencia</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Empresa</th>
                                    <th>Voucher</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 100; $i++)
                                    <tr>
                                        <td>Usuario {{ $i + 1 }}</td>
                                        <td>EMPRESA CONSULTORA, PRUEBA CIA. LTDA.</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('get.voucher') }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-download mx-1"></i>
                                                    Descargar
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                <button class="btn btn-success btn-sm"><i class="fas fa-thumbs-up mx-1"></i>Aprovar</button>
                                                <button class="btn btn-danger btn-sm"><i class="fas fa-thumbs-down mx-1"></i>Denegar</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $('#dataTable').dataTable();
    </script>
@stop
