export default function form_enviar(){
    const form_ajax=document.querySelectorAll(".form_data");
    function enviar_form(e){
        e.preventDefault();
        let msg=confirm("Quieres enviar el formulario?");
        if(msg==true){
            let data= new FormData(this);
            let method1= this.getAttribute("method");
            let action= this.getAttribute("action");

            let encabezado= new Headers();
            let config={
                method:method1,
                headers:encabezado,
                mode:'cors',
                cache:'no-cache',
                body:data
            };
            fetch(action,config)
            .then(respuesta => respuesta.text())
            .then(respuesta =>{ 
                if(respuesta== '{"success":1}' || respuesta== '{"success":2}'){
                    let jsonData = JSON.parse(respuesta);
                    if (jsonData.success == "1"){
                        alert("Usuario creado exitosamente");
                        location.href = 'login.html';
                        exit();
                    }
                    if (jsonData.success == "2"){
                        alert("Inicio de sesion correcto");
                        location.href = '../php/vistas/administrador.php';
                        exit();
                    }
                    exit();
                }
                alert(respuesta);
            });
        }else{
            alert("datos descartados");
        }
    }
    form_ajax.forEach(formularios=>{
        formularios.addEventListener("submit",enviar_form);
    });
}