@extends('cms.parent')
@section('title','Edit City')
@section('main-title','Edit City')
@section('sub-title','edit city')



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
                <h3 class="card-title">Edit City </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                @csrf



                <div class="card-body">


                    <div class="form-group col-md-12">
                  <label for="country_id">Country Name</label>
                  <select class="form-control select2" name="country_id" id="country_id" style="width: 100%;" aria-label=".form-select-sm example">
                    @foreach ($countries as $country)
                     <option value="{{ $country->id}}">{{ $country->country_name }}</option>
                    @endforeach


                  </select>
                </div>
                  <div class="form-group">
                    <label for="city_name">City Name</label>
                    <input type="text" class="form-control" name="city_name" id="city_name" value="{{ $cities->city_name }}" placeholder="Enter Name of City">
                  </div>
                  <div class="form-group">
                    <label for="street">Code of Country</label>
                    <input type="text" class="form-control" name="street" id="street" value="{{ $cities->street }}" placeholder="Enter Street of City">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="#" onclick="performUpdate({{ $cities->id }});" type="button" class="btn btn-primary">Update</a>
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
        let formData = new FormData();
        formData.append('city_name', document.getElementById('city_name').value);
        formData.append('street', document.getElementById('street').value);
        formData.append('country_id', document.getElementById('country_id').value);

        storeRoute('/cms/admin/cities_update/'+id , formData);
    }
</script>
@endsection
