<?php
include('../Model/db.php');
require('../Model/IncomeCetagory.php');


$IncomeCetagor = new IncomeCetagory();

$Cetagories = $IncomeCetagor->getAll();

?>


<form action="Controller/IncomeCetagory.php" method="POST" accept-charset="utf-8" enctype="multipar/form-data">
	<input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ; ?>">
	<input type="text" name="name" placeholder="Income Cetagory"  value="<?php echo $_REQUEST['name'] ; ?>" required>
	<input type="submit" name="submit" value="Update Income Cetagory">
</form>