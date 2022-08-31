<form class="container" action="index.php" method="POST" enctype="multipart/form-data">
    <div class="row col-md-12 justify-content-center">
        <div class="form-group col-md-8">
            <label>Numéro</label>
            <input type="text" name="numero" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="inputCity">Prénom</label>
            <input type="text" name="prenom" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="inputCity">Type 1</label>
            <input type="text" name="type1" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="inputCity">Type 2</label>
            <input type="text" name="type2" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="exampleFormControlFile1">Image du Pokémon</label>
            <input type="file" name="imagepokemon" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="col-md-8 d-flex justify-content-center">
            <a href="index.php?submit"><button type="submit" name="envoyerpokemon" class="btn btn-dark">Envoyer</button> </a>
        </div>
    </div>
</form>