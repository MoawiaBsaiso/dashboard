@extends('cms.parent')
@section('title','Index Country')
@section('main-title','Index Country')
@section('sub-title','index country')



@section('styles')

@endsection

@section('content')
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data of Country</h3>

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
                      <th>Country Name</th>
                      <th>Code of Country</th>
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

                    @foreach ($countries as $country)
                    <tr>
                      <td>{{ $country->id }}</td>
                      <td>{{ $country->country_name }}</td>
                      <td>{{ $country->code }}</td>

                      <td>
                        <div class="btn-group">
                        <a  href="{{ route('countries.edit' , $country->id) }}" type="button" class="btn btn-primary">Edit</a>
                        <form action="{{ route('countries.destroy', $country->id )}}" method="POST">
                        @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('countries.show' , $country->id ) }}" type="button" class="btn btn-success">View</a>
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

@endsection
