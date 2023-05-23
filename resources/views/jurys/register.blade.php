@extends('layouts.connection.app')

@section('content')

<div id="Form_Connect1">
        <div id="logo">
            <a href="/"><img src="{{ asset('images/LOGO PROGRAMME BOURSES.png') }}" width="130" title="retour accueil" /></a>
        </div>
    <div id="tableauform">
        <form method="POST" action="{{ route('register') }}">
        @csrf
            <i class="fa fa-user" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Nom Utilisateur</label>
            <span class="Style290">
                <input type="text" id="user_field" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <input type="hidden" name="role" value="2">
                <input type="hidden" name="year" value="{{ date('Y') }}">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Email Address</label>
                <input type="email" id="user_field" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <i class="fa fa-key" style="font-size:14px; color:#343995"></i><label for="mdp" class="Style20" style="color:#343995"> Mot de passe</label>
            </span>
            <input type="password" id="mdp" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <i class="fa fa-key" style="font-size:14px; color:#343995"></i><label for="password-confirm" class="Style20" style="color:#343995"> Confirmation Mot de passe</label>
            <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">

            <input type="submit" name="submit" value="Register"><br/>

        </form>
    </div>

    <div class="Style25" id="Mdpoubli1">
       <!-- <a id="bt_forget_password" href="{{ route('password.request') }}">Mot de passe oublié ?</a>-->
        <a id="" href="{{ route('login') }}">Se connecter</a>
    </div>

    </div>

@endsection
