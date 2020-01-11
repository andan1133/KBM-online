@extends('layouts.app')

@section('title')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Buat Kelas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('kelas.index') }}">Kelas</a></li>
                    <li class="breadcrumb-item"><a href="#">Create</a></li>
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
                <h3 class="card-title">Buat Kelas</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('kelas.update', $kelas->id) }}">
                @csrf
                <div class="card-body">
                    {{-- input name--}}
                    <div class="form-group">
                        <label for="name">nama</label>
                        <div class="row col-md-4">
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="name" style="text-align: center" name="name" id="name"
                                    value="{{ old('name') ? old('name') : $kelas->names }}">
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('code') is-invalid @enderror"
                                    placeholder="code" name="code" id="code" style="text-align: center"
                                    value="{{ old('code') ? old('code') : $kelas->code }}">
                            </div>
                        </div>
                        @error('name')
                        <strong>{{ $message }}</strong>
                        @enderror
                        @error('code')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    {{-- input name --}}

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