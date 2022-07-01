import {quitar_cargador} from "./modulos/cargador.js";

const cargador1=document.querySelector(".cargador_contenedor");
window.addEventListener("load", ()=>{
    quitar_cargador(cargador1);
});

const main_scroll =document.getElementById('i_contenedor');
const menu =document.getElementById('menu');
main_scroll.addEventListener("scroll",()=>{
    var $head=document.querySelector(".i_head").getBoundingClientRect().bottom;
    menu.classList.toggle("animation_mov",$head<0);
});