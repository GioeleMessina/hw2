@extends('layouts.login_signup')

@section('script')
<script src='{{ url('scripts/RegistrazioneJs.js') }}' defer></script>
<script type="text/javascript">
    const SIGNUP_ROUTE = "{{route('registrazione')}}";
</script>

@endsection


@section('content')
<h1>Inserisci i tuoi dati:</h1>
<form id="form" name='registrazione' method='post' action="{{ url('registrazione') }}">
    @csrf
    <label id="labelNome">Nome <input id="inputNome" type='text' name='nome' value= '{{ old('nome') }}'></label><div id="erroreNome"></div>
    <label >Cognome <input id="inputCognome"  type='text' name='cognome' value= '{{ old('cognome') }}'></label><div id="erroreCognome"></div>
    <label>email <input id="inputEmail"type='text' name='email' value= '{{ old('email') }}'></label><div id="erroreEmail"></div>
    <label >userID <input id="inputID" type='text' name='IDuser' value= '{{ old('IDuser') }}'></label><div id="erroreUser"></div>
    <label>Password <input id="inputPassword" type='password' name='password'></label><div id="errorePassword"></div>
    <label>Conferma Password <input id="inputConfermaPass"type='password' name='ConfermaPassword'></label><div id="erroreConferma"></div>
    <label id="ricerca">&nbsp;<input  id="submit"type='submit' {{-- disabled --}}></label>

</form>
<a href='{{ url('login') }}'>Torna al login</a>
@endsection