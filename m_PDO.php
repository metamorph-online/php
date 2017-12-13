<?php
// class handles the connection to SQL DB with PDO
class m_PDO
{
	private $DBH; 
    protected static $_instance;
	
	private function __construct()
	{
	  //MySQL request through PDO_MYSQL  
	   $this->DBH = new PDO("mysql:host=".HOSTNAME.";dbname=".DBNAME, USERNAME, PASSWORD);
	}
	
	 private function __clone()
	{
    }
	
	#singlton check
	public static function getInstance() {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	
	
   //function makes SELECT request to DB using PDO;
   public function mySelect($query)
   { 
   		$myResult = array();
		$stmt = $this->DBH->query($query);
		if($stmt == false)
		{
			return false;
		}
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
	    {
   		  array_push($myResult, $row);
 	    }
		return $myResult;

   }

	//function inserts, delete and update data from $query statement;
	public function myDefault($query)
	{
			$stmt = $this->DBH->prepare($query);
			$stmt->execute();
			return $affected_rows = $stmt->rowCount();

	}
	//function inserts, delete and update data from $query statement;
	public function myInsert($query)
	{
			$stmt = $this->DBH->prepare($query);
			$stmt->execute();
			$result = $this->DBH->lastInsertId();
			return $result;

	}


}
