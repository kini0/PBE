@extends('layouts.jury.app')
@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('jury') }}">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">

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
          <div class="col-md-10">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Add Image</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
                    <form class="form-horizontal" action="/jurys/blog" method="post" enctype="multipart/form-data">
                    @csrf  
                      <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Titre</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="title" placeholder="Titre blog">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="soustitle" class="col-sm-2 col-form-label">Sous-titre</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="soustitle" placeholder="Sous-titre">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="images" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="images">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="contenu" class="col-sm-2 col-form-label">Contenu</label>
                        <div class="col-sm-10">
                            <textarea id="summernote" name="contenu"></textarea>
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
