@extends('layouts.login')

@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            {{-- input username --}}
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="username"
                    name="username" id="username" value="{{ old('username') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            {{-- input username --}}

            {{-- input password --}}
            
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    required autocomplete="current-password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            {{-- input password --}}

           
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-block btn-outline-primary">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    <!-- /.login-card-body -->
</div>



@endsection