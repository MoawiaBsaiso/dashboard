@extends('cms.parent')
@section('title','Index Author')
@section('main-title','Index Author')
@section('sub-title','index author')



@section('styles')

@endsection

@section('content')
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="head-title d-flex align-items-center">
                    <h3 class="card-title">Data of author</h3>
                  <a href="{{ route('authors.create') }}" type="button" class="btn btn-success ml-3">Create New author</a>
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
                      {{--  <th>File</th>  --}}
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

                    @foreach ($authors as $author)
                    <tr>
                      <td>{{ $author->id }}</td>
                      <td>{{$author->user ? $author->user->firstname : "Null" }}</td>
                      <td>{{$author->user ? $author->user->lastname : "Null" }}</td>
                      <td>{{$author->user ? $author->email : "Null" }}</td>
                      <td>{{$author->user ? $author->user->mobile : "Null" }}</td>


                      <td>
                        <img class='img-circle img-bordered-sm' src="{{ asset('/storage/images/author/'. $author->user->image ) }}" width="50" height="50" alt="">
                      </td>
                      {{--  <td>
                        <a class='' href="{{ asset('/storage/files/author/'. $author->user->image ) }}">
                      </td>  --}}

                      <td>{{$author->user ? $author->user->gender : "Null" }}</td>
                      <td>{{$author->user ? $author->user->status : "Null" }}</td>

                      <td>
                        <div class="btn-group">
                        <a  href="{{ route('authors.edit' , $author->id) }}" type="button" class="btn btn-primary">Edit</a>
                        <a href="#" onclick="performDestroy({{ $author->id }} , this);" type="button" class="btn btn-danger">Delete</a>
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
        var url = '/cms/admin/authors/'+id;
        confirmDestroy(url,reference);
    }
</script>
@endsection
