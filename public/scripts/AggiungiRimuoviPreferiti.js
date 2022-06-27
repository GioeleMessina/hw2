function rimuoviPreferiti(event){
    const bottone=event.currentTarget;
    bottone.classList.add("buttonCurrent");
    const titolo=event.currentTarget.parentNode.querySelector("h1");

    fetch(BASE_URL+"/preferiti/remove/"+encodeURIComponent(titolo.textContent)).then(onResponsePref).then(onJsonRim);
}

function aggiungiPreferiti(event){
    const bottone=event.currentTarget;
    bottone.classList.add("buttonCurrent");
    const img=event.currentTarget.parentNode.querySelector("img");
    const titolo=event.currentTarget.parentNode.querySelector("h1");
    const copertina=img.src;

    const form_data=new FormData();
    form_data.append('titolo',titolo.textContent);
    form_data.append('copertina',copertina);
    form_data.append('_token',csrf_token);
    fetch(BASE_URL+"/preferiti/add",{method:'post',body:form_data}).then(onResponsePref).then(onJsonAgg);

}

function onResponsePref(response){
    console.log(response);
    return response.json();
}

function onJsonAgg(json){
    
    if(json.aggiunto===true){
        console.log(json);
        const bottone=document.querySelector(".buttonCurrent");
        bottone.textContent="Rimuovi preferiti";
        bottone.removeEventListener("click",aggiungiPreferiti);
        bottone.addEventListener("click",rimuoviPreferiti);
        bottone.classList.remove("buttonCurrent");
    }
}

function onJsonRim(json){
    
    if(json.rimosso===true){
        console.log(json);
        const bottone=document.querySelector(".buttonCurrent");
        bottone.textContent="Aggiungi preferiti";
        bottone.removeEventListener("click",rimuoviPreferiti);
        bottone.addEventListener("click",aggiungiPreferiti);
        bottone.classList.remove("buttonCurrent");
    }
}