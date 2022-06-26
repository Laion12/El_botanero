const cargador=document.querySelector(".cargador_contenedor");
window.addEventListener("load",()=>{
    setTimeout(()=>{
        cargador.classList.add("desaparecer_cargador");
        setTimeout(()=>{
            cargador.style.display="none";
        },1000);
    },6800);
});
