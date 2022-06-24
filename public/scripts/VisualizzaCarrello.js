fetch(BASE_URL+"/carrello/mostraCarrello").then(onResponse).then(onJson);


function onResponse(response){
    return response.json();
}

function onJson(json){

    console.log(json);

    const giochi_shop=document.querySelector('#giochi_shop');
    giochi_shop.innerHTML="";
    const nElementi=document.createElement("h1");
    if(json.length===0){
        const noElement=document.createElement('h1');
        noElement.textContent="Il tuo carrello è vuoto" ;
        giochi_shop.appendChild(noElement);
    }
    else{
        for(let result of json){
            const cestino=document.createElement("img");
            cestino.src="./immagini/cestino.png";
            cestino.classList.add("acquisto");
            cestino.addEventListener("click",rimuoviDalCarrello);
            
            const Container=document.createElement('div');
            
            const img=document.createElement('img');
            img.classList.add("img");
            const nomeGioco=document.createElement('p');
            const prezzo=document.createElement('p');
            const idGioco=document.createElement('u');
            
            nElementi.textContent="Nel carrello ci sono: "+json.length+" elementi";
            
            idGioco.classList.add("hidden");
            idGioco.textContent=result.gameID;

            prezzo.textContent=result.costo;
            nomeGioco.textContent=result.titolo;
            idGioco.textContent=result.idGioco;
        
            img.src=result.copertina;
            Container.appendChild(idGioco);
            Container.appendChild(img);
            Container.appendChild(nomeGioco);
            Container.appendChild(prezzo);
            Container.appendChild(cestino);
            giochi_shop.appendChild(Container); 
            
        }
            giochi_shop.appendChild(nElementi); 
        
    }
    fetch(BASE_URL+"/carrello/calcolaCostoCarrello").then(onResponse).then(costoCarrello);
}

function costoCarrello(json){
    if(json!=0){
        const costoTotale=document.createElement("h1");
        const giochi_shop=document.querySelector('#giochi_shop');
        costoTotale.textContent="Costo complessivo: "+json+"$";
        giochi_shop.appendChild(costoTotale);
    }
}

function rimuoviDalCarrello(event){

    const idGioco=event.currentTarget.parentNode.querySelector("u");
    
    fetch(BASE_URL+"/carrello/remove/"+encodeURIComponent(idGioco.textContent)).then(onResponse).then(json); 

}


function json(json){
    fetch(BASE_URL+"/carrello/mostraCarrello").then(onResponse).then(onJson);
    
}