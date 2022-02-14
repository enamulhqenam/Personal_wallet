<?php 
include('Model/db.php');
include('Model/IncomeCetagory.php');


$IncomeCetagor = new IncomeCetagory();

$Cetagories = $IncomeCetagor->getAll();

?>

<form action="Controller/IncomeCetagory.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

	<input type="text" name="name" placeholder="Income cetagory " required>
	<input type="submit" name="submit" value="Add Income Cetagory">

</form>

<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_null($Cetagories)){
			echo "<tr><td colspan='3'> No DAta in table </td></tr>";
		}
		foreach ($Cetagories as $Cetagory) { ?>
			
		<tr>
			<td> <?php  echo $Cetagory['id']; ?> </td>
			<td> <?php  echo $Cetagory['name'] ;?> </td>
			<td>
				<a href="Controller/IncomeCetagory.php?action=edit&id=<?php echo $Cetagory['id'] ; ?>">Edit</a>
				<a href="Controller/IncomeCetagory.php?action=delete&id=<?php echo $Cetagory['id'] ; ?>">Delete</a>
			</td>
		</tr>

		<?php } ?>
		
	</tbody>
</table>
