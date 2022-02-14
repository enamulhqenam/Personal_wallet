<?php 

    class Income
    {
       
        private $id_cetagory;
        private $amount ;
        private $discription;
        private $income_date;


        public function store($data)
        {   
            $this->id_cetagory  = $data['id_cetagory'];
            $this->amount       = $data['amount'];
            $this->discription  = $data['discription'];
            $this->income_date  = $data['income_date'];

            $DB = new Db();

            $Query = "INSERT INTO Income(id_cetagory , amount , discription , income_date)";
            $Query .=" VALUES($this->id_cetagory,$this->amount,'$this->discription','$this->income_date')";

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
        public function update($id, $data)
        {
        echo $id;
            $this->id_cetagory  = $data['id_cetagory'];
            $this->amount       = $data['amount'];
            $this->discription  = $data['discription'];
            $this->income_date  = $data['income_date'];

            $DB = new Db();

            echo $Query = "UPDATE Income SET id_cetagory =$this->id_cetagory , amount=$this->amount , discription='$this->discription' ,income_date='$this->income_date' WHERE id=$id ";

            try {
                $DB->execute($Query);
            } catch (Exception $error) {
                $error->getMessage();
            }
        }
        public function delete()
	{

	}

	public function deleteByPk($id)
	{
		$DB = new Db();

		$Query = "DELETE FROM Income WHERE id=$id" ;

		$result = $DB->execute($Query);

		$DB->close();

		return $result;
	}

	public function getAll()

	{
		$DB = new Db();
		$Query = "SELECT Income.* ,IncomeCetagory.name as id_cetagory FROM Income JOIN IncomeCetagory ON Income.id_cetagory=IncomeCetagory.id";

		$result = $DB->fetch_result($Query);

		$DB->close();

		return $result;
	}

	public function show($id)
	{
		$DB = new Db();

		$Query = "SELECT *FROM Income WHERE id=$id";

		$result = $DB->fetch_result($Query);

		$DB->close();

		return $result;
	}

    public function ReporSearch($from_date,$to_date,$id_cetagory){
        $DB = new Db();
        $Query = "SELECT *FROM Income WHERE id_cetagory = ".$id_cetagory." AND  income_date BETWEEN '".$from_date."' AND '".$to_date." '";
        $result = $DB->fetch_result($Query);
        return $result;
    }

        

    }

?>