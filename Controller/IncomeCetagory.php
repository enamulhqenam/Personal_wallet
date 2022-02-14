<?php 
include('../Model/db.php');
include('../Model/IncomeCetagory.php');

$IncomeCat = new IncomeCetagory();

if(isset($_POST['submit'])&& $_POST['submit'] == 'Add Income Cetagory')
{
	$data = [
		'name' => htmlspecialchars($_POST['name']),
	];

	try {
		$IncomeCat->store($data);
		header('Location:../index.php?view=IncomeCetagory');
	} catch (Exception $error) {
		echo $error->getMessage	();
	}
}
// update 

if(isset($_POST['submit']) && $_POST['submit']=='Update Income Cetagory')
{

	$id = $_POST['id'];
	$name = [
		'name' => htmlspecialchars($_POST['name']),
	];
	try {
		$IncomeCetagory = new IncomeCetagory();
		echo $IncomeCetagory->update($id ,$name);
		header('Location:../index.php?view=IncomeCetagory');
	} catch (Exception $error) {
		echo $error->getMessage();
	}
}

if(isset($_REQUEST['action']) && $_REQUEST['action'] =='edit')
{

	$id = $_REQUEST['id'];

	$IncomeCetagory = new IncomeCetagory(); 
	$result = $IncomeCetagory->show($id);

	echo $name = $result[0]['name'];

	header('Location:../index.php?view=IncomeCetagoryEdit&id='.$id.'&name='.$name);
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete')
{
	$id = $_REQUEST['id'];

	$IncomeCetagory = new IncomeCetagory();

	$result = $IncomeCetagory->deleteByPk($id);

	header('Location:../index.php?view=IncomeCetagory');
}
 ?>