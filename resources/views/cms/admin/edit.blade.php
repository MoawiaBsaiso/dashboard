@extends('cms.parent')
@section('title','Create Admin')
@section('main-title','Create Admin')
@section('sub-title','create admin')



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
                <h3 class="card-title">Create Data of Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form >
                @csrf


                <div class="card-body">



                <div class="form-group col-md-12">
                  <label for="country_id">Country Name</label>
                  <select class="form-control select2" name="country_id" id="country_id" style="width: 100%;" aria-label=".form-select-sm example">
                    {{--  <option selected="selected">Alabama</option>  --}}
                    @foreach ($countries as $country)
                     <option value="{{ $country->id}}">{{ $country->country_name }}</option>
                    @endforeach


                  </select>
                </div>

                  <div class="form-group col-md-4">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" value={{ $admins->user->firstname }} placeholder="Enter First Name of Country">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" value={{ $admins->user->lastname }} placeholder="Enter Last Name of Country">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" name="mobile" id="mobile" value={{ $admins->user->mobile }} placeholder="Enter Mobile of Country">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value={{ $admins->email }} placeholder="Enter Email of Country">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" id="password" value={{ $admins->password }} placeholder="Enter Password of Country">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value={{ $admins->user->date_of_birth }} placeholder="Enter date of birth">
                  </div>
                  <div class="form-group col-md-4">
                  <label for="gender">Gender</label>
                  <select class="form-control select2" name="gender" id="gender"  style="width: 100%;" aria-label=".form-select-sm example">
                    <option selected >{{ $admins->user->gender }}</option>
                    <option value="male">Male</option>
                    <option value="feMale">FeMale</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="status">Status</label>
                  <select class="form-control select2" name="status" id="status" style="width: 100%;" aria-label=".form-select-sm example">
                    <option selected>{{ $admins->user->status }}</option>
                    <option value="active"> Active</option>
                    <option value="inactive"> In Active</option>


                  </select>
                </div>
                  <div class="form-group col-md-4">
                    <label for="image">Image of Admin</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image of Country">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" onclick="performUpdate({{ $admins->id }});" class="btn btn-primary">Save</button>
                  <a href="{{ route('admins.index') }}" type="button" class="btn btn-success">Return Back</a>

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
        formData.append('firstname', document.getElementById('firstname').value);
        formData.append('lastname', document.getElementById('lastname').value);
        formData.append('mobile', document.getElementById('mobile').value);
        formData.append('gender', document.getElementById('gender').value);
        formData.append('status', document.getElementById('status').value);
        /*if (formData.append('status', document.getElementById('status')) != null) {
            formData.append('status', document.getElementById('status').value);
            }*/
        formData.append('email', document.getElementById('email').value);
        formData.append('password', document.getElementById('password').value);
        formData.append('date_of_birth', document.getElementById('date_of_birth').value);
        formData.append('country_id', document.getElementById('country_id').value);
       /*if (formData.append('image' , document.getElementById('image')) != null) {
        formData.append('image', document.getElementById('image').files[0]);

        }*/
        formData.append('image', document.getElementById('image').files[0]);


        storeRoute('/cms/admin/admins_update/'+id , formData);
    }
</script>
@endsection
