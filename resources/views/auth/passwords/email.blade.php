@extends('main')

@section('content')
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-block pb-0">
                <h1 class="card-title mb-0">Reset Password</h1>
            </div>
            <div class="card-block">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    @include('partials.errors')
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Send Password Reset Link
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('sidebar')@overwrite