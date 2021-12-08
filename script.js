function autolog()
{
    const http=new XMLHttpRequest();
    const url="autologin.php";
    http.onreadystatechange= function()
    {
        if(this.readyState == 4 && this.status==200)
        {
            console.log(this.responseText);
            document.getElementById("logid").value=this.responseText;
            if(this.responseText=="")
            {
                window.location.href ="login.html";
            }
        }
    }  

    http.open("GET",url);
    http.send(); 
}

function cerrarsesion()
{   
    document.getElementById("logid").value="";
    const http=new XMLHttpRequest();
    const url="logout.php";
    http.onreadystatechange= function()
    {
        if(this.readyState == 4 && this.status==200)
        {
            console.log(this.responseText);
            window.location.href ="login.html";
        }
    }  

    http.open("GET",url);
    http.send(); 
} 


function val_login()
{
        let correo,contraseña; 
        correo=document.getElementById("email").value;
        contraseña=document.getElementById("pass").value;
        document.getElementById("btnlogin").style.display="none";
        document.getElementById("loading").style.display="block";
        const http=new XMLHttpRequest();
        const url="iniciarsesion.php?email="+correo+"&pass="+contraseña;
        if(correo=="" || contraseña=="")
        {   document.getElementById("btnlogin").style.display="";
        document.getElementById("loading").style.display="none";
            alert("Ingrese un usuario y contraseña para iniciar sesión");
    
        } else
        { 
            http.onreadystatechange= function()
        {
            if(this.readyState == 4 && this.status==200)
            {
                console.log(this.responseText);
                if(this.responseText=="El correo y contraseña no coinciden")
                {  
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El usuario y la contraseña no coinciden'
                      })

                      document.getElementById("btnlogin").style.display="";
                      document.getElementById("loading").style.display="none";
                } else
                {  
                      window.location.href ="index.php";
                }
            }
        }  
    
        http.open("GET",url);
        http.send(); 

        }
        
}  

function registrar()
{   
    let email=document.getElementById("email").value; 
    let pass=document.getElementById("pass").value; 
     
    document.getElementById("btnregistrar").style.display="none";
    document.getElementById("loading").style.display="block";

    if(email==""||pass=="")
    { 
        document.getElementById("btnregistrar").style.display="";
        document.getElementById("loading").style.display="none";
        alert("Ingrese los datos paras hacer el registro");
    } else
    {  
        if(validarusuario())
        {
            const http=new XMLHttpRequest();
            const url="registro.php?email="+email+"&pass="+pass;
            http.onreadystatechange= function()
            {
                if(this.readyState == 4 && this.status==200)
                {
                    console.log(this.responseText);
                    if(this.responseText=="")
                    {
                        window.location.href ="login.html";
                    } else{ 
                            alert(this.responseText); 
                            document.getElementById("btnregistrar").style.display="";
                            document.getElementById("loading").style.display="none";
                    }
                }
            }  
        
            http.open("GET",url);
            http.send(); 
        } else
        {
            document.getElementById("btnregistrar").style.display="";
                            document.getElementById("loading").style.display="none";
        }
     
    }

}  

function eliminarcuenta()
{   let id=document.getElementById("logid").value;
    Swal.fire({
        title: 'Seguro que desea eliminar la cuenta?',
        text: "Esto borará la base de datos",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          
            const http=new XMLHttpRequest();
            const url="eliminarcuenta.php?id="+id;
            http.onreadystatechange= function()
            {
                if(this.readyState == 4 && this.status==200)
                {
                    console.log(this.responseText);
                    
                    if(this.responseText=="Record deleted successfully")
                    {
                        window.location.href ="login.html";
                    }
                }
            }  
        
            http.open("GET",url);
            http.send(); 
        }
      })
}

function validarusuario()
{
    let email=document.getElementById("email").value.trim(); 
    var expr=/^[0-9a-z]+$/;
    if(expr.test(email))
    {  
        return true;
    } else
    {
        alert("El nombre usuario debe contener solo letras minusculas y numeros sin espacios");
        return false; 
    } 
}
