@extends('cms.parent')
@section('title','Index Category')
@section('main-title','Index Category')
@section('sub-title','index category')



@section('styles')

@endsection

@section('content')
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="head-title d-flex align-items-center">
                    <h3 class="card-title">Data of category</h3>
                  <a href="{{ route('categories.create') }}" type="button" class="btn btn-success ml-3">Create New category</a>
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
                      <th>category Name</th>
                      <th>description</th>
                      <th>Settings</th>

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

                    @foreach ($categories as $category)
                    <tr>
                      <td>{{ $category->id }}</td>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->description }}</td>
                      <td>
                        <div class="btn-group">
                        <a  href="{{ route('categories.edit' , $category->id) }}" type="button" class="btn btn-primary">Edit</a>
                        <a href="#" onclick="performDestroy({{ $category->id }} , this);" type="button" class="btn btn-danger">Delete</a>
                      </div>
                      </td>

                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>

              {{ $categories->links() }}
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection

@section('scripts')
<script>
    function performDestroy(id , reference) {
        let url = '/cms/admin/categories/'+id;
        confirmDestroy(url,reference);
    }
</script>
@endsection
