<?php
/** @var \App\Models\recenzie[] $recenzie */
/** @var \App\Models\produkt[] $produkty */

$recenzie = $data[0];
$produkty = $data[1];

/** @var \App\Core\IAuthenticator $auth */
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<link rel="stylesheet" href="/public/css/Recenzie.css">

<div>
<?php if ($auth->isLogged()) { ?>


        <form id="formular" action="/?c=recenzie&a=naplnenie" method="post">
            <div class="cont">
                <h1>Napíš recenziu</h1>
                <p>Prosím Vás, vyplňte nasledujúce údaje</p>
                <hr>

                <div class="form-group col-md-6">
                    <label for="nazovProduktu" class="bold">Vyberte Produkt</label>
                    <select class="form-control" id="nazovProduktu" name="nazovProduktu">
                        <?php foreach ($produkty as $produkt) : ?>
                            <option value="<?= $produkt->getIdPr() ?>"><?= $produkt->getNazovPr() ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="recenzia"><b>Recenzia</b></label>
                    <textarea placeholder="Zadajte Recenziu" id="recenzia" name="recenzia" required></textarea>

                    <div class="hodnotenie-container">
                        <label for="hodnotenie" class="bold">Priradte hodnotenie</label>
                        <select class="form-control" id="hodnotenie" name="hodnotenie">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="clearfix">
                        <button type="submit" name="submit" class="odoslat">Odoslať recenziu</button>
                    </div>
                </div>
            </div>
        </form>
<?php } else {?>
    <p>Pre pridanie recenzie sa musíte prihlásiť</p>
<?php } ?>
    </div>

<?php foreach ($recenzie as $recenzia) : ?>
    <div class="card">
        <div class="card-header">
            Recenzia
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p><?= $recenzia->getHodnotenie() ?></p>
                <p><?= $recenzia->getRecenzia() ?></p>
                <footer class="blockquote-footer"><?= \App\Models\zakaznik::getOne($recenzia->getIdZak())->getLogin() ?>
                    <cite title="Source Title"><?= $recenzia->getDatum() ?></cite></footer>
            </blockquote>
            <a href="?c=recenzie&a=vymazanieRecenzie&id=<?php echo $recenzia->getId() ?>
            "data-toggle="modal" data-target="#zmazM_<?php echo $recenzia->getId() ?>">Zmazať</a>
            <!-- Tlačidlo pre otvorenie modálneho okna -->
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal">Editovať</button>


        </div>
    </div>


    <!-- Modálne okno -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title bold" id="editModalLabel">Editovať Recenziu</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulárna časť pre editáciu -->
                    <form id="formEditBlogpost" method="post" action="?c=recenzie&a=editRecenzie&id=<?php echo $recenzia->getId()?>">
                        <div class="form-group">
                            <label for="editBlogText" class="bold">Text</label>
                            <textarea required maxlength="100" minlength="5" type="textarea" class="form-control" rows="10" id="editRecenzieT" name="editRecenzie"><?php echo $recenzia->getRecenzia()?></textarea>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>
