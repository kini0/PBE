@extends('layouts.admin.app')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <main class="container">
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark img-fluid" style="background-image: url('/storage/{{$blogs->images}}');background-repeat: no-repeat;
        background-attachment: scroll;
        background-position: center;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;min-height: 350px;">
    <div class="col-md-6 px-0" style="background-color: rgba(0, 0, 0, 0.6);">
      <h1 class="display-4 fst-italic p-md-2">| {{$blogs->title}}</h1>
      <p class="lead my-2 p-md-2">{{$blogs->soustitle}}</p>
      
    </div>
  </div>
  <div class="row g-5">
    <div class="col-md-8">
    <h3 class="pb-4 mb-4 fst-italic border-bottom container-fluid">
      Crée le:{{$blogs->created_at}}
      </h3>

      <article class="blog-post container-fluid">
        {!!$blogs->contenu!!}
     </article>

        
    </div>
    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic">AUTEUR</h4>
          <p class="mb-0">{{$blogs->name}}</p>
          <P class="mb-0">{{$blogs->email}}</P>
          <a href="/admins/blog-edit/{{ $blogs->id }}" class="btn btn-primary">Edit Blog</a>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Archives</h4>
          @foreach($articles as $article)
          <ol class="list-unstyled mb-0">
            <li><a href="/admins/blog/{{$article->id}}/{{$article->title}}">{{$article->title}}</a></li>
          </ol>
          @endforeach
        </div>
      </div>
    </div>
  </div>

</main>

    

    

    </div>

@endsection
