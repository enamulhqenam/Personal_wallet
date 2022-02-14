<?php 
class Db{

	private $host 	= 'localhost';
	private $user 	= 'Enam';
	private $pass 	= '@ranzhyfx';
	private $db 	= 'personal_wallate';

	private $connection ;

	public function __construct()
	{
		$this->connection = new mysqli($this->host, $this->user , $this->pass , $this->db);

		if($this->connection->connect_errno)
		{
			throw new exception('Database connection is Faild !'. $this->connection->connect_errno);
		}
		// else
		// {
		// 	echo 'Database is connected !';
		// }
	}

	public function close()
	{
		$this->connection->close();
	}

	public function execute($query)
	{
		try 
		{
			$result=mysqli_query($this->connection , $query);
			return $result;
		} 
		catch (Exception $error) 
		{
			throw new exception("Error in Excuting Query !");
		}

	}

	public function fetch_result($query)
	{
		$result = mysqli_query($this->connection, $query);
		
		if(!$result)
		{
			throw new exception('Error in Fetching Result !');
		}
		else
		{
			while($row = mysqli_fetch_array($result))
			{
				$data[] =$row;
			}
			return $data;
		}
	}	

}



 ?>