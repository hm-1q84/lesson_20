<form action="main.php?action=edit&counter=<?php echo $_GET['counter'] ?>&id=<?php echo $_GET['id'] ?>&c_n=<?php echo $_GET['c_n'] ?>&c_t=<?php echo $_GET['c_t'] ?>&c_r=<?php echo $_GET['c_r'] ?>" method="post"> <!-- updating form -->
	<h3>Updating form</h3>
	<label>FIO
			<input type="text" name="upd_name" value = <?php echo (isset($_POST['upd_name']) ? $_POST['upd_name'] : $_GET['c_n']) ?>>
	</label> 
	<label>Adres
			<input type="text" name="upd_town" value = <?php echo (isset($_POST['upd_town']) ? $_POST['upd_town'] : $_GET['c_t']) ?>>
	</label>
	<label>Reiting
		<input type="text" name="upd_rating" value = <?php echo (isset($_POST['upd_rating']) ? $_POST['upd_rating'] : $_GET['c_r']) ?>>
	</label>
	<input class="submit" type="submit" name="submit_update" value="Update">
</form>