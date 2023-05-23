@extends('layouts.connection.app')

@section('content')

<div id="Form_Connect">
        <div id="logo">
            <a href="/"><img src="{{ asset('images/LOGO PROGRAMME BOURSES.png') }}" width="130" title="retour accueil" /></a>
        </div>
    <div id="tableauform">
        <form method="POST" action="{{ route('login') }}">
        @csrf
            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Email Address </label>
            <span class="Style290">
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <i class="fa fa-key" style="font-size:14px; color:#343995"></i><label for="mdp" class="Style20" style="color:#343995"> Mot de passe</label>
            </span>
            <input type="password" id="mdp" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><br />
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                <br />
            <input type="submit" name="submit" value="Connexion">

        </form><br />
    </div>
        
    <div class="Style25" id="Mdpoubli">
        <a id="bt_forget_password" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
        <a id="" href="{{ route('register') }}">S'inscrire</a>
    </div>

</div>

@endsection