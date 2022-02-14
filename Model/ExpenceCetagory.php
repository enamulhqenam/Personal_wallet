<?php 

class ExpenceCetagory
{
	private $name ; 

	public function store($data)
	{
		$DB = new Db();

		$this->name = $data['name'];

		$Query = "INSERT INTO ExpenceCetagory(name)";
		$Query .=" VALUES('$this->name')";

		// var_dump($Query);

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

	public function update($id ,$data)
	{
		$DB = new Db();

		$this->name = $data['name'];
		$Query ="UPDATE ExpenceCetagory SET name = '$this->name' WHERE id=$id";
		
		// var_dump($Query);

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

		$Query = "DELETE FROM ExpenceCetagory WHERE id =$id" ;

		$result = $DB->execute($Query);

		$DB->close();

		return $result;
	}

	public function getAll()

	{
		$DB = new Db();
		$Query = "SELECT * FROM ExpenceCetagory";

		$result = $DB->fetch_result($Query);

		$DB->close();

		return $result;
	}

	public function show($id)
	{
		$DB = new Db();

		$Query = "SELECT *FROM ExpenceCetagory WHERE id=$id";

		$result = $DB->fetch_result($Query);

		$DB->close();

		return $result;
	}

}





 ?>