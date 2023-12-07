<div class="con">
    <?php
    /** @var \App\Core\IAuthenticator $auth */
    /** @var \App\Models\produkt $data */
    $rastliny = $data[0];


    ?>

    <link rel="stylesheet" href="/public/css/Produkty.css">

    <?php foreach ($rastliny as $produkt) { ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <img class="card-img-top" src="<?php echo $produkt->getObrazok()?>" alt="Card image cap">
                <h5 class="card-title"><?php echo $produkt->getNazovPr()?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $produkt->getCena()?></h6>
                <p class="card-text"><?php echo $produkt->getPopisPr()?></p>
                <a href="#" class="card-link-green">Pridať do košíka</a>
                <a href="?c=recenzie" class="card-link-green">Recenzie</a>
            </div>
        </div>

    <?php } ?>


</div>