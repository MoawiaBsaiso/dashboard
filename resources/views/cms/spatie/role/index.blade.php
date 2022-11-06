@extends('cms.parent')

@section('title' , 'Index Role')

@section('main-title' , 'Index Role')

@section('sub-title' , 'index Role')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Data of Role</h3> --}}
                <a href="{{route('roles.create')}}" type="button" class="btn btn-success">Add New Role</a>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Role Name</th>
                <th>Guard Name</th>
                <th>Permissions </th>

                <th>Setting</th>
              </tr>
            </thead>
            <tbody>

                @foreach ( $roles as $role )
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->guard_name }}</td>
                    <td>
                        <a href="{{ route('roles.permissions.index' , $role->id)}}"
                          class="btn btn-primary"> Permissions ({{ $role->permissions_count }})
                        </a>
                      </td>
                      <td>
                    <td>

                        <div class="btn-group">
                            <a href="{{route('roles.edit' , $role->id)}}" type="button" class="btn btn-primary">Edit</a>
                            <a href="#" onclick="performDestroy({{$role->id}} , this)" type="button" class="btn btn-danger">Delete</a>

                            {{-- <button type="button" class="btn btn-success">View</button> --}}
                          </div>
                    </td>
                  </tr>
                @endforeach



            </tbody>
          </table>
        </div>

        {{ $roles->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')

{{-- <script>
  function performDestroy(id , reference){

    confirmDestroy('/cms/admin/cities/'+id,reference);
  }
</script> --}}

<script>
  function performDestroy(id , reference){
    let url = '/cms/admin/roles/'+id;
    confirmDestroy(url,reference);
  }
</script>
@endsection
