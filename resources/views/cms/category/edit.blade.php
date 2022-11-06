@extends('cms.parent')
@section('title','Edit Category')
@section('main-title','Edit Category')
@section('sub-title','edit category')



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
                <h3 class="card-title">Edit Data of Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form >
                @csrf


                <div class="card-body">





                  <div class="form-group col-md-12">
                    <label for="name">Country Name</label>
                    <input value="{{ $categories->name }}" type="text" class="form-control" name="name" id="name" placeholder="Enter Name of Country">
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description of Category</label>
                        <textarea class="form-control" name="description" id="description" cols="50" rows="4" style="resize: none;" placeholder="Enter Description of Category">{{ $categories->description }}</textarea>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" onclick="performUpdate({{ $categories->id }});" class="btn btn-primary">Save</button>
                  {{--  <a href="{{ route('categories.index') }}" type="button" class="btn btn-success">Return Back</a>  --}}

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
        formData.append('name', document.getElementById('name').value);
        formData.append('description', document.getElementById('description').value);
        storeRoute('/cms/admin/categories_update/'+id , formData);
    }
</script>
@endsection
