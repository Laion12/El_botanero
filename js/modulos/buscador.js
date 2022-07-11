const doc=document;
export default function buscar(input,selector){
    //var prueba=doc.getElementsByClassName(selector);
    //console.log(prueba[0].childNodes[3].textContent);
    document.addEventListener("keyup", (e)=>{
        if(e.target.matches(input)){
            doc.querySelectorAll(selector).forEach((se)=>se. textContent.toLowerCase().includes(e.target.value)?se.classList.remove("filtro"):se.classList.add("filtro"));
            // var res=doc.querySelectorAll(selector).forEach(titulo =>{
            //     titulo.textContent.toLowerCase().includes(e.target.value.toLowerCase())
            //     ?true
            //     :false
            //     if(res==true){
            //         selector.classList.remove("filtro");
            //         selector2.classList.remove("filtro");
            //     }else{
            //         selector.classList.add("filtro");
            //         selector2.classList.add("filtro");
            //     }
            // })
            // var prueba=doc.getElementsByClassName(selector);
            // for(let i=0;i<prueba.length;i++){
            //     var prueba2=prueba[i].childNodes[3].textContent;
            //     if(prueba2.toLowerCase().includes(e.target.value)){
            //         prueba[i].classList.remove("filtro");
            //     }else{
            //         prueba[i].classList.add("filtro");
            //     }
            // }
        }
    });
}