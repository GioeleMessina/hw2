@extends('layouts.login_signup')

@section('script')
<script src='{{ url('scripts/LoginJs.js') }}' defer></script>
@endsection

@section('content')
<h1>LOGIN:</h1>
<form id="form" name="login" method="post"  action="{{ route('login')}}">
    @csrf
    <label>UserName <input type='text' name='user'></label>
    <label>Password <input type='password' name='password'></label>
    <label id="ricerca">&nbsp;<input id="submit" type='submit'></label>
    @if(isset($error))
        <div id=errore>
            <h1>{{ $error }}</h1>
        </div>
    @endif
</form>
<a href='{{route('registrazione')}}' >Registrati se non hai un account</a>
@endsection
