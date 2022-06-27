function rimuoviLibreria(event){
    const bottone=event.currentTarget;
    bottone.classList.add("buttonCurrent");
    const titolo=event.currentTarget.parentNode.querySelector("h1");
    fetch(BASE_URL+"/miaLibreria/remove/"+encodeURIComponent(titolo.textContent)).then(onResponseLib).then(onJsonRimLib);
}

function aggiungiLibreria(event){
    const bottone=event.currentTarget;
    bottone.classList.add("buttonCurrent");
    const img=event.currentTarget.parentNode.querySelector("img");
    const titolo=event.currentTarget.parentNode.querySelector("h1");
    const copertina=img.src;
    const form_data=new FormData();
    form_data.append('titolo',titolo.textContent);
    form_data.append('copertina',copertina);
    form_data.append('_token',csrf_token);
    fetch(BASE_URL+"/miaLibreria/add",{method:'POST',body:form_data}).then(onResponseLib).then(onJsonAggLib);

}

function onResponseLib(response){
    console.log(response);
    return response.json();
}

function onJsonAggLib(json){
    console.log(json);
    if(json.aggiunto===true){
        console.log(json);
        const bottone=document.querySelector(".buttonCurrent");
        bottone.textContent="Rimuovi dalla libreria";
        bottone.removeEventListener("click",aggiungiLibreria);
        bottone.addEventListener("click",rimuoviLibreria);
        bottone.classList.remove("buttonCurrent");
    }
}

function onJsonRimLib(json){
    
    if(json.rimosso===true){
        console.log(json);
        const bottone=document.querySelector(".buttonCurrent");
        bottone.textContent="Aggiungi alla tua libreria";
        bottone.removeEventListener("click",rimuoviLibreria);
        bottone.addEventListener("click",aggiungiLibreria);
        bottone.classList.remove("buttonCurrent");
    }
}