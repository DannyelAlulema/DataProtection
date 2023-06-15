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
                    @if (session('message') && session('type') == 'success')
                        <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                            <p>{{ session('message') }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @php session()->forget([ 'message', 'type' ]); @endphp
                    @endif
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
                                    <th>Tel. Usuario</th>
                                    <th>Tel. Empresa</th>
                                    <th>Voucher</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payRequests as $payRequest)
                                    <tr>
                                        <td>{{ $payRequest['user_enterprise']['user']['name'] }}</td>
                                        <td>{{ $payRequest['user_enterprise']['enterprise']['bussines_name'] }}</td>
                                        <td>{{ $payRequest['user_enterprise']['user']['phone_number'] }}</td>
                                        <td>{{ $payRequest['user_enterprise']['enterprise']['phone_number'] }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <form action="{{ route('get.voucher') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="voucher_path"
                                                        value="{{ $payRequest['voucher_path'] }}">
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <i class="fas fa-download mx-1"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                {!! Form::model($payRequest, [
                                                    'route' => ['pay-requests.update', 'pay_request' => $payRequest['id']],
                                                    'method' => 'PUT',
                                                ]) !!}
                                                <input type="hidden" name="approved" value="1">
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fas fa-thumbs-up mx-1"></i>
                                                    Aprovar
                                                </button>
                                                {!! Form::close() !!}
                                                {!! Form::model($payRequest, [
                                                    'route' => ['pay-requests.update', 'pay_request' => $payRequest['id']],
                                                    'method' => 'PUT',
                                                ]) !!}
                                                <input type="hidden" name="approved" value="0">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-thumbs-down mx-1"></i>
                                                    Denegar
                                                </button>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
