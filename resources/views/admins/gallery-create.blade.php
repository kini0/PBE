@extends('layouts.admin.app')
@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>Gallerie</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Gallerie</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
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

                <h3 class="profile-username text-center"></h3>

                <p class="text-muted text-center"></p>
                <a href="#" class="btn btn-primary btn-block"><b>{{Auth::user()->name}}<br>{{Auth::user()->email}}</b></b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Add Image</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
                    <form class="form-horizontal" action="/admins/gallery" method="post" enctype="multipart/form-data">
                    @csrf  
                    <div class="form-group row">
                        <label for="titre" class="col-sm-2 col-form-label">Titre</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="titre" placeholder="Titre image">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">Catégorie</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="category" placeholder="Catégorie">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="image">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
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

    

    </div>

@endsection