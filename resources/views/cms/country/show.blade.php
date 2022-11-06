@extends('cms.parent')
@section('title','Show Country')
@section('main-title','Show Country')
@section('sub-title','show country')



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
                <h3 class="card-title">Show Country </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('countries.show', $countries->id) }}" method="POST">
                {{--  @csrf
                @method('PUT')

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
                @endif  --}}

                {{--  @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i>Success</h5>
                {{ session('message') }}
                </div>
                @endif  --}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="country_name">Country Name</label>
                    <input type="text" class="form-control" name="country_name" id="country_name" value="{{ $countries->country_name }}" placeholder="Enter Name of Country" disabled>
                  </div>
                  <div class="form-group">
                    <label for="code">Code of Country</label>
                    <input type="text" class="form-control" name="code" id="code" value="{{ $countries->code }}" placeholder="Enter Code of Country" disabled>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{ route('countries.index') }}" type="submit" class="btn btn-success">Return back</a>
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

@endsection
