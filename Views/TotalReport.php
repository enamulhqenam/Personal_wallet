<?php 
	include('Model/db.php');
	include('Model/Income.php');
	include('Model/Expence.php');

	$Db = new Db();

	if (isset($_POST['submit']) && $_POST['submit'] == 'View Report') {
		$DateFrom = $_POST['from_date'];
		$DateTo = $_POST['to_date'];

		$IncomeQuery ="SELECT * FROM Income WHERE 1 = 1 ";

		$TotalQuery = "SELECT SUM(amount) as TotalIncome  FROM Income WHERE 1 = 1";

		if($DateFrom != '')
		{
			$IncomeQuery .= " AND income_date >= '".$DateFrom."'";
			$TotalQuery .= " AND income_date >= '".$DateFrom."'";

		}
		if($DateTo != '')
		{
			$IncomeQuery .=" AND income_date <= '".$DateTo."'";
			$TotalQuery  .=" AND income_date <= '".$DateTo."'";
		}

		$Incomes 		= $Db->fetch_result($IncomeQuery);
		$TotalIncome 	= $Db->fetch_result($TotalQuery);
		

		$ExpenseQuery = "SELECT *FROM Expence WHERE 1 = 1 ";
		$ExpenceTotal = "SELECT SUM(amount) as TotalExpense FROM Expence WHERE 1 = 1 ";

		if($DateFrom != '')
		{
			$ExpenseQuery .=" AND Expence_date >= '".$DateFrom."'";
			$ExpenceTotal .=" AND Expence_date >= '".$DateFrom."'";
		}
		if($DateTo !='')
		{
			$ExpenseQuery .=" AND Expence_date <= '".$DateTo."'";
			$ExpenceTotal .=" AND Expence_date <= '".$DateTo."'";
		}

		$Expenses 		= $Db->fetch_result($ExpenseQuery);
		$TotalExpense	= $Db->fetch_result($ExpenceTotal);

		$RestAmount = $TotalIncome[0]['TotalIncome'] - $TotalExpense[0]['TotalExpense'];
	}
?>

<style type="text/css" media="screen">
.report
{
	width: 100%;
}
.income-report
{
	width: 50%;
	float: left;
	background-color: grey;
}
.expense-report
{
	width: 50%;
	float: left;
	background-color: lightskyblue;
}
</style>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>?view=TotalReport" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	<h2>Total Report</h2>
	<label for="form_data"> From Date : </label>
	<input type="date" name="from_date">	
	<label for="to_data"> To Date : </label>
	<input type="date" name="to_date">
	<input type="submit" name="submit" value="View Report">
</form>
<div class="report">
	<div class="income-report">
		<h1>Incomes</h1>
		<table>
		<thead>
			<tr>
				<th>Cetagory</th>
				<th>Amount</th>
				<th>Income Date</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($Incomes as $Income) { ?>
				<tr>
					<td> <?php echo $Income['id_cetagory']; ?> <td>
					<td> <?php echo $Income['amount']; ?> </td>
					<td> <?php echo $Income['income_date']; ?> </td>
				</tr>
			<?php } ?>
				<tr>
					<td>Total</td>
					<td colspan="2"><?php echo $TotalIncome[0]['TotalIncome']; ?></td>
				</tr>
		</tbody>
		</table>
		</table>
	</div>

<div class="expense-report">
	<h1>Expenses</h1>
	<table>
	<thead>
	<tr>
		<th>Cetagory</th>
		<th>Amount</th>
		<th>Expense Date</th>
	</tr>
	</thead>
<tbody>
	<?php foreach ($Expenses as $Expense) { ?>
		<tr>
			<td> <?php echo $Expense['id_cetagory']; ?> </td>
			<td> <?php echo $Expense['amount']; ?> </td>
			<td> <?php echo $Expense['income_date']; ?></td>
		</tr>
	<?php } ?>
		<tr>
			<td>Total</td>
			<td><?php echo $TotalExpense[0]['TotalExpense']; ?></td>
		</tr>
</tbody>

	</table>
</div>
 Rest Amount = <?php echo $RestAmount; ?> 
</div>
<div class="printbutton">
<tr>
<td>
  <button onclick="window.print()" style="background-color: #4CAF50; width: 80px ; height: 50px; margin-top:100px; margin-left:700px;">Print</button>
</td>
</tr>
</div>