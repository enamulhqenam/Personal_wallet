<?php
    include('Model/db.php');
    include('Model/IncomeCetagory.php');
    include('Model/Income.php');

	$GetFace = new Income();

	$Incomes=$GetFace->getAll();

    $IncomeCetagor = new IncomeCetagory();
    
    $Cetagories = $IncomeCetagor->getAll();
?>
<!-- css -->
<style>

select{
    border: 5px 5px  red;
    margin:10px 250px ;
}
input{
    margin:10px 250px ;
}
.discrip{
    width: 250px;
    height: 200px;
}
table{
    margin-left:900px;
    margin-top: -400px;
}
table thead{
    padding: 30px;
}
table td{
    padding-left: 20px;
}
</style>
<!-- css stop  -->
<!-- select Option marge by Income Cetagoary  -->

<form action="Controller/Income.php" method="POST" enctype="multipart/form-data">
<select name="id_cetagory" id="id_cetagory">
    <option value="">Select Cetagory </option>
    <?php foreach ($Cetagories as $Cetagory) { ?>
            <option value="<?php echo $Cetagory['id']; ?>">
                 <?php echo $Cetagory['name'] ;?>
            </option>
     <?php } ?>
</select>
<br>
<input type="number" name="amount" id="amount" placeholder="add amount"> <br>
<input type="text" name="discription" placeholder="write a Discription" class="discrip"> <br>
<input type="date" name="income_date" class="date" placeholder="selete date"> <br>
<input type="submit" name="submit" value="Add Income" class="btn"> <br>

</form>

<table>

<thead>
	<tr>	
		<td>Catagory Name</td>
		<td>Amount</td>
		<td>Description</td>
		<td>Incame Date</td>
		<td>Action</td>
	</tr>
</thead>
<tbody>
	<?php if (is_null($Incomes)) 
	{
		echo "<tr><td>No data in table</td></tr>";
	}
	foreach($Incomes as $category) {?>
		<tr>
			<td><?php echo $category['id_cetagory']; ?></td>
			<td><?php echo $category['amount']; ?></td>
			<td><?php echo $category['discription']; ?></td>
			<td><?php echo $category['income_date']; ?></td>
			<td>
				<a href="Controller/Income.php?action=edit&id=<?php echo $category['id']; ?>">Edit</a>
				<a href="Controller/Income.php?action=delete&id=<?php echo $category['id']; ?>">Delete</a>
			</td>
		</tr>
	<?php } ?>
</tbody>
</table>