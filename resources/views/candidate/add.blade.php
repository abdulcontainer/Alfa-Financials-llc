@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <a href="{{route('candidate.index')}}"><h3>Go Back</h3></a>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
          <section>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                
            </div>
              @endif
          </section>
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
      
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Add Candidate</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('candidate.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name"  placeholder="Enter Name">
                                        <span style="color:red">@error('name'){{$message}}@enderror</span>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Email address</label>
                                        <input type="email" name="email" class="form-control"  placeholder="Enter email">
                                        <span style="color:red">@error('email'){{$message}}@enderror</span>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Phone No</label>
                                        <input type="text" class="form-control" name="phone"  placeholder="Enter Phone No">
                                        <span style="color:red">@error('phone'){{$message}}@enderror</span>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Date Of Birth</label>
                                        <input type="text" class="form-control" name="dob"  placeholder="Enter Date of Birth">
                                        <span style="color:red">@error('dob'){{$message}}@enderror</span>
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" name="address"  placeholder="Enter Address">
                                        <span style="color:red">@error('address'){{$message}}@enderror</span>
                                    </div> 
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                          <div class="input-group">
                                            <div class="custom-file">
                                              <input type="file" name ="file" class="custom-file-input" id="exampleInputFile">
                                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                              
                                            </div>
                                            
                                          </div>
                                          <span style="color:red">@error('file'){{$message}}@enderror</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary" style="float:right">Submit</button>
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
