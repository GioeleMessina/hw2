@extends('layouts.style')

@section('title', '| Carrello')

@section('style')
<link rel="stylesheet" href='{{ url('css/ShopCss.css') }}'/>
@endsection

@section('script')
<script src='{{ url('scripts/visualizzaCarrello.js') }}' defer></script>

@endsection

@section('menu')
    <div id="menu">
        <a id="home"href='{{ route('home') }}'>Home</a>
        <a id="cerca" href='{{ route('cercaGiochi') }}'>Cerca Giochi</a>
        <a id="preferiti" href='{{ route('preferiti') }}'>Preferiti</a>
        <a id="logout" href='{{ route('logout') }}'>Logout</a>
    </div>
@endsection

@section('content')
<div id="link">
    <a  id='linkLibreria' href='{{ route('miaLibreria') }}'>La mia libreria</a>
    <img id='libreria'src='{{ url('immagini//libreria.PNG') }}'/>
</div>

    
    
<div id="shop">
    <a href='{{route('shop') }}'>Continua i tuoi acquisti nello store</a>
</div>
<div id="titoloShop">
    <h1><strong>Ecco il tuo carrello {{ $username['userID'] }}</strong></h1>
</div>
<div id="giochi_shop"> </div>
    
@endsection