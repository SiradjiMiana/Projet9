<form class="container" action="index.php" method="POST" enctype="multipart/form-data">
    <div class="row col-md-12 justify-content-center">
        <div class="form-group col-md-8">
            <label>Numéro</label>
            <input type="text" name="modifiernumero" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="inputCity">Prénom</label>
            <input type="text" name="modifierprenom" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="inputCity">Type 1</label>
            <input type="text" name="modifiertype1" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="inputCity">Type 2</label>
            <input type="text" name="modifiertype2" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="exampleFormControlFile1">Image du Pokémon</label>
            <input type="file" name="modifierimagepokemon" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <input type="hidden" name="id" value="<?= $_GET['modifierpokemonid']; ?>">
        <div class="col-md-8 d-flex justify-content-center">
            <button type="submit" name="modifierpokemon" class="btn btn-dark">Modifier</button>
        </div>
    </div>
</form>