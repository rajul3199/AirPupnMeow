<?php
function init(){
	$config = require 'config.php';
	$pdo = new PDO($config['database_dns'],$config['database_user'],$config['database_pass']);

	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	return $pdo;
} 

function get_pets($limit = 0)
{
	$pdo = init();
	$query = 'select * from pet';
   	if($limit !=0 ){
  		$query = $query.'LIMIT :resultVal';
   	}
   	$stmt = $pdo->prepare($query);
   	$stmt->bindParam('resultVal', $limit);
   	$stmt->execute();

    $pets = $stmt->fetchAll();
    return $pets;
}

function save_pets($petToSave){

	$json = json_encode($petToSave,JSON_PRETTY_PRINT);
	file_put_contents('resources/pets.json', $json);
}

function get_pet($id){

	$pdo = init();

	$query = 'select * from pet where id= :idVal';

	$stmt = $pdo->prepare($query);

	$stmt->bindParam('idVal',$id);
	$stmt->execute();

	$pet  = $stmt->fetch();

	return $pet;
}