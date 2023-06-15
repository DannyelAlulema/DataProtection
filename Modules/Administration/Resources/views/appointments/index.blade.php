@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Empresa</th>
                                    <th>Fecha</th>
                                    <th>Hora de Inicio</th>
                                    <th>Hora de Finalización</th>
                                    <th>Estado</th>
                                    <th>...</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->userEnterprise->user->name }}</td>
                                        <td>{{ $appointment->userEnterprise->enterprise->bussines_name }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->start_at }}</td>
                                        <td>{{ $appointment->end_at }}</td>
                                        <td>{{ $appointment->state->alias }}</td>

                                        <td>
                                            {{--<div class="d-flex justify-content-around">
                                                <button class="btn btn-secondary btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>--}}
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $('#dataTable').dataTable();
    </script>
@stop
