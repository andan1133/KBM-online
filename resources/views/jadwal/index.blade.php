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
                <h1 class="m-0 text-dark">Tabel Jadwal</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    `<li class="breadcrumb-item"><a href="{{ route('jadwal.index') }}">Jadwal</a></li>
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
        @admin
        <div class="col-md-12">
            <a href="{{ route('jadwal.create') }}" class="btn btn-success btn-m float-right">Tambah Jadwal</a>
        </div>
        @endadmin
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="data" class="table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th style="vertical-align: middle;text-align: center;" rowspan="3">kelas
                                </th>
                                <th style="vertical-align: middle;text-align: center;" rowspan="3">jam
                                </th>
                                <th style="vertical-align: middle;text-align: center;" rowspan="3">nama
                                    pengajar</th>
                                <th style="vertical-align: middle;text-align: center;" rowspan="3">mata
                                    pelajaran</th>
                                <th style="vertical-align: middle;text-align: center;" rowspan="3">
                                    uraian kegiatan</th>
                                <th style="vertical-align: middle;text-align: center;" colspan="5">
                                    presensi</th>
                                <th style="vertical-align: middle;text-align: center;" rowspan="3">
                                    status</th>
                                @guru
                                <th style="vertical-align: middle;text-align: center;" rowspan="3">
                                    Update</th>
                                @endguru
                                @admin
                                <th style="vertical-align: middle;text-align: center;" rowspan="3">
                                    Hapus</th>
                                @endadmin
                            </tr>
                            <tr>
                                <th style="vertical-align: middle;text-align: center;" rowspan="2">
                                    jumlah</th>
                                <th style="vertical-align: middle;text-align: center;" rowspan="2">hadir
                                </th>
                                <th style="vertical-align: middle;text-align: center;" colspan="3">tidak
                                    hadir</th>
                            </tr>
                            <tr>
                                <th style="vertical-align: middle;text-align: center;">s
                                </th>
                                <th style="vertical-align: middle;text-align: center;">i
                                </th>
                                <th style="vertical-align: middle;text-align: center;">a
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $key => $item)
                            <tr>
                                <td>{{ $item->kelas->nama }}</td>
                                <td>{{ $item->tgl }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->mp->nama }}</td>
                                <td>{!! $item->deskripsi !!}</td>
                                <td>{{ $item->absen->jumlah }}</td>
                                <td>{{ $item->absen->hadir }}</td>
                                <td>{{ $item->absen->sakit }}</td>
                                <td>{{ $item->absen->izin }}</td>
                                <td>{{ $item->absen->alfa }}</td>
                                @guru
                                @if ($item->absen->status == 0)
                                <td>
                                    <a href="#" class="btn btn-block btn-danger btn-xs">
                                        Tidak Hadir
                                    </a>
                                </td>
                                @else
                                <td>
                                    <a href="#" class="btn btn-block btn-success btn-xs">
                                        Hadir
                                    </a>
                                </td>
                                @endif
                                @else
                                @if ($item->absen->status == 0)
                                <td>
                                    <a href="{{ route('jadwal.update', [$item->absen->id, 1]) }}"
                                        class="btn btn-block btn-danger btn-xs">
                                        Tidak Hadir
                                    </a>
                                </td>
                                @else
                                <td>
                                    <a href="{{ route('jadwal.update', [$item->absen->id, 0]) }}"
                                        class="btn btn-block btn-success btn-xs">
                                        Hadir
                                    </a>
                                </td>
                                @endif
                                @endguru
                                @guru
                                <td>
                                    <a href="{{ route('absen.edit', $item->absen->id) }}"
                                        class="btn btn-block btn-info btn-xs">Update</a>
                                </td>
                                @endguru
                                @admin
                                <td>
                                    <a href="{{ route('jadwal.delete', [$item->id, $item->absen->id]) }}"
                                        class="btn btn-block btn-danger btn-xs">Delete</a>
                                </td>
                                @endadmin
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