<?php
    include('../Model/db.php');
    include('../Model/Income.php');
   
    if(isset($_POST['submit']) && $_POST['submit']=='Add Income')
    {
        $data = [
            'id_cetagory'   =>htmlspecialchars($_POST['id_cetagory']),
            'amount'        =>htmlspecialchars($_POST['amount']),
            'discription'   =>htmlspecialchars($_POST['discription']),
            'income_date'   =>htmlspecialchars($_POST['income_date']),   
        ];
        
        try {
            $Income = new Income();
            $Income->store($data);
            header('Location:../index.php?view=Income');
        } catch (Exception $error) {
            $error->getMessage();
        }
    }
    // update 
   
    if(isset($_POST['submit']) && $_POST['submit'] =='Update Income')
    {   
        $id = $_POST['id'];
        // var_dump($id);
        $data = [
            'id_cetagory'   =>htmlspecialchars($_POST['id_cetagory']),
            'amount'        =>htmlspecialchars($_POST['amount']),
            'discription'   =>htmlspecialchars($_POST['discription']),
            'income_date'   =>htmlspecialchars($_POST['income_date']),   
        ];
        try {
            $Income = new Income();
            $Income->update($id,$data);

            header('Location:../index.php?view=Income');
        } 
        catch (Exception $error) {
            $error->getMessage();
        }
    }
    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit')
    {   
        $id =$_REQUEST['id'];

        $Income = new Income();
        $result = $Income->show($id);

        $id_cetagory   = $result[0]['id_cetagory'];
        $amount        = $result[0]['amount'];
        $discription   = $result[0]['discription'];
        $income_date   = $result[0]['income_date'];

        header("Location:../index.php?view=IncomeEdit&id=".$id."&id_cetagory=".$id_cetagory."&amount=".$amount."&discription=".$discription."&income_date=".$income_date.'"');
        
        
    }
    if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete')
    {
        $id = $_REQUEST['id'];
    
        $Income = new Income();
    
        $result = $Income->deleteByPk($id);
    
        header('Location:../index.php?view=Income');
    }

?>