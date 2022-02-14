<?php 
	session_start();
  include('Model/db.php');  
  include('Model/IncomeCetagory.php');
  include('Model/Income.php');

  $IncomeCetagory = new IncomeCetagory();
  $Cetagories     = $IncomeCetagory->getAll();

  $Income     = new Income();
  $ICetagories =$Income->getAll();

?>

<form action="Controller/IncomeReport.php" method="POST" enctype="multipart/form-data">

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

  <label for="from_date">From Date :</label>  
  <input type="date" name="from_date">
  <label for="to_date">To Date</label>
  <input type="date" name="to_date">
  <input type="submit" name="submit" value="View Income Report">
</form>

<?php $data_list = $_SESSION['result'] ?>
<table>
  <thead>
    <tr>
      <th>id_cetagory</th>
      <th>Amount</th>      
      <th>Discription</th>
      <th>Income Date</th>
    </tr>
  </thead>
  <tbody>
    
      <?php foreach ($data_list as $Cetagory) { ?>
         <tr>

           <td><?php echo $Cetagory['id_cetagory']; ?></td>

          <td><?php echo $Cetagory['amount']; ?></td> 

          <td><?php echo $Cetagory['discription']; ?></td>

          <td><?php echo $Cetagory['income_date']; ?></td>

         </tr>

      <?php } ?>
     
    
  </tbody>
</table>