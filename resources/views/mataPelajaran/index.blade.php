@extends('layouts.app')

@section('endCSS')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection

@section('title')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tabel Mata Pelajaran</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    `<li class="breadcrumb-item"><a href="{{ route('mp.index') }}">Mata Pelajaran</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection

@section('content')
<section class="content">
    <div class="row">
        @if (Auth::user()->status == 0)
        <div class="col-md-12">
            <a href="{{ route('mp.create') }}" class="btn btn-success btn-m float-right">Tambah Mata Pelajaran</a>
        </div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="data" class="table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Pelajaran</th>
                                @if (Auth::user()->status == 0)
                                <th>Edit</th>
                                <th>Delete</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matapelajaran as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->nama }}</td>
                                @if (Auth::user()->status == 0)
                                <td>
                                    <a href="{{ route('mp.edit', $item->id) }}"
                                        class="btn btn-block btn-info btn-xs">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ route('mp.delete', $item->id) }}"
                                        class="btn btn-block btn-danger btn-xs">Delete</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                            </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('endJS')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    $(function () {
        $('#data').DataTable();
    });
</script>
@endsection