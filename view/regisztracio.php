<!--Regisztrációs panel-->
<div id="reg">
	<h1>Regisztráció</h1>
	<form action='index.php?page=register' method='POST'>
		<label>Felhasználónév:</label><br>
		<input type='text' class="form-control" name='user' id="user" required /><br>
		<label>Jelszó:</label><br>
		<input type='password' class="form-control" name='pass' id="pass" required /><br>
		<label>Email:</label><br>
		<input type='email' class="form-control" name='email' id="email" required /><br>
		<input type='submit' class="btn mb-2" style="background-color:#228B22; color:white;" name='sentForm' id="sentForm" value="Regisztrálás" />
	</form>
</div>
