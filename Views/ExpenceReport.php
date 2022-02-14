<?php  session_start(); 
  include('Model/db.php');  
  include('Model/ExpenceCetagory.php');
  include('Model/Expence.php');

  $ExpenceCetagory = new ExpenceCetagory();
  $ExCetagories     = $ExpenceCetagory->getAll();

  $Expence     = new Expence();
  $ECetagories =$Expence->getAll();

?>


<form action="Controller/ExpenceReport.php" method="POST" enctype="multipart/form-data">

<select name="id_cetagory" id="id_cetagory">
  <option value="">Select Cetagory</option>
  <?php 
    foreach ($ExCetagories as $Cetagory){ ?>
      <option value="<?php echo $Cetagory['id'] ;?>" <?php if($_REQUEST['id_cetagory']==$Cetagory['id']){?>
        selected
        <?php } ?>>
          
          <?php echo $Cetagory['name'] ?>
        </option>
    
  
  <?php } ?>
</select>

  <label for="from_date">From Date :</label>  
  <input type="date" name="from_date">
  <label for="to_date">To Date</label>
  <input type="date" name="to_date">
  <input type="submit" name="submit" value="View Expence Report">
</form>

<?php $data_list = $_SESSION['result'] ?>
<table>
  <thead>
    <tr>
      <th>id_cetagory</th>
      <th>Amount</th>      
      <th>Discription</th>
      <th>Expence Date</th>
    </tr>
  </thead>
  <tbody>
    
     <?php foreach ($data_list as $Cetagory) { ?>
         <tr>

           <td><?php echo $Cetagory['id_cetagory']; ?></td>

          <td><?php echo $Cetagory['amount']; ?></td> 

          <td><?php echo $Cetagory['discription']; ?></td>

          <td><?php echo $Cetagory['Expence_date']; ?></td>

         </tr>

      <?php } ?>
     
    
  </tbody>
</table>