<div>
    <?php// var_dump($positions); ?>
    <?php //var_dump($_SESSION); ?>
    
    <table class="table table-striped table-hover">
        <thead>
            <tr>
               <th>Symbol</th> 
               <th>Name</th>
               <th>Shares</th>
               <th>Price Per Share</th>
               <th>Total</th>
            </tr>
        </thead>
        <?php foreach ($positions as $position): ?>
    <tr>
        <td align="left"><?= $position["symbol"] ?></td>
        <td align="left"><?= $position["name"] ?></td>
        <td align="left"><?= $position["shares"] ?></td>
        <td align="left"><?= "$".$position["price"] ?></td>
        <td align="left"><?= "$".number_format($position["price"] * $position["shares"], 2, '.', ',') ?></td>
    </tr>
    <?php endforeach ?>
    </table>


    <div align="right" >
        <h4> 
            <strong> Cash available <?= "$".number_format($cash, 2, '.', ',') ?> </strong>
        </h4>
    </div>
</div>
