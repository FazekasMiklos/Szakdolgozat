<!DOCTYPE html>
<html lang="HU"> 
<head>   
    <link rel = "stylesheet" type = "text/css" href = "style.css">   
</head>  
<body>  
    <div id = "frm">  
        <h1>Bejelentkezés</h1>  
        <form name="f1" action = "login.php" onsubmit = "return validation()" method = "POST">  
            <p>  
                <label> Felhasználó: </label>  
                <input type = "text" id ="user" name  = "user" />  
            </p>  
            <p>  
                <label> Jelszó: </label>  
                <input type = "password" id ="pass" name  = "pass" />  
            </p>  
            <p>     
                <input type =  "submit" id = "btn" value = "Belépés" />  
            </p>  
        </form>  
    </div>  
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("A felhasználó és jelszó mező üres");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("A felhasználó mező üres");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("A jelszó mező üres");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>     
</html>  