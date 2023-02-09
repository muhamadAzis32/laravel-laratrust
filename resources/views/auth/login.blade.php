@extends('layouts.app')

@section('content')
    <div class="mt-5 mx-auto" style="width: 380px">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Email </label>
                        <input name="email" type="email" class="form-control" value="{{ old('email') }}">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password </label>
                        <input name="password" type="password" class="form-control" value="{{ old('password') }}">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="{{ route('password.request') }}" class="btn btn-link">Forgot your password?</a>
                </form>
            </div>
        </div>
    </div>
@endsection
