<?php
$curso = $_GET['id'];
$curso = mysqli_query($link,'SELECT * FROM curso WHERE id='.$curso);
if(mysqli_num_rows($curso)<1){
    echo 'Curso não encontrado.';
}else{
    $row = mysqli_fetch_object($curso);
    ?>
    <div class="navigation">
        <!-- Barra de navegação -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Página Inicial</a></li>
                <li class="breadcrumb-item"><a href="index.php?pagina=cursos">Cursos</a></li>
                <li class="breadcrumb-item" aria-current="page"><?=$row->titulo?></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col">
            <h1><?=$row->titulo?></h1>
            <hr>
        </div>
    </div>
    <div class="row pb-5">
        <div class="col-6">
            <img class="img-fluid" src="public/uploads/<?= $row->arquivo ?>"
                 alt="<?= $row->titulo ?>">
        </div>
        <div class="col-6">
            <?=$row->conteudo?>
        </div>
    </div>
    <?php
}