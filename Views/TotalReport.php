<?php 
	include('Model/db.php');
	include('Model/Income.php');
	include('Model/Expence.php');

	$Db = new Db();

	if (isset($_POST['submit']) && $_POST['submit'] == 'View Report') {
		$DateFrom = $_POST['from_date'];
		$DateTo = $_POST['to_date'];

		$query = "SELECT * FROM Income WHERE income_date BETWEEN '$DateFrom' AND '$DateTo'";
		$Incomes = $Db->fetch_result($query);

		$query = "SELECT SUM(amount) as TotalIncome FROM Income WHERE income_date BETWEEN '$DateFrom' AND '$DateTo'";
		$TotalIncome = $Db->fetch_result($query);

		$query = "SELECT * FROM Expence WHERE Expence_date BETWEEN '$DateFrom' AND '$DateTo'";
		$Expenses = $Db->fetch_result($query);

		$query = "SELECT SUM(amount) as TotalExpense FROM Expence WHERE Expence_date BETWEEN '$DateFrom' AND '$DateTo'";
		$TotalExpense = $Db->fetch_result($query);


		$RestAmount = $TotalIncome[0]['TotalIncome'] - $TotalExpense[0]['TotalExpense'];
	}
?>

	<style type="text/css" media="screen">
		.report{
			width: 100%;
		}

		.income-report{
			width: 50%;
			float: left;
			background-color: grey;
		}

		.expense-report{
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
						<td> <?php echo $Income['id_cetagory']; ?> </td>
						<td> <?php echo $Income['amount']; ?> </td>
						<td> <?php echo $Income['income_date']; ?> </td>
					</tr>
					<?php } ?>
					<tr>
						<td>Total</td>
						<td><?php echo $TotalIncome[0]['TotalIncome']; ?></td>
					</tr>
				</tbody>
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
						<td> <?php echo $Expense['income_date']; ?> </td>
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