@extends('cms.parent')

@section('title' , 'Edit Permission')

@section('main-title' , 'Edit Permission')

@section('sub-title' , 'edit permission')




@section('styles')
@endsection

@section('content')


<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Permission</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->

            @csrf


            <div class="card-body">
                <div class="form-group" data-select2-id="29">
                    <label for="guard_name">guard Name</label>
                    <select class="form-control" style="width: 100%;"  name="guard_name" id="guard_name" data-select2-id="1" tabindex="-1" aria-hidden="true">

                      <option value='admin'@if($permissions->guard_name=="admin")selected @endif>Admin</option>
                      <option value='author' @if($permissions->guard_name=="author")selected @endif>Aduthor</option>
                      {{-- <option value="web">user</option> --}}

                    </select>


            </div>
            <div class="form-group">
                <label for="name">Permission Name</label>
                <input type="text" class="form-control" name="name" value="{{ $permissions->name }}" id="name" placeholder="Enter Permission Name">
              </div>

            </div>
            <div class="card-footer">
              <a href="#" onclick="performUpdate({{ $permissions->id }})" type="button" class="btn btn-primary">Update</a>
            </div>
          </form>
        </div>
    </div>
  </div>
  </div>

@endsection

@section('script')
<script>
        function performUpdate(id){
        let formData=new FormData();
        formData.append('name' , document.getElementById('name').value);
        formData.append('guard_name' , document.getElementById('guard_name').value);
        storeRoute('/cms/admin/permissions_update/'+id , formData);
        }
</script>
@endsection
