<?php 

class m_Books
{
	public function __construct()
	  {
	    $this->DB = m_PDO::getInstance();		
	  }

	public function allBooks(){

		$t = "SELECT * FROM books";
		$result = $this->DB->mySelect($t);
		return $result;
	}

	public function bookById($id){

		$t = "SELECT * FROM books WHERE book_id = '".$id."'";
		$result = $this->DB->mySelect($t);
		return $result;
	}
}