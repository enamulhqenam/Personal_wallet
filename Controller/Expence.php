<?php
    include('../Model/db.php');
    include('../Model/Expence.php');
   
    if(isset($_POST['submit']) && $_POST['submit']=='Add Expence')
    {
        $data = [
            'id_cetagory'   =>htmlspecialchars($_POST['id_cetagory']),
            'amount'        =>htmlspecialchars($_POST['amount']),
            'discription'   =>htmlspecialchars($_POST['discription']),
            'Expence_date'   =>htmlspecialchars($_POST['Expence_date']),   
        ];
        
        try {
            $Expence = new Expence();
            $Expence->store($data);
            header('Location:../index.php?view=Expence');
        } catch (Exception $error) {
            $error->getMessage();
        }
    }
    // update 
   
    if(isset($_POST['submit']) && $_POST['submit']=='Update Expence')
    {   
        $id = $_POST['id'];

        $data = [
            'id_cetagory'   =>htmlspecialchars($_POST['id_cetagory']),
            'amount'        =>htmlspecialchars($_POST['amount']),
            'discription'   =>htmlspecialchars($_POST['discription']),
            'Expence_date'  =>htmlspecialchars($_POST['Expence_date']),   
        ];
        try {
            $Expence = new Expence();
            $Expence->update($id,$data);

            header('Location:../index.php?view=Expence');
        } 
        catch (Exception $error) {
            $error->getMessage();
        }
    }
    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit')
    {   
        $id =$_REQUEST['id'];

        $Expence = new Expence();
        $result = $Expence->show($id);

        $id_cetagory   = $result[0]['id_cetagory'];
        $amount        = $result[0]['amount'];
        $discription   = $result[0]['discription'];
        $Expence_date  = $result[0]['Expence_date'];

        header("Location:../index.php?view=ExpenceEdit&id=".$id."&id_cetagory=".$id_cetagory."&amount=".$amount."&discription=".$discription."&Expence_date=".$Expence_date.'"');
        
        
    }
    if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete')
    {
        $id = $_REQUEST['id'];
    
        $Expence = new Expence();
    
        $result = $Expence->deleteByPk($id);
    
        header('Location:../index.php?view=Expence');
    }

?>