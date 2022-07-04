// const doc=document;
// export default function buscar(input,selector,selector2){
//     document.addEventListener("keyup", (e)=>{
//         console.log(e.key);
//         console.log(selector);
//         if(e.target.matches(input)){
//             //doc.querySelectorAll(selector).forEach((se)=>se.textContent.toLowerCase().includes(e.target.value)?se.classList.remove("filtro"):se.classList.add("filtro"));
//             var res=doc.querySelectorAll(selector).forEach(titulo =>{
//                 titulo.textContent.toLowerCase().includes(e.target.value.toLowerCase())
//                 ?true
//                 :false
//                 if(res==true){
//                     selector.classList.remove("filtro");
//                     selector2.classList.remove("filtro");
//                 }else{
//                     selector.classList.add("filtro");
//                     selector2.classList.add("filtro");
//                 }
//             })
//         }
//     });
// }