<form class="container" action="index.php" method="POST" enctype="multipart/form-data">
    <div class="row col-md-12 justify-content-center">
        <div class="form-group col-md-8">
            <label>Ville</label>
            <input type="text" name="ville" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="inputCity">Champion</label>
            <input type="text" name="champion" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="inputCity">Type</label>
            <input type="text" name="type" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="inputCity">Badge</label>
            <input type="text" name="badge" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-8">
            <label for="exampleFormControlFile1">Image du Champion</label>
            <input type="file" name="imagechampion" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="col-md-8 d-flex justify-content-center">
            <button type="submit" name="envoyerchampion" class="btn btn-dark">Envoyer</button> 
        </div>
    </div>
</form>