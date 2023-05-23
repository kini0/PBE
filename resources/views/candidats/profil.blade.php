@extends('layouts.candidat.app1')
@section('content')

<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('candidat') }}">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if(Auth::user()->avatar != null)
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('/storage/'.Auth::user()->avatar)}}" alt="User profile picture">
                    @else
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('/users/images/no-image.png')}}" alt="User profile picture">
                    @endif
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                <p class="text-muted text-center">Candidat N°{{$infocandidat->id}}</p>
                <form method="POST" action="/candidats/profile/{{Auth::user()->id}}" enctype="multipart/form-data" class="form-group">
                        @csrf
                        @method('put')
                  <input type="file" name="file" style="margin-bottom: 15px">
                  <button type="submit" class="btn btn-primary">Change</button>
                </form>
              </div>
              <!-- /.card-body javascript:void(0)-->
            </div>
            <!-- /.card -->


            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Info personnels</a></li>
                  <li class="nav-item"><a class="nav-link" href="/password/reset">Change Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="timeline">
                        <!-- The timeline -->
                        <form class="form-horizontal" method="POST" action="/candidats/profile-info/{{Auth::user()->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                          </div>
                        </form>
                    </div>
                    
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

</div>
<!-- ./wrapper -->
@endsection
