@extends('templates.template')
@section('contenido')
    <legend>Modify User</legend>
    <form action="{{ url('users/' . $user->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ $user->name }}">
            <strong style="color: red">{{ $errors->first('username')}}</strong>
        </div>
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $user->email }}">
            <strong style="color: red">{{ $errors->first('email')}}</strong>
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <strong style="color: red">{{ $errors->first('password')}}</strong>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Confirm password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" value="{{ old('password_confirmation') }}">
        </div>
        <div class="col-md-4">
          <button type="submit" name="btn" class="btn btn-primary">Save</button>
        </div>
    </form>
    <br/>
    <a href="{{ url('../users') }}">Back</a>
@endsection
