<link rel = "stylesheet" type = "text/css" href = "style.css"> 
 <?php
    if(isset($_POST['user']))
        echo $loginError;
?>
 <div id = "reg"> 
        <h1>Bejelentkezés</h1>  
        <form name="f1" action="index.php?page=login" method = "post">  
            <p>  
                <label> Felhasználó: </label>  
                <input type = "text" class="form-control" name  = "user" required/>  
            </p>  
            <p>  
                <label> Jelszó: </label>  
                <input type = "password" class="form-control" name  = "pw" required/>  
            </p>  
            <p>     
                <input type = "submit" class="btn mb-2" style="background-color:#228B22; color:white;" value = "Belépés" />  
            </p>  
        </form>  
    </div>
    
