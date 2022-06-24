@extends('layouts.style')

@section('title', '| Home')
@section('script')
<script src='{{ url('scripts/AggiungiRimuoviPreferiti.js') }}' defer></script>
<script src='{{ url('scripts/AggiungiRimuoviLibreria.js') }}' defer></script>
<script src='{{ url('scripts/ApiHomePage.js') }}' defer></script>
<script type="text/javascript">
    const csrf_token= "{{csrf_token()}}";
</script>
@endsection

@section('menu')
    <div id="menu">
        <a id="cerca" href='{{ route('cercaGiochi') }}'>Cerca Giochi</a>
        <a id="preferiti" href='{{ route('preferiti') }}'>Preferiti</a>
        <a id="shop" href='{{ route('shop') }}'>Shop</a>
        <a id="logout" href='{{ route('logout') }}'>Logout</a>
    </div>
@endsection

@section('content')
<div id="link">
    <a  id='linkLibreria' href='{{ route('miaLibreria') }}'>La mia libreria</a>
    <img id='libreria'src='{{ url('immagini//libreria.PNG') }}'/>
</div>
<div id="titolo">
    <h1>I GIOCHI PIU' APPREZZATI DALLA CRITICA</h1>
</div>
    
    <div id="ricerca_giochi"> </div>
    <div id="bottoni">
        <a id="precedente" class="hidden" >Precedente</a>
        <a id="successivo" class="hidden">Successivo</a>
    
    </div>
@endsection