
const collegamento="https://www.cheapshark.com/redirect?dealID=";


function onResponse(response){  
    return response.json();
}


function ricerca_gioco(event){
    event.preventDefault();
    const testo=document.querySelector('#contenuto').value;
    const testoCodificato=encodeURIComponent(testo);
    fetch(BASE_URL+"/api/shop/"+encodeURIComponent(testoCodificato)).then(onResponse).then(visualizza_giochi);
}


function visualizza_giochi(json){
    console.log(json);

    const giochi=document.querySelector('#giochi_shop');
    giochi.innerHTML="";
    if(json[0].content===false){
        const noElement=document.createElement('h1');
        noElement.textContent="Non ho trovato nessun gioco" ;
        giochi.appendChild(noElement);
        const arrow_up=document.querySelector("#arrow");
        arrow_up.classList.remove("attivo");
        arrow_up.classList.add("hidden");
        arrow_up.removeEventListener("click",risali);
    }
    
    else{
        for(let result of json){

            const negozio=document.createElement("img");
            negozio.classList.add("acquisto");

            if(result.carrello==true){
                
                negozio.src="./immagini/cestino.png";
                negozio.addEventListener('click',rimuoviCarrello);
    
            }else{
                
                negozio.src="./immagini/AggiungiCarrello.png";
                negozio.addEventListener('click',aggiungiCarrello);
            }
            const Container=document.createElement('div');

            const img=document.createElement('img');
            img.classList.add("img");
            const nomeGioco=document.createElement('a');
            const prezzo=document.createElement('p');
            const idGioco=document.createElement('u');
            idGioco.classList.add("hidden");

            idGioco.textContent=result.gameID;

            prezzo.textContent="$"+result.Prezzo;
            nomeGioco.textContent=result.Titolo;
            nomeGioco.href=collegamento+result.cheapestDealID;
            nomeGioco.target="_blank";
            img.src=result.Copertina;

            Container.appendChild(idGioco);
            Container.appendChild(img);
            Container.appendChild(nomeGioco);
            Container.appendChild(prezzo);
            Container.appendChild(negozio);
            giochi.appendChild(Container); 


        }
        const arrow_up=document.querySelector("#arrow");
        arrow_up.classList.remove("hidden");
        arrow_up.classList.add("attivo");
        arrow_up.addEventListener("click",risali);

       
    }
}

function risali(){
    window.scroll({
        top: 250, 
        left: 0, 
        behavior: 'smooth'
      });

}


const form=document.querySelector('#ricerca');
form.addEventListener('submit',ricerca_gioco);