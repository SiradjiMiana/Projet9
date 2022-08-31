<?php include 'includes/db.php' ;?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon : Région Johto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <?php include './includes/header.php'; ?>
    
        <!-- Redirection sur tous les champions -->
    <section class="container-fluid">

        <div class="row col-12 justify-content-center">
            <?php
            if (isset($_GET['champion'])){
            $sql='SELECT * FROM champion';
            $prepare=$db->prepare($sql);
            $prepare->execute();
            $list=$prepare->fetchAll();
            foreach ($list as $valeur){
            ?>
            
            <div class="card" style="width: 18rem;">
                <div class="card-body" style='width:15rem'>
                    <img src="<?php echo $valeur['image'] ;?>" class="card-img-top" alt="" height="200px">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo 'Ville : ' . $valeur['ville']; ?></h5>
                        <p class="card-text"><?php echo 'Champion : ' . $valeur['champion']; ?></p>
                        <p class="card-text"><?php echo 'Type : ' . $valeur['type']; ?><p>
                        <p class="card-text"><?php echo 'Badge : ' .  $valeur['badge']; ?></p>
                        <a href="index.php?championid=<?php echo $valeur['id'] ?>"><button type="button" name="description" class="btn btn-dark">Description</button></a>
                    </div>
                </div>
            </div> 
            <?php  
            } } ?>
        </div>
    </section>

        <!-- Redirection sur tous les pokémons -->
    <section class="container-fluid">
        <div class="row col-12 justify-content-center">
            <?php
            if (isset($_GET['pokemon'])){
            $sql='SELECT * FROM pokemon';
            $prepare=$db->prepare($sql);
            $prepare->execute();
            $list=$prepare->fetchAll();
            foreach ($list as $valeur){
            ?>
            
            <div class="card" style='width:18rem'>
                <div class="card-body" style='width:15rem'>
                    <img src="<?php echo $valeur['image'] ;?>" class="card-img-top" alt="" height="200px">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo 'Prenom : ' . $valeur['prenom']; ?></h5>
                        <p class="card-text"><?php echo 'Numéro : ' . $valeur['numero']; ?></p>
                        <p class="card-text"><?php echo 'Type 1 : ' . $valeur['type1']; ?><p>
                        <p class="card-text"><?php echo 'Type 2 : ' .  $valeur['type2']; ?></p>
                        <p class="card-text"><?php echo 'Création : ' .  $valeur['created']; ?></p>
                        <p class="card-text"><?php echo 'Modification : ' .  $valeur['modified']; ?></p>
                        <a href="index.php?pokemonid=<?php echo $valeur['id'] ?>"><button type="button" name="fiche" class="btn btn-dark">Fiche</button></a>
                    </div>
                    
                </div>
            </div>

            <?php  
            } } 
            ?>
        </div>
    </section>

        <!-- Redirection sur le formulaire ajouter des champions -->
    <?php 
    if (isset($_GET['formchampion'])){
        include './includes/formchampion.php';
    }

        // Redirection après création du formulaire champion

    if(isset($_POST['envoyerchampion'])){
        $ville=$_POST['ville'];
        $champion=$_POST['champion'];
        $type=$_POST['type'];
        $badge=$_POST['badge'];
        $image=$_FILES['imagechampion']['name'];
        
        $new_personnage="INSERT INTO `champion` (`ville`, `champion`, `type`, `badge`, `image`) VALUES (:ville,:champion,:type,:badge,:image)";
        
             
        $prepare=$db->prepare($new_personnage);
        
        $prepare->execute(
            [
                'ville' => $ville,
                'champion' => $champion,
                'type' => $type,
                'badge' => $badge,
                'image' => 'imgchampion/' . $image
            ]
        );
    }
    ?>

    <!-- Redirection sur la description individuelle d'un champion -->
    <?php 
    if (isset($_GET['championid'])){

          $sql = "SELECT * FROM `champion` WHERE id = :id";
            $prepare=$db->prepare($sql);
            $prepare->execute(
                [
                    'id' => $_GET['championid']
                ]
            );
            $list = $prepare->fetch();
           ?>
           <section class="container-fluid">
            <div class="row card d-flex justify-content-center ml-3" style="width: 18rem;">
                <div class="card-body d-flex justify-content-center">
                    <img src="<?php echo $list['image'] ;?>" alt=""> 
                </div>
                <div class="ml-3">
                    <p class="card-title"><?php echo 'Ville : ' . $list['ville']; ?></p>
                    <p class="card-text"><?php echo 'Champion : ' . $list['champion']; ?></p>
                    <p class="card-text"><?php echo 'Type : ' . $list['type']; ?></p>
                    <p class="card-text"><?php echo 'Badge : ' . $list['badge']; ?></p>
                    <p class="card-text"><?php echo 'Id : ' . $list['id']; ?></p>
                    <a href="index.php?modifierchampionid=<?= $list['id']; ?>"><button class="btn btn-dark">Modifier</button></a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Supprimer</button>
                </div>
            </div> 
           </section>
           

            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Supprimer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Voulez-vous vraiment supprimer ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <a href="index.php?confirmerchampion&idchampion=<?php echo $list['id']; ?>"><button type="button" class="btn btn-danger">Confirmer</button></a>
                </div>
                </div>
            </div>
            </div>
           
        <?php
    }
    ?>

    <!-- Redirection pour la modification d'un champion -->

    <?php
    if (isset($_GET['modifierchampionid'])){
        include './includes/modifierchampion.php';
    }
    
    if(isset($_POST['modifierchampion'])){

    $modif_personnage= "UPDATE `champion`  SET `ville` = :new_ville, `champion` = :new_champion, `type` = :new_type, `badge` = :new_badge, `image`= :new_image WHERE id = :id";

    $prepare=$db->prepare($modif_personnage);
    $prepare->execute(
        [
            'new_ville'=>$_POST['modifierville'],
            'new_champion'=>$_POST['modifchampion'],
            'new_type'=>$_POST['modifiertype'],
            'new_badge'=>$_POST['modifierbadge'],
            'new_image' => 'imgchampion/' . $_FILES['modifierimagechampion']['name'],
            'id'=>$_POST['id']
        ]
    );
    $fileName = 'imgchampion/' . basename($_FILES['modifierimagechampion']['name']);
    move_uploaded_file($_FILES['modifierimagechampion']['tmp_name'], $fileName);

    } ?>

        <!-- Redirection pour supprimer un champion -->
    <?php
    if (isset($_GET['confirmerchampion'])){

    $id=$_GET['idchampion'];

    $sup_personnage= "DELETE FROM `champion` WHERE id = :id";

    $prepare=$db->prepare($sup_personnage);

 $prepare->execute(
        [
            'id' => $id
        ]
    );
}

        // Redirection sur le formulaire ajouter des pokémons
    if (isset($_GET['formpokemon'])){
        include './includes/formpokemon.php';
    }

        // Redirection après création du formulaire pokémon

    if(isset($_POST['envoyerpokemon'])){
        $prenom=$_POST['prenom'];
        $numero=$_POST['numero'];
        $type1=$_POST['type1'];
        $type2=$_POST['type2'];
        $image=$_FILES['imagepokemon']['name'];
        
        $new_personnage=' INSERT INTO `pokemon` (`prenom`, `numero`, `type1`, `type2`, `image`) VALUES (:prenom, :numero, :type1, :type2, :image)';
        
        $prepare=$db->prepare($new_personnage);
        $prepare->execute(
            [
                'prenom' => $prenom,
                'numero' => $numero,
                'type1' => $type1,
                'type2' => $type2,
                'image' => 'imgpokemon/' . $image
            ]
        );
        }

    ?>

        <!-- Redirection sur la fiche individuelle d'un pokémon-->
    <?php 
    if (isset($_GET['pokemonid'])){

          $sql = "SELECT * FROM `pokemon` WHERE id = :id";
            $prepare=$db->prepare($sql);
            $prepare->execute(
                [
                    'id' => $_GET['pokemonid']
                ]
            );
            $list = $prepare->fetch();
           ?>
           
           <section class="container-fluid">
                <div class="row card d-flex justify-content-center ml-3" style="width: 15rem;">
                    <div class="card-body d-flex justify-content-center"">
                        <img src="<?php echo $list['image'] ;?>" alt="" height="200px"> 
                    </div>
                    <div class="ml-3">
                        <p class="card-title"><?php echo 'Numéro : ' . $list['numero']; ?></p>
                        <p class="card-text"><?php echo 'Prénom: ' . $list['prenom']; ?></p>
                        <p class="card-text"><?php echo 'Id : ' . $list['id']; ?></p>
                        <p class="card-text"><?php echo 'Type 1 : ' . $list['type1']; ?></p>
                        <p class="card-text"><?php echo 'Type 2 : ' . $list['type2']; ?></p>
                        <a href="index.php?modifierpokemonid=<?php $list['id']; ?>"><button class="btn btn-dark">Modifier</button></a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Supprimer</button>
                    </div>
                </div>
           </section>
           
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Supprimer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Voulez-vous vraiment supprimer ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <a href="index.php?confirmerpokemon&idpokemon=<?php echo $list['id']; ?>"><button type="button" class="btn btn-danger">Confirmer</button></a>
                </div>
                </div>
            </div>
            </div>

           <?php
              }
            ?>

        <!-- Redirection pour la modification d'un pokémon -->

        <?php 
        if (isset($_GET['modifierpokemonid'])){
            include './includes/modifierpokemon.php';
        }

        if(isset($_POST['modifierpokemon'])){

        $modif_personnage= "UPDATE `pokemon` SET `numero` = :new_numero,`prenom` = :new_prenom,`type1` = :new_type1, `type2` = :new_type2, `image` = :new_imagepokemon WHERE id = :id";

        $prepare=$db->prepare($modif_personnage);
        $prepare->execute(
            [
                'new_numero' => $_POST['modifiernumero'],
                'new_prenom' => $_POST['modifierprenom'],
                'new_type1' => $_POST['modifiertype1'],
                'new_type2' => $_POST['modifiertype2'],
                'new_imagepokemon' => 'imgpokemon/' . $_FILES['modifierimagepokemon']['name'],
                'id' => $_POST['id']
            ]
        );
        
        $fileName = 'imgpokemon/' . basename($_FILES['modifierimagepokemon']['name']);
        move_uploaded_file($_FILES['modifierimagepokemon']['tmp_name'], $fileName);

        }
        ?>

        <!-- Redirection pour supprimer un pokémon -->

    <?php
    if (isset($_GET['confirmerpokemon'])){

    $id=$_GET['idpokemon'];

    $sup_personnage= "DELETE FROM `pokemon` WHERE id = :id";

    $prepare=$db->prepare($sup_personnage);

    $prepare->execute(
        [
            'id' => $id
        ]
    );
    }
    ?>

    <?php include './includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>