@extends('layouts.app')

@section('endCSS')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<style>
    .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da;
        padding: .46875rem .75rem;
        height: calc(2.25rem + 2px);
    }
</style>
@endsection

@section('title')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Buat Jadwal</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('jadwal.index') }}">jadwal</a></li>
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
                <h3 class="card-title">Jadwal</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('jadwal.store') }}">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            {{-- guru --}}
                            <div class="form-group">
                                <label>Nama Guru</label>
                                <select class="form-control select2" id="guru" name="guru">
                                    @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('guru')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- guru --}}
                        </div>

                        <div class="col-md-6">
                            {{-- mata pelajaran --}}
                            <div class="form-group">
                                <label>Nama Mata Pelajaran</label>
                                <select class="form-control select2" id="mata_pelajaran" name="mata_pelajaran">
                                    @foreach ($mp as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('mata_pelajaran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- mata pelajaran --}}
                        </div>

                        <div class="col-md-6">
                            {{-- kelas --}}
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                <select class="form-control select2" id="kelas" name="kelas">
                                    @foreach ($class as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('kelas')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            {{-- kelas --}}
                        </div>

                        <div class="col-md-6">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label>Date masks:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input id="date" name="date" type="text" class="form-control"
                                        value="{{ Carbon\Carbon::now()->format('d-m-Y/H') }}"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy/H"
                                        data-mask>
                                </div>
                                @error('date')
                                <strong>{{ $message }}</strong>
                                @enderror
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                    </div>

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

@section('endJS')
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#date').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
        //Money Euro
        // $('[data-mask]').inputmask()
        })
</script>
@endsection