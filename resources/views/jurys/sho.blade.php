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
                @include('/jurys/sho', ['userlistes'=> $userlistes])
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">{{$list->name}}</div>
                        <div class="card-body conversations">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
