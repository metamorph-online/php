<?php 

class m_Comments
{
	public function __construct()
	  {
	    $this->DB = m_PDO::getInstance();		
	  }

	public function allBookComments($id){

		$t = "SELECT * FROM comments WHERE book_id = '".$id."'";
		$result = $this->DB->mySelect($t);
		return $result;
	}

	public function addComment($comment){

		$t = "INSERT INTO comments () VALUES ()";
		$result = $this->DB->mySelect($t);
		return $result;
	}
}