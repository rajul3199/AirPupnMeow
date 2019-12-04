<?php 

function get_pets()
{
    $contents = file_get_contents('resources/pets.json');
    $pets = json_decode($contents, true);

    return $pets;
}

function save_pets($petToSave){

	$json = json_encode($petToSave,JSON_PRETTY_PRINT);
	file_put_contents('resources/pets.json', $json);
}