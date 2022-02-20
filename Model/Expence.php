<?php 
	class Expence
	{
		private $id_cetagory;
        private $amount ;
        private $discription;
        private $Expence_date;


        public function store($data)
        {
            $this->id_cetagory  = $data['id_cetagory'];
            $this->amount       = $data['amount'];
            $this->discription  = $data['discription'];
            $this->Expence_date  = $data['Expence_date'];

            $DB = new Db();

            $Query = "INSERT INTO Expence(id_cetagory , amount , discription , Expence_date)";
            $Query .=" VALUES($this->id_cetagory,$this->amount,'$this->discription','$this->Expence_date')";

            try
            {
                $DB->execute($Query);
            }
            catch (Exception $error)
            {
                return $error->getMessage();
            }
            $DB->close();


        }
        public function update($id,$data)
        {
            $this->id_cetagory  = $data['id_cetagory'];
            $this->amount       = $data['amount'];
            $this->discription  = $data['discription'];
            $this->Expence_date  = $data['Expence_date'];

            $DB = new Db();
            $Query = "UPDATE Expence SET id_cetagory=$this->id_cetagory , amount=$this->amount , discription='$this->discription',Expence_date='$this->Expence_date' WHERE id=$id";

            try
            {
                $DB->execute($Query);
            }
            catch(Exception $error)
            {
                $error->getMessage();
            }

        }
        public function delete()
    	{

    	}

    	public function deleteByPk($id)
    	{
            $DB = new Db();
            $Query = "DELETE FROM Expence WHERE id=$id";
            $result = $DB->execute($Query);
            $DB->close();
            return $result;
    	}

    	public function getAll()

    	{
            $DB = new Db();

            $Query = "SELECT Expence.* , ExpenceCetagory.name as id_cetagory FROM Expence JOIN ExpenceCetagory ON Expence.id_cetagory=ExpenceCetagory.id" ;

            $result = $DB->fetch_result($Query);

            $DB->close();

            return $result;
    	}
    	public function show($id)
    	{
            $DB = new Db();

            $Query = "SELECT *FROM Expence WHERE id=$id";
            $result = $DB->fetch_result($Query);

            $DB->close();
            return $result;
    	}
        public function ReportSearch($from_date , $to_date, $id_cetagory )
        {
            $DB = new Db();
            $Query      = "SELECT *FROM Expence WHERE 1 = 1 ";
            $QuerySum   = "SELECT SUM(amount) AS TotalExpense FROM Expence WHERE 1 = 1 ";

            if($id_cetagory != '')
            {
                $Query .=" AND id_cetagory=".$id_cetagory;
                $QuerySum .=" AND id_cetagory=".$id_cetagory;
            }
            if($from_date != ''){
                $Query .=" AND Expence_date >= '".$from_date."'";
                $QuerySum .=" AND Expence_date >= '".$from_date."'";
            }
            if($to_date != '')
            {
                $Query .=" AND Expence_date <= '".$to_date."'";
                $QuerySum .=" AND Expence_date <= '".$to_date."'";
            }

            // return $Query;

            $result = $DB->fetch_result($Query);
            $TotalExpense = $DB->fetch_result($QuerySum);

            $Expence_Array=[
                'Expence' => $result,
                'TotalExpense' =>$TotalExpense,
            ];

            return $Expence_Array;
    }


    }
?>