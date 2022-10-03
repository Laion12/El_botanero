export function quitar_cargador(cargador){
    let saludar="Hola, bienvenido al sitio oficial, el botanero";
    setTimeout(()=>{
        cargador.classList.add("desaparecer_cargador");
        setTimeout(()=>{
            cargador.style.display="none";
            const saludo= (texto) =>speechSynthesis.speak(new SpeechSynthesisUtterance(texto));
            saludo(saludar);
        },800);
    },2000);
}
