@extends('layouts.candidat.app1')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>{{$recept->name}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('candidat') }}">Home</a></li>
                            <li class="breadcrumb-item active">chats</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Content Wrapper. Contains page content -->
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        @foreach($userlistes as $list)
                            <a class="list-group-item" href="/candidats/messagerie/{{$list->id}}">{{$list->name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">{{$recept->name}}</div>
                        <div class="card-body conversations">
                            @foreach($messages as $mgs)
                                <div class="row" style="height: auto;
                                                    display: flex;
                                                    
                                                    background: #f7f7f7;
                                                    box-shadow: inset 0 32px 32px -32px rgba(0 0 0 / 5%),
                                                                inset 0 -32px 32px -32px rgba(0 0 0 / 5%);"
                                            >
                                    <div style="overflow: auto;">
                                        @if($mgs->id_emett == Auth::User()->id)
                                        <p style="
                                            
                                            background: #333;
                                            color: #fff;
                                            border-radius: 18px 18px 0 18px;
                                            margin-left: auto;
	                                        max-width: calc(100% - 130px);
                                            word-wrap: break-word;
                                            padding: 8px 16px;
                                            box-shadow: 0 0 32px rgba(0 0 0 / 8%),
                                                        0 16px 16px -16px rgba(0 0 0 / 10%);
                                            

                                        ">
                                            
                                                {{ $mgs->message }}
                                        
                                        </p>
                                        @else
                                        <p style="
	                                        align-items: flex-end
                                            color: #333;
                                            background: #fff;
                                            border-radius: 0px 18px 18px 18px;
                                            margin-left: 10px
                                            margin-right: auto;
                                            max-width: calc(100% - 130px);
                                            word-wrap: break-word;
                                            padding: 8px 16px;
                                            box-shadow: 0 0 32px rgba(0 0 0 / 8%),
                                                        0 16px 16px -16px rgba(0 0 0 / 10%);                                            

                                        ">
                                        {{ $mgs->message }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            <form action="/candidats/sends/{{$recept->id}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="form-group">
                                    <!--<textarea id="summernote1" name="message"></textarea>-->
                                    <input type="texte" name="message" placeholder="Type Message ..." class="form-control @error('message') is-invalid @enderror" value="{{ old('message') }}" required autocomplete="message" autofocus></input>
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary">Send</button>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-2"> </div>
            </div>

    </div>
@endsection
