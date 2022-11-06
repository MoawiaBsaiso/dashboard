@extends('cms.parent')

@section('title' , 'Index Permission')

@section('main-title' , 'Index Permission')

@section('sub-title' , 'index permission')




@section('styles')
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Of Permission</h3> <br>
          <a href="{{ route('permissions.create') }}" type="button" class="btn btn-success"> <i class="fas fa-plus-circle"> Create New Permission</i></a>

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
                <th>Permission Name</th>
                <th>Guard Name</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach ( $permissions as $permission )
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td>{{ $permission->street }}</td>
                    <td>
                        <div class="btn-group">

                            <a href="{{ route('permissions.edit', $permission->id) }}" type="button" class="btn btn-info">Edit</a>
                            <a href="#" onclick="preformDestroy({{$permission->id}} , this)" type="button" class="btn btn-danger">Delete</a>
                            {{-- <button type="button" class="btn btn-success">view</button> --}}
                      </div></td>
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

 @section('script')
{{-- <script>
    function preformDestroy(id, reference){
        confirmDestroy('/cms/admin/cities/'+id,reference)
    }
</script> --}}


<script>
    function preformDestroy(id, reference){
        let url='/cms/admin/permissions/'+id;
        confirmDestroy(url,reference);
    }
</script>
@endsection
