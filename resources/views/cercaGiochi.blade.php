@extends('layouts.style')

@section('title', '| Cerca_Giochi')
@section('script')
<script src='{{ url('scripts/ApiCercaGiochi.js') }}' defer></script>
<script src='{{ url('scripts/AggiungiRimuoviPreferiti.js') }}' defer></script>
<script src='{{ url('scripts/AggiungiRimuoviLibreria.js') }}' defer></script>
<script type="text/javascript">
    const csrf_token= "{{csrf_token()}}";
</script>
@endsection

@section('menu')
    <div id="menu">
        <a id="home"href='{{ route('home') }}'>Home</a>
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
    <div id="titoloCercaGiochi">
        <h1><strong>Non sai a cosa giocare? Prendi spunto da qui per il tuo prossimo gioco </strong></h1>
    </div>
    
    <form id="form">
        Genere:
        <select id="genere" name='genere'>
            <option value='action'>Azione</option>
            <option value='adventure'>Avventura</option>
            <option value='role-playing-games-rpg'>RPG</option>
            <option value='shooter'>Sparatutto</option>
            <option value='puzzle'>Puzzle</option>
            <option value='strategy'>Strategia</option>
        
        </select>
    
        Console:
        <select id="console" name='console'>   
            <option value='4'>PC</option>
            <option value='1'>Xbox One</option>
            <option value='186'>Xbox Series S/X</option>
            <option value='14'>Xbox 360</option>
            <option value='18'>PlayStation 4</option>
            <option value='187'>PlayStation 5</option>
            <option value='7'>Nintendo Switch </option>
            
        </select>
        
        <label>&nbsp;<input id="submit" type='submit'  ></label>
    
    </form>
    
    <div id="elenco_giochi"> </div>
    
    <div id="bottoni">
        <a id="precedente" class="hidden" >Precedente</a>
        <a id="successivo" class="hidden">Successivo</a>
    
    </div>
@endsection