@extends('layouts.app')

@section('title')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Super Admin</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                    <li class="breadcrumb-item"><a href="#">Edit</a></li>
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
                <h3 class="card-title">EDIT</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf
                <div class="card-body">
                    {{-- input nik --}}
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="number" class="form-control @error('nik') is-invalid @enderror" placeholder="nik"
                            name="nik" id="nik" value="{{ old('nik') ? old('nik') : $user->nik }}">
                        @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- input nik --}}

                    {{-- input username --}}
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                            placeholder="Username" name="username" id="username"
                            value="{{ old('username') ? old('username') : $user->username }}">
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- input username --}}

                    {{-- input name --}}
                    <div class="form-group">
                        <label for="name">Nama Lengkap <small>sesuai KTP</small></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Nama Lengkap" name="name" id="name"
                            value="{{ old('name') ? old('name') : $user->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- input name --}}

                    {{-- input password --}}
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="password" name="password" id="password" value="{{ old('password') }}">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- input password --}}

                    {{-- input password_validation --}}
                    <div class="form-group">
                        <label for="password">Ulangi Password</label>
                        <input type="password" class="form-control @error('password_validation') is-invalid @enderror"
                            placeholder="ulangi password" name="password_validation" id="password_validation"
                            value="{{ old('password_validation') }}">
                        @error('password_validation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- input password_validation --}}

                    <div class="form-group">
                        <label>Type User</label>
                        <select class="form-control" id="status" name="status">
                            <option value="0" {{ $user->status == 0 ? "selected" : "" }}>Admin</option>
                            <option value="1" {{ $user->status == 0 ? "selected" : "" }}>Guru</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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