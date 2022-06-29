export function quitar_cargador(cargador){
    setTimeout(()=>{
        cargador.classList.add("desaparecer_cargador");
        setTimeout(()=>{
            cargador.style.display="none";
        },800);
    },6000);
}
