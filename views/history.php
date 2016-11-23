<div>
    <?php// var_dump($positions); ?>
    <?php //var_dump($_SESSION); ?>
    <table class="table table-striped table-hover">
        <!--copié depuis portfolio.php comme modèle --> 
        <thead>
            <tr>
               <th>Transaction</th> 
               <th>Date/Time</th>
               <th>Symbol</th>
               <th>Shares</th>
               <th>Price</th>
            </tr>
        </thead>
        
         <?php //var_dump($histories); ?>

        <?php foreach ($histories as $history): ?>
    <tr>
        <?//php var_dump($history) ?>
        <td align="left"><?= $history["transaction"] ?></td>
        <td align="left"><?= $history["date"] ?></td>
        <td align="left"><?= $history["symbol"] ?></td>
        <td align="left"><?= $history["share"] ?></td>
        <td align="left"><?= "$".$history["price"] ?></td>
    </tr>
    <?php endforeach ?>
    </table>
</div>
