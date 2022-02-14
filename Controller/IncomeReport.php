<?php
	session_start();
	include('../Model/db.php');
	include('../Model/Income.php');

	if(isset($_POST['submit']) && $_POST['submit']=='View Income Report')
	{
			$id_cetagory = $_POST ['id_cetagory'];
			$from_date 		= $_POST['from_date'];
			$to_date		= $_POST['to_date'] ;

		

		$Income = new Income();

		$result = $Income->ReporSearch($from_date,$to_date,$id_cetagory);

		$_SESSION['result']=$result;

		header('Location:../index.php?view=IncomeReport');
	}
?>