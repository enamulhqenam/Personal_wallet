<?php 
session_start();
if($_SESSION['status']!="ok"){
	header("Location:Users/LogingSystem.php");
}

include('Views/Header.php');

$view =$_REQUEST['view'];

// var_dump($view);
switch ($view) {
	// income start
	case 'Income':
		include('Views/Income.php');
		break;
	case  'IncomeEdit':
		include('Views/IncomeEdit.php');
		break;
	case  'IncomeReport':
		include('Views/IncomeReport.php');
		break;
	// income stop	
	case 'IncomeCetagory':
		include('Views/IncomeCetagory.php');
		break;
	case 'IncomeCetagoryEdit':
		include('Views/IncomeCetagoryEditUpdate.php');
		break;

		// expence start 
	case 'Expence':
		include('Views/Expence.php');
		break;
	case 'ExpenceEdit':
		include('Views/ExpenceEdit.php');
		break;
	case 'ExpenceReport':
		include('Views/ExpenceReport.php');
		break;
// expence stop
	case 'ExpenceCetagory':
		include('Views/ExpenceCetagory.php');
		break;
	case 'ExpenceCetagoryEdit':
		include('Views/ExpenceCetagoryEdit.php');
		break;

	case 'TotalReport':
		include('Views/TotalReport.php');
		break;

	case 'Logout':
		include('Users/Logout.php');
		break;

	default:
		include('Views/Home.php');
		break;
}

include('Views/Footer.php');

 ?>