<?php 

  include('Model/db.php');  
  include('Model/IncomeCetagory.php');
  include('Model/Income.php');

  $IncomeCetagory = new IncomeCetagory();
  $Cetagories     = $IncomeCetagory->getAll();

  if(isset($_POST['submit']) && $_POST['submit']=='View Income Report')
  {
    $id_cetagory  = $_POST ['id_cetagory'];
    $from_date    = $_POST['from_date'];
    $to_date      = $_POST['to_date'] ;

    $Income = new Income();
    $Incomes = $Income->ReportSearch($from_date,$to_date,$id_cetagory);
  }
?>


<form action="index.php?view=IncomeReport" method="POST" enctype="multipart/form-data">

<select name="id_cetagory" id="id_cetagory">
  <option value="">Select Cetagory </option>
    <?php foreach ($Cetagories as $Cetagory) { ?>
      <option value="<?php echo $Cetagory['id']; ?>">
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

<table>
<thead>
  <tr>
    <th>Cetagory</th>
    <th>Amount</th>      
    <th>Discription</th>
    <th>Income Date</th>
  </tr>
</thead>
<tbody>
<?php foreach ($Incomes['Incomes'] as $Income) { ?>
  <tr>
    <td> <?php echo $Income['Cetagory_name']; ?> </td>
    <td> <?php echo $Income['amount']; ?>      </td> 
    <td> <?php echo $Income['discription']; ?> </td>
    <td> <?php echo $Income['income_date']; ?> </td>
  </tr>
<?php } ?>  

<tr>
  <td>Total</td>
  <td><?php echo $Incomes['TotalIncome'][0][0];
  // var_dump($Incomes['TotalIncome']);
  ?></td>
</tr>
</tbody>
</table>
<br>
<div class="printbutton">
<tr>
<td>
  <button onclick="window.print()" style="background-color: #4CAF50; width: 80px ; height: 50px; margin-top:50px; margin-left:800px;">Print</button>
</td>
</tr>
</div>