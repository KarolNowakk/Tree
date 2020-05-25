@extends('master')

@section('content')
    <div class="d-flex flex-row justify-content-center" style="padding-top: 50px">
        <form class="w-25 center" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Repeat Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 20px">Register</button>               
        </form>
    </div>
@endsection