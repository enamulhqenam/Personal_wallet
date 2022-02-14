<?php
	session_start();
	include('../Model/db.php');
	include('../Model/Expence.php');

	if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='View Expence Report')
	{
		$id_cetagory =$_POST['id_cetagory'];
		$from_date 	= $_POST['from_date'];
		$to_date	= $_POST['to_date'] ;

		$Expence = new Expence();

		$result = $Expence->ReportSearch($from_date , $to_date,$id_cetagory );

		$_SESSION['result']=$result;

		header('Location:../index.php?view=ExpenceReport');
	}
?>