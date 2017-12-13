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
$myPDO =  m_PDO::getInstance();	

$books = new m_Books();


$myJSON = json_encode($books->allBooks(), JSON_UNESCAPED_SLASHES);
echo $myJSON;

}
catch(Exception $e)
{
	echo $e->getMessage();
}