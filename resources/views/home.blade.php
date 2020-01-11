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
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">KBM HARIAN KELAS SMKN 1 MEJAYAN</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @foreach ($class as $key => $item)
                    <div id="accordion{{ $key }}">
                        <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <a data-toggle="collapse" data-parent="#accordion{{ $key }}" href="#collapse{{ $key }}"
                                    class="collapsed btn-block" aria-expanded="false">
                                    {{ $header[$key] }}
                                </a>
                            </div>
                            <div id="collapse{{ $key }}" class="panel-collapse in collapse" style="">
                                <div class="card-body table-responsive">
                                    @foreach ($item as $key => $itemSub)
                                    <div id="accordionSub">
                                        <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <a data-toggle="collapse" data-parent="#accordionSub"
                                                    href="#collapseSub{{ $itemSub->nama }}" class="collapsed btn-block"
                                                    aria-expanded="false">
                                                    {{ $itemSub->nama }}
                                                </a>
                                            </div>
                                            <div id="collapseSub{{ $itemSub->nama }}" class="panel-collapse in collapse"
                                                style="">
                                                <div class="card-body table-responsive">
                                                    <table class="table table-bordered table-hover" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th style="vertical-align: middle;text-align: center;"
                                                                    rowspan="3">kelas
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center;"
                                                                    rowspan="3">jam
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center;"
                                                                    rowspan="3">nama
                                                                    pengajar</th>
                                                                <th style="vertical-align: middle;text-align: center;"
                                                                    rowspan="3">mata
                                                                    pelajaran</th>
                                                                <th style="vertical-align: middle;text-align: center;"
                                                                    rowspan="3">
                                                                    uraian kegiatan</th>
                                                                <th style="vertical-align: middle;text-align: center;"
                                                                    colspan="5">
                                                                    presensi</th>
                                                                <th style="vertical-align: middle;text-align: center;"
                                                                    rowspan="3">
                                                                    status</th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: middle;text-align: center;"
                                                                    rowspan="2">
                                                                    jumlah</th>
                                                                <th style="vertical-align: middle;text-align: center;"
                                                                    rowspan="2">hadir
                                                                </th>
                                                                <th style="vertical-align: middle;text-align: center;"
                                                                    colspan="3">tidak
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
                                                            @foreach ($itemSub->schedule as $key => $itemSubSub)
                                                            <tr>
                                                                <td>{{ $itemSubSub->kelas->nama }}</td>
                                                                <td>{{ $itemSubSub->tgl }}</td>
                                                                <td>{{ $itemSubSub->user->name }}</td>
                                                                <td>{{ $itemSubSub->mp->nama }}</td>
                                                                <td>{!! $itemSubSub->deskripsi !!}</td>
                                                                <td>{{ $itemSubSub->absen->jumlah }}</td>
                                                                <td>{{ $itemSubSub->absen->hadir }}</td>
                                                                <td>{{ $itemSubSub->absen->sakit }}</td>
                                                                <td>{{ $itemSubSub->absen->izin }}</td>
                                                                <td>{{ $itemSubSub->absen->alfa }}</td>
                                                                @if ($itemSubSub->absen->status == 0)
                                                                <td>Tidak Hadir</td>
                                                                @else
                                                                <td>Hadir</td>
                                                                @endif
                                                            </tr>
                                                            @endforeach
                                                            </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
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