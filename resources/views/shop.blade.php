@extends('layouts.style')

@section('title', '| Store')

@section('style')
<link rel="stylesheet" href='{{ url('css/ShopCss.css') }}'/>
@endsection

@section('script')
<script src='{{ url('scripts/apiShop.js') }}' defer></script>
<script src='{{ url('scripts/AggiungiRimuoviCarrello.js') }}' defer></script>
<script type="text/javascript">
    const csrf_token= "{{csrf_token()}}";
</script>
@endsection

@section('menu')
<div id="menu">
    <a id="home"href='{{ route('home') }}'>Home</a>
    <a id="cerca"href='{{ route('cercaGiochi') }}'>Cerca Giochi</a>
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
    <a href='{{ route('carrello') }}'>Carrello</a>
            <img src='{{ url('immagini//carrello.PNG') }}'/>
            
    </div>

    <div id="titoloShop">
        <h1><strong>Trova la migliore offerta per il tuo prossimo acquisto </strong></h1>
    </div>
    
    <div id="formShop"> 
        <form id="ricerca">
            <label id="label">Nome gioco: <input type='text' id='contenuto'></label>
            <input id="cerca" type="submit" value="ricerca">
        </form>
    </div>
    

    
    <div id="giochi_shop"> </div>
    <div id='risali'>
        <img id='arrow' class='hidden' src='{{ asset('immagini//arrow-up.PNG') }}'/>
    </div>
@endsection