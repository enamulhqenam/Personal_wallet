<?php
include('Model/db.php');
include('Model/IncomeCetagory.php');

$IncomeCetagor = new IncomeCetagory();
    
$Cetagories = $IncomeCetagor->getAll();

?>

<form action="Controller/Income.php" method="POST" enctype="multipart/form-data">

<h2>Update Income </h2>
<select name="id_cetagory" id="id_cetagory">
    <option value="">Select Cetagory </option>

    <?php
        foreach ($Cetagories as $Cetagory) { ?>
            <option value="<?php echo $Cetagory['id']; ?>" <?php if($_REQUEST['id_cetagory']==$Cetagory['id']){ ?>
            selected 
            <?php } ?>>
                    <?php echo $Cetagory['name'] ;?>
            </option>
      <?php } ?>
</select>
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
<input type="number" name="amount" value="<?php echo $_REQUEST['amount'] ;  ?>">
<input type="text" name="discription" value="<?php echo $_REQUEST['discription'] ;  ?>">
<input type="date" name="income_date" value="<?php echo $_REQUEST['income_date'] ;  ?>">

<input type="submit" name="submit" value="Update Income">
</form>