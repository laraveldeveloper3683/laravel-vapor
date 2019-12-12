@extends('layouts.dashboard-layout')

@section('content')
  <div class="">
    <h2>All Users</h2>
    <a href="{{url('/users/create')}}" class="btn btn-info" >Create User</a>

  </div>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Created At</th>
          <th>Action</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          @if ($user->name != 'admin')
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->created_at}}</td>
              <td>
                @if ($user->is_active)
                  <a  class="btn btn-danger" name="button" href="{{url('/user-disable/'.$user->id)}}"  title="disable user">
                    <span data-feather="x-circle"></span>
                  </a>
                  @else
                    <a  class="btn btn-danger" name="button" href="{{url('/user-enable/'.$user->id)}}"  title="enable user">
                      <span data-feather="check"></span>
                    </a>
                @endif
                <button type="button" class="btn btn-danger" name="button"  onclick="event.preventDefault();
                document.getElementById('delete-user').submit();"  title="Delete user">
                <span data-feather="trash-2"></span>
              </button>

              <form id="delete-user" action="{{ url('users/'.$user->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
              </form>
            </td>

          </tr>

          @endif

      @endforeach


    </tbody>

  </table>
  {{ $users->links() }}
</div>
@endsection
