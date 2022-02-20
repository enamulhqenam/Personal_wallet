<?php
  include('Model/db.php');  
  include('Model/ExpenceCetagory.php');
  include('Model/Expence.php');

  $ExpenceCetagory  = new ExpenceCetagory();
  $ExCetagories     = $ExpenceCetagory->getAll();

  if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='View Expence Report')
  {
    $id_cetagory  = $_POST['id_cetagory'];
    $from_date    = $_POST['from_date'];
    $to_date      = $_POST['to_date'] ;

    $Expence  = new Expence();
    $Expeses  = $Expence->ReportSearch($from_date , $to_date, $id_cetagory );

  }


?>


<form action="index.php?view=ExpenceReport" method="POST" enctype="multipart/form-data">

<select name="id_cetagory" id="id_cetagory">

  <option value="">Select Cetagory</option>
    <?php foreach ($ExCetagories as $Cetagory){ ?>
      <option value="<?php echo $Cetagory['id'] ;?>">  
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
     <?php foreach ($Expeses['Expence'] as $Expense) { ?>
        <tr>
          <td><?php echo $Expense['id_cetagory']; ?></td>
          <td><?php echo $Expense['amount']; ?></td> 
          <td><?php echo $Expense['discription']; ?></td>
          <td><?php echo $Expense['Expence_date']; ?></td>
        </tr>
      <?php } ?>

      <tr>
        <td>Total Expense:</td>
        <td><?php echo $Expeses['TotalExpense'][0][0] ;?></td>
      </tr>
  </tbody>
</table>
<div class="printbutton">
<tr>
<td>
  <button onclick="window.print()" style="background-color: #4CAF50; width: 80px ; height: 50px; margin-top:50px; margin-left:800px;">Print</button>
</td>
</tr>
</div>