@extends('cms.parent')
@section('title','Index Article')
@section('main-title','Index Article')
@section('sub-title','index article')



@section('styles')

@endsection

@section('content')
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="head-title d-flex align-items-center">
                    <h3 class="card-title">Data of Article</h3>
                  <a href="{{ route('articles.create') }}" type="button" class="btn btn-success ml-3">Create New Article</a>
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
                      <th>Article Name</th>
                      <th>short description</th>
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

                    @foreach ($articles as $article)
                    <tr>
                      <td>{{ $article->id }}</td>
                      <td>{{ $article->title }}</td>
                      <td>{{ $article->short_description }}</td>
                      <td>
                        <div class="btn-group">
                        <a  href="{{ route('articles.edit' , $article->id) }}" type="button" class="btn btn-primary">Edit</a>
                        <a href="#" onclick="performDestroy({{ $article->id }} , this);" type="button" class="btn btn-danger">Delete</a>
                      </div>
                      </td>

                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>

              {{ $articles->links() }}
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection

@section('scripts')
<script>
    function performDestroy(id , reference) {
        let url = '/cms/admin/articles/'+id;
        confirmDestroy(url,reference);
    }
</script>
@endsection
