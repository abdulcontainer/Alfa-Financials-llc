@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Candidates List</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <a class="btn btn-primary" style="float:right" type="button" href="{{route('candidate.create')}}"><i class="fas fa-user-plus"></i> Add Candidate</a>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
          <section>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
          </section>
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
      
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Candidates</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered table-striped" id="example">
                        <thead>
                            <tr>
                            <th>S No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Date Of Birth</th>
                            <th>Address</th>
                            <th>Upload Resume</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach($candidates as $data)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->phone}}</td>
                                <td>{{$data->dob}}</td>
                                <td>{{$data->address}}</td>
                                <td>
                                    <img src="{{ asset('/storage/uploads/'.$data->file) }}" width="100" height="100" alt="" title="no" />
                                </td>
                                <td>
                                    <div class="dropdown d-inline">
                                        <button class="btn dropdown-toggle" style="background-color:darkgray;" 
                                          type="button" data-toggle="dropdown">Action
                                        </button>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item has-icon" href="{{route('candidate.edit',$data->id)}}"><i class="fas fa-user-edit"></i> Edit </a>
                                          <form action="{{ route('candidate.destroy', $data->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn"  type="submit"><i class="fas fa-user-edit "></i> Delete</button>
                                          </form>
                                        </div>
                                      </div>
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>
                    </table>
                    </div><!-- /.card-body -->
                  </div><!-- /.card -->
                  <div class="">
                    <div class="justify-content-center">
                        {!! $candidates->links() !!}
                    </div>
                </div>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <style>
        .w-5{
          display:none;
        }
      </style>
@endsection
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
