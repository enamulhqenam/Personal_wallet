<?php 
include('../Model/db.php');
include('../Model/ExpenceCetagory.php');

$ExpenceCet = new ExpenceCetagory();

if(isset($_POST['submit'])&& $_POST['submit'] =='Add Expence Cetagory')
{
    echo "hello";
	$data = [
		'name' => htmlspecialchars($_POST['name']),
	];

	try {
		$ExpenceCet->store($data);
		header('Location:../index.php?view=ExpenceCetagory');
	} catch (Exception $error) {
		echo $error->getMessage	();
	}
}

if(isset($_POST['submit']) && $_POST['submit']=='Update Expence Cetagory')
{
	// echo "hello ";

	$id = $_POST['id'];
// echo $_POST['name'];
	$name = [
		'name' => htmlspecialchars($_POST['name']),
	];
	try {
		$ExpenceCetagory = new ExpenceCetagory();
		echo $ExpenceCetagory->update($id ,$name);
		header('Location:../index.php?view=ExpenceCetagory');
	} catch (Exception $error) {
		echo $error->getMessage();
	}
}

if(isset($_REQUEST['action']) && $_REQUEST['action'] =='edit')
{

	$id = $_REQUEST['id'];

	$ExpenceCetagory = new ExpenceCetagory(); 
	$result = $ExpenceCetagory->show($id);

	echo $name = $result[0]['name'];

	header('Location:../index.php?view=ExpenceCetagoryEdit&id='.$id.'&name='.$name);
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete')
{
	$id = $_REQUEST['id'];

	$ExpenceCetagory = new ExpenceCetagory();

	$result = $ExpenceCetagory->deleteByPk($id);

	header('Location:../index.php?view=ExpenceCetagory');
}
?>