@extends('cms.parent')
@section('title','Edit Article')
@section('main-title','Edit Article')
@section('sub-title','edit article')



@section('styles')

@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data of Article</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form >
                @csrf


                <div class="card-body">

<div class="row">
                    {{--  <div class="form-group col-md-4">
                  <label for="country_id">Country Name</label>
                  <select class="form-control select2" name="country_id" id="country_id" style="width: 100%;" aria-label=".form-select-sm example">
                    @foreach ($countries as $country)
                     <option value="{{ $country->id}}">{{ $country->country_name }}</option>
                    @endforeach


                  </select>
                </div>  --}}
                <div class="row">
                    <div class="form-group col-md-4">
                  <label for="author_id">Author Name</label>
                  <select class="form-control select2" name="author_id" id="author_id" style="width: 100%;" aria-label=".form-select-sm example">
                    @foreach ($authors as $author)
                     <option value="{{ $author->id}}">{{ $author->user->firstname }}</option>
                    @endforeach


                  </select>
                </div>
<div class="row">
                    <div class="form-group col-md-4">
                  <label for="category_id">Category Name</label>
                  <select class="form-control select2" name="category_id" id="category_id" style="width: 100%;" aria-label=".form-select-sm example">
                    @foreach ($categories as $category)
                     <option value="{{ $category->id}}">{{ $category->name }}</option>
                    @endforeach


                  </select>
                </div>


                  <div class="form-group col-md-12">
                    <label for="title">Article Name</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Name of Country" value="{{ $articles->title }}">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="short_description">Article Name</label>
                    <input type="text" class="form-control" name="short_description" id="short_description" placeholder="Enter Short Description" value="{{ $articles->short_description }}">
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="full_description">Description of Article</label>
                        <textarea class="form-control" name="full_description" id="full_description" cols="50" rows="4" style="resize: none;" placeholder="Enter Full Description">{{ $articles->full_description }}</textarea>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" onclick="performUpdate({{ $articles->id }});" class="btn btn-primary">Update</button>
                  {{--  <a href="{{ route('articles.index') }}" type="button" class="btn btn-success">Return Back</a>  --}}

                </div>
              </form>
            </div>
            <!-- /.card -->

            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('scripts')
<script>
    function performUpdate(id) {
        let formData = new FormData(); // formData() handle store data, files and images
        formData.append('title', document.getElementById('title').value);
        formData.append('short_description', document.getElementById('short_description').value);
        formData.append('full_description', document.getElementById('full_description').value);
        formData.append('author_id', document.getElementById('author_id').value);
        formData.append('category_id', document.getElementById('category_id').value);

        storeRoute('/cms/admin/articles_update/'+id , formData);
    }
</script>
@endsection
