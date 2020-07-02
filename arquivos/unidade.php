<?php
$Unidade = $_GET['id'];
$Unidade= mysqli_query($link,'SELECT * FROM unidade WHERE id='.$Unidade);
if(mysqli_num_rows($Unidade)<1){
    echo 'Unidade não encontrada.';
}else{
    $row = mysqli_fetch_object($Unidade);
    ?>
    <div class="navigation">
        <!-- Barra de navegação -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Página Inicial</a></li>
                <li class="breadcrumb-item"><a href="index.php?pagina=cursos">Unidades</a></li>
                <li class="breadcrumb-item" aria-current="page"><?=$row->nome?></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col">
            <h1><?=$row->nome?></h1>
            <hr>
        </div>
    </div>
    <div class="row pb-5">
        <div class="col-6">
            <img class="img-fluid" src="public/uploads/<?= $row->arquivo ?>"
                 alt="<?= $row->nome ?>">
        </div>
        <div class="col-6">
            <?=$row->endereco?>
        </div>
    </div>
    <?php
}