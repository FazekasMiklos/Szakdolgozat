<link rel = "stylesheet" type = "text/css" href = "style.css"> 
 <?php
    if(isset($_POST['user']))
        echo $loginError;
?>
 <div id = "btn"> 
        <h1>Bejelentkezés</h1>  
        <form name="f1" action="index.php?page=login" method = "post">  
            <p>  
                <label> Felhasználó: </label>  
                <input type = "text" name  = "user" required/>  
            </p>  
            <p>  
                <label> Jelszó: </label>  
                <input type = "password" name  = "pw" required/>  
            </p>  
            <p>     
                <input type = "submit" value = "Belépés" />  
            </p>  
        </form>  
    </div>
    
