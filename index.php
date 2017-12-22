<?php
header("Access-Control-Allow-Origin: *");
session_start ();
include_once ('config.php');

 function __autoload($class_name) 
    {
        //class directories
        $directories = array(
            './'
        );
        
        //for each directory
        foreach($directories as $directory)
        {
            //see if the file exsists
            if(file_exists($directory.$class_name . '.php'))
            {
                require_once($directory.$class_name . '.php');
                //only require the class once, so quit after to save effort (if you got more, then name them something else 
                return;
            }            
        }
    }

try
{

//get the instance of PDO class
$myPDO =  m_PDO::getInstance();	

//get the instance of Books class
$books = new m_Books();

//get instance of Comments class
$comments = new m_Comments();


//if GET was not set - return list of all books
if(!$_GET){
   $myJSON = json_encode($books->allBooks(), JSON_UNESCAPED_SLASHES);
    echo $myJSON; 
}

//post comment
if($_GET[comment]){

    $comment = json_decode($_POST[comment]);
    echo $comment;
    var_dump($comment);
    //$comments -> 
}

//get comments
if($_GET[comments]){
    
    $myJSON = json_encode($comments->allBookComments($_GET[book]), JSON_UNESCAPED_SLASHES);
    echo $myJSON;
}

//if there is a GET with the book id
if($_GET[book]){

     $myJSON = json_encode($books->bookById($_GET[book])[0], JSON_UNESCAPED_SLASHES);
     echo $myJSON;
}


}
catch(Exception $e)
{
	echo $e->getMessage();
}