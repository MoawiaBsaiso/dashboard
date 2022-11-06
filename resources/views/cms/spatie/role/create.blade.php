@extends('cms.parent')

@section('title' , 'Create Role')

@section('main-title' , 'Create Role')

@section('sub-title' , 'create role')




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
            <h3 class="card-title">Create New Role</h3>
          </div>
          </div>


          <form>
            @csrf

            <div class="card-body">
                <div class="form-group" data-select2-id="29">
                    <label for="guard_name">guard Name</label>
                    <select class="form-control" style="width: 100%;"  name="guard_name" id="guard_name" data-select2-id="1" tabindex="-1" aria-hidden="true">

                      <option value='admin'>Admin</option>
                      <option value='author'>Author</option>
                      {{-- <option value="web">user</option> --}}

                    </select>


            </div>
              <div class="form-group">
                <label for="name">Role Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Role Name">
              </div>

            </div>
            <div class="card-footer">
              <button type="button" onclick="performStore()" class="btn btn-primary">Save</button>
              <a href="{{ route('roles.index') }}" type="button" class="btn btn-success">Go TO Index</a>
            </div>
          </form>
        </div>
    </div>
  </div>


@endsection

@section('script')
<script>
    function performStore(){
        let formData=new FormData();
        formData.append('guard_name' , document.getElementById('guard_name').value);
        formData.append('name' , document.getElementById('name').value);
        store('/cms/admin/roles' , formData);

    }
</script>
@endsection
