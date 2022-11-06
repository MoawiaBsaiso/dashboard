@extends('cms.parent')
@section('title','Index admin')
@section('main-title','Index admin')
@section('sub-title','index admin')



@section('styles')

@endsection

@section('content')
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="head-title d-flex align-items-center">
                    <h3 class="card-title">Data of admin</h3>
                  <a href="{{ route('admins.create') }}" type="button" class="btn btn-success ml-3">Create New admin</a>
                </div>

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
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>image</th>
                      <th>gender</th>
                      <th>status</th>
                      <th>setting</th>

                    </tr>
                  </thead>
                  <tbody>
                    {{--  <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td>
                        <div class="btn-group">
                        <button type="button" class="btn btn-primary">Edit</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-success">View</button>
                      </div>
                      </td>
                    </tr>  --}}

                    @foreach ($admins as $admin)
                    <tr>
                      <td>{{ $admin->id }}</td>
                      <td>{{$admin->user ? $admin->user->firstname : "Null" }}</td>
                      <td>{{$admin->user ? $admin->user->lastname : "Null" }}</td>
                      <td>{{$admin->user ? $admin->email : "Null" }}</td>
                      <td>{{$admin->user ? $admin->user->mobile : "Null" }}</td>
                      <td>
                        <img class='img-circle img-bordered-sm' src="{{ asset('storage/images/admin/'. $admin->user->image) }}" width="50" height="50" alt="I don't Know">
                      </td>
                      <td>{{$admin->user ? $admin->user->gender : "Null" }}</td>
                      <td>{{$admin->user ? $admin->user->status : "Null" }}</td>

                      <td>
                        <div class="btn-group">
                        <a  href="{{ route('admins.edit' , $admin->id) }}" type="button" class="btn btn-primary">Edit</a>
                        <a href="#" onclick="performDestroy({{ $admin->id }} , this);" type="button" class="btn btn-danger">Delete</a>
                      </div>
                      </td>

                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection

@section('scripts')
<script>
    function performDestroy(id , reference) {
        var url = '/cms/admin/admins/'+id;
        confirmDestroy(url,reference);
    }
</script>
@endsection
