@extends('layouts.jury.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chats</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('jury') }}">Home</a></li>
                            <li class="breadcrumb-item active">chats</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        @foreach($userlistes as $list)
                            <a class="list-group-item" href="/jurys/messagerie/{{$list->id}}">{{$list->name}}</a>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>

    </div>
@endsection
