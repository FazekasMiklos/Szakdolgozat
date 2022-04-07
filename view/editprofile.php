<!--A felhasználó itt tudja bevinni az új jelszavát/felhasználónevét/emailjét-->
<form action='index.php?page=profile' method='POST' enctype="multipart/form-data">
	<div id="btn">
		<div id="reg">
			<h2>Adatok módosítása</h2>
			<label for="user">Felhasználónév:</label> <br />
			<input type='text' name='user' id="user" required /><br />
			<label for="user">Jelszó:</label> <br />
			<input type='password' name='pass' id="pass" required /><br />
			<label for="user">Email:</label> <br />
			<input type='email' name='email' id="email" required /><br /><br>
			<input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='edit' id="edit" value="Módosítás" /><br>
		</div>
	</div>
</form>