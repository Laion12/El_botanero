import {quitar_cargador} from "./modulos/cargador.js";

const cargador1=document.querySelector(".cargador_contenedor");
window.addEventListener("load", ()=>{
    quitar_cargador(cargador1);
});