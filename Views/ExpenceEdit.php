<?php
include('Model/db.php');
include('Model/ExpenceCetagory.php');

$ExpenceCetagory = new ExpenceCetagory();

$Cetagories = $ExpenceCetagory->getAll();

?>

 <form action="Controller/Expence.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
<h2>Update Expence Data</h2>

<select name="id_cetagory" id="id_cetagory">
	<option value="">Select Cetagory</option>
	<?php 
		foreach ($Cetagories as $Cetagory) { ?>
			<option value="<?php echo $Cetagory['id'] ;?>"<?php if($_REQUEST['id_cetagory'] ==$Cetagory['id']){
				?>
				selected
			<?php } ?>>
			<?php echo $Cetagory['name']; ?>

			</option>

	<?php } ?>
</select>
<input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ;?> ">
<input type="number" name="amount" value="<?php echo $_REQUEST['amount'] ;?>">
<input type="text" name="discription" value="<?php echo $_REQUEST['discription'] ;?>">
<input type="date" name="Expence_date" value="<?php echo $_REQUEST['Expence_date'] ;?>">

<input type="submit" name="submit" value="Update Expence">

</form>