fetch(BASE_URL+"/miaLibreria/mostraLibreria").then(onResponse).then(onJson);


function onJson(json){
    console.log(json);
    const giochi_libreria=document.querySelector('#giochi_libreria');
    giochi_libreria.innerHTML="";
    
    if(json==""){
        $titolo=document.querySelector('#titoloPreferiti h1');
        $titolo.textContent="Non hai ancora nessun gioco nella libreria";
    }
    else{
        $titolo=document.querySelector('#titoloPreferiti h1');
        $titolo.textContent='Ecco qui i giochi in tuo possesso';
    }

    for(let result of json){
        const Container=document.createElement('div');
        const titolo=document.createElement('h1');
        const img=document.createElement('img');
        const bottone=document.createElement("button");
        
        bottone.textContent="Rimuovi dalla libreria";
        bottone.classList.add("preferiti");
        bottone.addEventListener("click",rimuoviLista);

        img.src=result.copertina;
        titolo.textContent=result.titolo;
        Container.appendChild(img);
        Container.appendChild(titolo);
        Container.appendChild(bottone);
        giochi_libreria.appendChild(Container);
    }
    
}

function rimuoviLista(event){

    const titolo=event.currentTarget.parentNode.querySelector("h1");
    fetch(BASE_URL+"/miaLibreria/remove/"+encodeURIComponent(titolo.textContent)).then(onResponse).then(json); 
}

function onResponse(response){
    return response.json();
}

function json(json){
    fetch(BASE_URL+"/miaLibreria/mostraLibreria").then(onResponse).then(onJson);
    
}