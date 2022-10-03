const doc=document;
export default function buscar(input,selector){
    doc.addEventListener("keyup", (e)=>{
        if(e.target.matches(input)){
            let prueba=doc.getElementsByClassName(selector);
            for(let i=0;i<prueba.length;i++){
                if(prueba[i].childNodes[3].textContent.toLowerCase().includes(e.target.value)){
                    prueba[i].classList.remove("filtro");
                }else{
                    prueba[i].classList.add("filtro");
                }
            }
        }
    });
}