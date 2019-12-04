<?php

    require 'lib/functions.php';
    $pets = get_pets();
?>
<?php require 'layout/header.php'; ?>

    <div class="jumbotron">
        <div class="container">
            <h1>ALL THE LOVE, NONE OF THE CRAP!</h1>

            <p>Over <?php echo count($pets); ?> pet Friends.</p>

            <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php foreach ($pets as $pet) { ?>
            <div class="col-md-4 pet-list-item">
                <h2><?php echo $pet['name']; ?></h2>
                <img src="images/<?php echo $pet['image']; ?>">
                <blockquote class="pet-details">
                    <span class="label label-info"> <?php echo $pet['breed']; ?></span>
                    <?php
                    if(!array_key_exists('age', $pet) && $pet['age']==''){

                         echo 'Unknown';
                     } elseif ($pet['age']== 'hidden') {
                        echo 'Contact Owner of Age.';
                     } else{
                        echo $pet['age'];
                     }
                ?>
                    <?php echo $pet['weight']; ?>
                </blockquote>
                <p>
                    <?php echo $pet['bio']; ?>
                </p>
            </div>

        <?php } ?>
        </div>

        <hr>

<?php require 'layout/footer.php'; ?>