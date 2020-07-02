<div class="navigation">
    <!-- Barra de navegação -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Página Inicial</a></li>
            <li class="breadcrumb-item" aria-current="page">Unidades</li>
        </ol>
    </nav>
</div>
<div class="row">
    <?php
    $sqlUnidade = mysqli_query($link, "SELECT * FROM unidade GROUP BY nome ASC");
    if (mysqli_num_rows($sqlUnidade) < 1) {
        echo '<div class="col"><div class="alert alert-info col">Nenhuma unidade cadastrada.</div></div>';
    } else {
        while ($rowUnidades = mysqli_fetch_object($sqlUnidade)) {
            ?>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" height="200" src="public/uploads/<?= $rowUnidades->arquivo ?>"
                         alt="<?= $rowUnidades->nome ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $rowUnidades->nome ?></h5>
                        <p class="card-text"><?= $rowUnidades->endereco ?>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="index.php?pagina=unidades&id=<?=$rowUnidades->id?>" class="btn btn-primary">Saiba mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    } ?>
</div>