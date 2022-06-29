import {quitar_cargador} from "./modulos/cargador.js";
import {menu_movimiento} from "./modulos/menu.js";

const cargador1=document.querySelector(".cargador_contenedor");
window.addEventListener("load", ()=>{
    quitar_cargador(cargador1);
});

const main_scroll =document.getElementById('i_contenedor')
const menu =document.getElementById('menu');
const lista =document.querySelectorAll('.menu_text');
const ventana =window.innerHeight;
var $head=document.querySelector(".i_head").getBoundingClientRect().bottom;
//main_scroll.addEventListener("scroll",()=>{
    //menu_movimiento(menu,lista,ventana,$head);
//});