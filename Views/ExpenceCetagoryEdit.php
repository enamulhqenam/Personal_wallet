<form action="Controller/ExpenceCetagory.php" method="POST" accept-charset="utf-8" enctype="multipar/form-data">
	<input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ; ?>">
	<input type="text" name="name" placeholder="Expence Cetagory"  value="<?php echo $_REQUEST['name'] ; ?>" required>
	<input type="submit" name="submit" value="Update Expence Cetagory">
</form>