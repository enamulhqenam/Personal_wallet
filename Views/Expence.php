<?php
    include('Model/db.php');
    include('Model/ExpenceCetagory.php');
    include('Model/Expence.php');

    $ExpenceCetagory = new ExpenceCetagory();
    
    $ExpenceCetagory= $ExpenceCetagory->getAll();

    $Cetagories = new Expence();
    $CetagoriesE= $Cetagories->getAll();

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
table th{
    padding-left: 20px;
}
table td{
    padding-left: 20px;
}
</style>
<!-- css stop  -->
<!-- select Option marge by Expence Cetagoary  -->

<form action="Controller/Expence.php" method="POST" enctype="multipart/form-data">
<select name="id_cetagory" id="id_cetagory">
    <option value="">Select Cetagory </option>

    <?php
        foreach ($ExpenceCetagory as $Cetagory) { ?>
            <option value="<?php echo $Cetagory['id']; ?>">
                    <?php echo $Cetagory['name'] ;?>
            </option>
      <?php } ?>

    ?>
</select>
<br>
<input type="number" name="amount" id="amount" placeholder="add amount"> <br>
<input type="text" name="discription" placeholder="write a Discription" class="discrip"> <br>
<input type="date" name="Expence_date" class="date" placeholder="selete date"> <br>
<input type="submit" name="submit" value="Add Expence" class="btn"> <br>

</form>

<table>

<thead>
		<tr>
			
			<th>Catagory Name</th>
			<th>Amount</th>
			<th>Description</th>
			<th>Expence Date</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			if (is_null($CetagoriesE)) {
				echo "<tr><td>No data in table</td></tr>";
			}
			foreach($CetagoriesE as $Cetagory) {?>
			<tr>
				<td> <?php echo $Cetagory['id_cetagory']; ?> </td>
				<td> <?php echo $Cetagory['amount']; ?> </td>
				<td> <?php echo $Cetagory['discription']; ?> </td>
				<td> <?php echo $Cetagory['Expence_date']; ?> </td>
				<td>
					<a href="Controller/Expence.php?action=edit&id=<?php echo $Cetagory['id'] ;?>">Edit</a>
					<a href="Controller/Expence.php?action=delete&id=<?php echo $Cetagory['id'] ;?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>