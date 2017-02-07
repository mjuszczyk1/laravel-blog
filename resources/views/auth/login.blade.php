@extends('main')

@section('content')
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-block pb-0">
                <h1 class="card-title mb-0">Login</h1>
            </div>
            <div class="card-block">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    @include('partials.errors')
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Login
                        </button>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')@overwrite
