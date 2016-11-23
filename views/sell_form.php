<form action="sell.php" method="post">
    <fieldset>
        
        <div class="form-group">
            <select class="form-control" name="symbol">
                <option disabled selected value="">Symbol</option>
                <?php foreach ($positions as $position) {
                    //Echo = print dans le html
                    // On utilise le point pour la concatenation
                    // Snippet tiré de la page source de CS50 Finance: <option value="FB">FB</option>
                    // Ici on le reutilise dans une boucle pour iterer 
                    echo "<option value='".$position."'>".$position."</option>";           
                }?>
                </select>
        </div>
      
        <div class="form-group">
            <button class="btn btn-default" type="Sell">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Sell
            </button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">log in</a>
</div>
