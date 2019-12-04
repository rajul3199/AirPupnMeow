<?php 

function get_pets($limit = 0)
{
	$config = require 'config.php';

   $pdo = new PDO($config['database_dns'],$config['database_user'],$config['database_pass']);

   	if($limit !=0 ){
  		$result = $pdo->query("select * from pet limit ".$limit);
   	}
   	else{
   		$result = $pdo->query("select * from pet");	
   	}
    

  //  var_dump($result);die;

    $pets = $result->fetchAll();
    return $pets;
}

function save_pets($petToSave){

	$json = json_encode($petToSave,JSON_PRETTY_PRINT);
	file_put_contents('resources/pets.json', $json);
}