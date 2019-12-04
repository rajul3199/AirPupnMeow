<?php 

function get_pets()
{
	$config = require 'config.php';

   $pdo = new PDO($config['database_dns'],$config['database_user'],$config['database_pass']);

    $result = $pdo->query('select * from pet');

    $pets = $result->fetchAll();
    return $pets;
}

function save_pets($petToSave){

	$json = json_encode($petToSave,JSON_PRETTY_PRINT);
	file_put_contents('resources/pets.json', $json);
}