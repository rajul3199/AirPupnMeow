<?php require 'layout/header.php';

 		require 'lib/functions.php';
	// echo "<pre>";
	// var_dump($_SERVER);
	// echo "</pre";
	// die();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
	}else{
		$name='';
	}

	if (isset($_POST['breed'])) {
		$breed = $_POST['breed'];
	} else {
		$breed = '';
	}
	
	if (isset($_POST['weight'])) {
		$weight = $_POST['weight'];
	} else {
		$weight = '';
	}

	
	if (isset($_POST['bio'])) {
		$bio = $_POST['bio'];
	} else {
		$bio = '';
	}

	$pets = get_pets();

	$pets[] = array('name' => $name,
	'breed' => $breed,
	'weight' => $weight,
	'bio' => $bio,
	'age' => '',
	'filename' =>'' );


	save_pets($pets);

	header('Location: index.php');
	die;
}
	
?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1>Adding a Squrrel</h1>
				<form action="pets_new.php" method="POST">
					<div class="form-group">
						<label for="pet-name" class="control-label">Pet Name</label>
						<input type="text" name="name" id="pet-name" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" for="pet-breed">Breed</label>
						<input type="text" name="breed" id="pet-breed" class="form-control" />
					</div>
					<div class="form-group">
						<label for="pet-weight" class="control-label">Weight(lbs)</label>
						<input type="text" name="weight" id="pet-weight" class="form-control">
					</div>
					<div class="form-group">
						<label for="pet-bio" class="control-label">Bio</label>
						<textarea name="bio" class="form-control"></textarea>	
					</div>
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-heart"></span>
						Add
					</button>
				</form>	
			</div>	
		</div>
	</div>
<?php require 'layout/footer.php'; ?>