<form class="container" action="index.php" method="POST" enctype="multipart/form-data">
    <div class="row col-md-12 justify-content-center">
        <div class="form-group col-md-8">
            <label>Ville</label>
            <input type="text" name="modifierville" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="inputCity">Champion</label>
            <input type="text" name="modifchampion" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="inputCity">Type</label>
            <input type="text" name="modifiertype" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="inputCity">Badge</label>
            <input type="text" name="modifierbadge" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="exampleFormControlFile1">Image du Champion</label>
            <input type="file" name="modifierimagechampion" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <input type="hidden" name="id" value="<?= $_GET['modifierchampionid']; ?>">
        <div class="col-md-8 d-flex justify-content-center">
            <button type="submit" name="modifierchampion" class="btn btn-dark">Modifier</button> 
        </div>
    </div>
</form>