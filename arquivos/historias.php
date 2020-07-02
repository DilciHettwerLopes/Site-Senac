<div class="navigation">
    <!-- Barra de navegação -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Página Inicial</a></li>
            <li class="breadcrumb-item" aria-current="page">Sobre</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12">
        <div class="input-group mb-3">
            <form method="POST" action="index.php?pagina=sobre" class="input-group mb-3">
                </form>
        </div>
    </div>
</div>
<div class="row">
    <?php
    $sqlHistoria = mysqli_query($link, "SELECT * FROM historia $busca GROUP BY titulo ASC");
    if (mysqli_num_rows($sqlHistoria) < 1) {
        echo '<div class="col"><div class="alert alert-info col">Nenhuma historia cadastrada.</div></div>';
    } else {
        while ($rowHistorias = mysqli_fetch_object($sqlHistoria)) {
            ?>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" height="200" src="public/uploads/<?= $rowHistorias->arquivo ?>"
                         alt="<?= $rowHistorias->titulo ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $rowHistorias->titulo ?></h5>
                        <p class="card-text"><?= $rowHistorias->descricao ?>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="index.php?pagina=sobre&id=<?=$rowHistorias->id?>" class="btn btn-primary">Saiba mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    } ?>
</div>