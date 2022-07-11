import {quitar_cargador} from "./modulos/cargador.js";
import buscar from "./modulos/buscador.js";

const doc=document;
 doc.addEventListener("DOMContentLoaded",(e)=>{
    var prueba=doc.getElementsByClassName("catalogo_item");
    console.log(prueba);
    buscar(".buscador","catalogo_item");

 });
const cargador1=doc.querySelector(".cargador_contenedor");
window.addEventListener("load", ()=>{
    quitar_cargador(cargador1);
});

const main_scroll =doc.getElementById('i_contenedor');
const menu =doc.getElementById('menu');
main_scroll.addEventListener("scroll",()=>{
    var $head=doc.querySelector(".i_head").getBoundingClientRect().bottom;
    menu.classList.toggle("animation_mov",$head<0);
});
