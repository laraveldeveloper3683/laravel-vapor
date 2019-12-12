@extends('layouts.dashboard-layout')
@section('content')
  <h2>Insert Data</h2>
  <form class="form-inline">
  <label class="sr-only" for="runname">Run Name</label>
  <input type="text" name="run_name" class="form-control mb-2 mr-sm-2" id="runname" placeholder="Run Name">

  <label class="sr-only" for="counter">Counter</label>
  <div class="input-group mb-2 mr-sm-2">

    <input type="number" max="25000" class="form-control" id="counter" placeholder="Counter">
  </div>



  <button type="submit" class="btn btn-primary mb-2">Go</button>
</form>
<vue-data-input-form></vue-data-input-form>
@endsection
