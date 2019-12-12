@extends('layouts.dashboard-layout')

@section('content')
  <h2>Create User</h2>
  <form class="form col-lg-6 offset-lg-3" action="{{url('/users')}}" method="post">
    @csrf

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <div class="form-group">
    <label for="name">User Name</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{old('name')}}">

  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="retype">Retype Password</label>
    <input type="password" name="password_confirmation" class="form-control" id="retype" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary">Create User</button>
</form>
@endsection
