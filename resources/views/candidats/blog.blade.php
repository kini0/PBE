@extends('layouts.candidat.app1')
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
            <li class="breadcrumb-item"><a href="{{ route('candidat') }}">Home</a></li>
            <li class="breadcrumb-item active">Blog</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-right">
          <a href="/candidats/blog-create" class="btn btn-primary" style="margin-bottom: 10px;">
            Add Blog
          </a>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <main class="container">
    <div class="row mb-2">
      @foreach($blogs as $blog)
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Actualité Benianh</strong>
            <h3 class="mb-0">{{$blog->title}}</h3>
            <div class="mb-1 text-muted">{{$blog->created_at}}</div>
            <p class="card-text mb-auto">{{$blog->soustitle}}</p>
            <a href="/candidats/blog/{{$blog->id}}/{{$blog->title}}">Continue de lire</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img src="{{ asset('/storage/'.$blog->images)}}" class="img-fluid rounded" width="200" height="600" alt="...">
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </main>

</div>

@endsection