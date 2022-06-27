@extends('layouts.style')

@section('title', '| Preferiti')


@section('script')
<script src='{{ url('scripts/VisualizzaPreferiti.js') }}' defer></script>
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
    <a  id='linkLibreria' href='{{ route('miaLibreria') }}'>La mia libreria</a>
    <img id='libreria'src='{{ url('immagini//libreria.PNG') }}'/>
</div>
<div id="titoloPreferiti">
    <h1><strong>Ecco qui i tuoi giochi preferiti {{ $username['userID'] }}</strong></h1>
</div>
<div id="giochi_preferiti"> </div>
@endsection
