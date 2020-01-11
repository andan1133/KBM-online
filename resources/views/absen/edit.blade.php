@extends('layouts.app')

@section('title')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Absen</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">guru</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('absen.update', $absen->id) }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            {{-- input jumlah --}}
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                    placeholder="jumlah" name="jumlah" id="jumlah"
                                    value="{{ old('jumlah') ? old('jumlah') : $absen->jumlah }}">
                                @error('jumlah')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            {{-- input jumlah --}}
                        </div>
                        <div class="col-md-2">
                            {{-- input hadir --}}
                            <div class="form-group">
                                <label for="hadir">Hadir</label>
                                <input type="hadir" class="form-control @error('hadir') is-invalid @enderror"
                                    placeholder="hadir" name="hadir" id="hadir"
                                    value="{{ old('hadir') ? old('hadir') : $absen->hadir}}">
                                @error('hadir')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            {{-- input hadir --}}
                        </div>
                        <div class="col-md-2">
                            {{-- input sakit --}}
                            <div class="form-group">
                                <label for="sakit">Sakit</label>
                                <input type="number" class="form-control @error('sakit') is-invalid @enderror"
                                    placeholder="sakit" name="sakit" id="sakit"
                                    value="{{ old('sakit') ? old('sakit') : $absen->sakit }}">
                                @error('sakit')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            {{-- input sakit --}}
                        </div>
                        <div class="col-md-2">
                            {{-- input izin --}}
                            <div class="form-group">
                                <label for="izin">Izin</label>
                                <input type="number" class="form-control @error('izin') is-invalid @enderror"
                                    placeholder="izin" name="izin" id="izin"
                                    value="{{ old('izin') ? old('izin') : $absen->izin }}">
                                @error('izin')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            {{-- input izin --}}
                        </div>
                        <div class="col-md-2">
                            {{-- input alfa --}}
                            <div class="form-group">
                                <label for="alfa">alfa</label>
                                <input type="number" class="form-control @error('alfa') is-invalid @enderror"
                                    placeholder="alfa" name="alfa" id="alfa"
                                    value="{{ old('alfa') ? old('alfa') : $absen->alfa }}">
                                @error('alfa')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            {{-- input alfa --}}
                        </div>
                    </div>

                    {{-- input description --}}
                    <div class="form-group">
                        <label for="description">Uraian Kegiatan</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                            placeholder="Uraian Kegiatan" name="description"
                            id="description">{!! old('description') ? old('description') : $jadwal->deskripsi !!}</textarea>
                        @error('description')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    {{-- input description --}}

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection