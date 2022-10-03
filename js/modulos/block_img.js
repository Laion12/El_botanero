const doc=document;
export default function bloquear_imagen(){   
    doc.addEventListener("contextmenu",(e)=>{
    e.preventDefault();
});
}