@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>
                    Candidate
                  </h1>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
          <section>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
              @endif
          </section>
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
      
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Edit Candidate</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('candidate.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                              <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name"  value="{{$data->name}}">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Email address</label>
                                        <input type="email" name="email" class="form-control" value="{{$data->email}}"  placeholder="Enter email">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Phone No</label>
                                        <input type="text" class="form-control" name="phone" value="{{$data->phone}}"  placeholder="Enter Phone No">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Date Of Birth</label>
                                        <input type="text" class="form-control" name="dob"  value="{{$data->dob}}" placeholder="Enter Date of Birth">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" name="address" value="{{$data->address}}"  placeholder="Enter Address">
                                      </div> 
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                          <div class="input-group">
                                            <div class="custom-file">
                                              <input type="file" class="custom-file-input" name="file" id="exampleInputFile">
                                              <label class="custom-file-label"  for="exampleInputFile">Choose file</label>
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <img src="{{ asset('/storage/uploads/'.$data->file) }}" width="100" height="100" alt="" title="no" />
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary" style="float:right">Save Changes</button>
                          </div>
                        </form>
                      </div>
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
          </section>
    </div>
@endsection
