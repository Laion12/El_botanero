export function menu_movimiento(m,l,v,h){
        var h=v;
        var m1=m;
        var l1=l;
        var h1=h;
        console.log(h1);
        if(h1<=(h-100) & h1>=(h-1100)){
            m1.classList.add("menu_mov");
            l1.classList.add("text_mov");
        }else{
            m1.classList.remove("menu_mov");
            l1.classList.remove("text_mov");
        }
}