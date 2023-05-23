@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tableau de bord ou je dois pas atterir') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Vous êtes connecté!') }}
                    <form method="POST" action="{{ route('logout')}}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit()">
                        {{ __('Log Out') }}
                        </a>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>



@endsection
