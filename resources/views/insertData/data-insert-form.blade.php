@extends('layouts.dashboard-layout')
@section('content')Formatted HTML:
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<h2>Insert Data</h2>
<form class="form-inline" method="post" action="/run">
    @csrf
    <label class="sr-only" for="runname">Run Name</label>
    <input type="text" name="run_name" class="form-control mb-2 mr-sm-2" id="runname" placeholder="Run Name">
    <label class="sr-only" for="counter">Counter</label>
    <div class="input-group mb-2 mr-sm-2">
        <input type="number" max="25000" min="1" class="form-control" id="counter" name="counter" placeholder="Counter">
    </div>
    <button type="submit" class="btn btn-primary mb-2">Go</button>
</form>
<vue-data-input-form></vue-data-input-form>
@endsection
