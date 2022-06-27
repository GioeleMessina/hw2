function aggiungiCarrello(event){
    
    const cestino=event.currentTarget;
    cestino.classList.add("cestinoCurrent");
    const img=event.currentTarget.parentNode.querySelector("img");
    const nomeGioco=event.currentTarget.parentNode.querySelector("a");
    const id=event.currentTarget.parentNode.querySelector("u");
    const costo=event.currentTarget.parentNode.querySelector("p");

    const form_data=new FormData();
    form_data.append('titolo',nomeGioco.textContent);
    form_data.append('copertina',img.src);
    form_data.append('idGioco',id.textContent);
    form_data.append('costo',costo.textContent);
    form_data.append('_token',csrf_token);

    fetch(BASE_URL+"/carrello/add",{method:'post',body:form_data}).then(onResponseCarrello).then(onJsonAgg);


}

function rimuoviCarrello(event){

    const cestino=event.currentTarget;
    cestino.classList.add("cestinoCurrent");
    const id=event.currentTarget.parentNode.querySelector("u");
    fetch(BASE_URL+"/carrello/remove/"+encodeURIComponent(id.textContent)).then(onResponseCarrello).then(onJsonRim);
}

function onResponseCarrello(response){
    return response.json();
}

function onJsonRim(json){
    if(json.rimosso===true){
        console.log(json);
        const cestino=document.querySelector(".cestinoCurrent");
        cestino.src="./immagini/AggiungiCarrello.png";
        cestino.removeEventListener("click",rimuoviCarrello);
        cestino.addEventListener("click",aggiungiCarrello);
        cestino.classList.remove("cestinoCurrent");
    }
}


function onJsonAgg(json){

    if(json.aggiunto===true){
        console.log(json);
        const cestino=document.querySelector(".cestinoCurrent");
        cestino.src="./immagini/cestino.png";
        cestino.removeEventListener("click",aggiungiCarrello);
        cestino.addEventListener("click",rimuoviCarrello);
        cestino.classList.remove("cestinoCurrent");
    }
}