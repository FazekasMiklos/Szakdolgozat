<div id="btn">
	<div class="reg">
		<!--Profilkép törlésének panelja ahol a felhasználó eldöntheti hogy tényleg kitörli a profilképét vagy nem-->
		<form action='index.php?page=profilepicdelete' method='POST'>
			<label for="user">Biztos hogy törölni akarod a profilképed?</label> <br />
			<input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='igen' id="igen" value="Igen" />
			<input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='nem' id="nem" value="Nem" />
		</form>
	</div>
</div>