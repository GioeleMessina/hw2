@extends('layouts.style')

@section('title', '| Libreria')


@section('script')
<script src='{{ url('scripts/VisualizzaMiaLista.js') }}' defer></script>
@endsection

@section('menu')
<div id="menu">
    <a id="home"href='{{ route('home') }}'>Home</a>
    <a id="cerca"href='{{ route('cercaGiochi') }}'>Cerca Giochi</a>
    <a id="shop" href='{{ route('shop') }}'>Shop</a>
    <a id="logout" href='{{ route('logout') }}''>Logout</a>

</div>
@endsection

@section('content')
<div id="link">
    <a  id='linkPreferiti' href='{{ route('preferiti') }}'>I miei prefiriti</a>
    <img id='stella'src='{{ url('immagini//Places-favorites-icon.PNG') }}'/>
</div>
<div id="titoloPreferiti"> 
    <h1><strong></strong></h1>
</div>
<div id="giochi_libreria"> </div>
@endsection