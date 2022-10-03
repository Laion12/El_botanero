import {quitar_cargador} from "./modulos/cargador.js";
import buscar from "./modulos/buscador.js";
import bloquear_imagen  from "./modulos/block_img.js";
import form_enviar from "./modulos/ajax.js";

const doc=document;
doc.addEventListener("DOMContentLoaded",(e)=>{
    buscar(".buscador","catalogo_item");
    bloquear_imagen();
    form_enviar();
 });
const cargador1=doc.querySelector(".cargador_contenedor");
window.addEventListener("load", ()=>{
    quitar_cargador(cargador1);
});
const main_scroll =doc.getElementById('i_contenedor');
const menu =doc.getElementById('menu');
main_scroll.addEventListener("scroll",()=>{
    let $head=doc.querySelector(".i_head").getBoundingClientRect().bottom;
    menu.classList.toggle("animation_mov",$head<0);
});
