<?php
$historia = mysqli_query($link,'SELECT * FROM historia');
if(mysqli_num_rows($historia)<1){
    echo 'História não encontrado.';
}else{
    $row = mysqli_fetch_object($historia);
    ?>
    <div class="navigation">
        <!-- Barra de navegação -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Página Inicial</a></li>
                <li class="breadcrumb-item" aria-current="page">História</li>
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
        <div class="col">
            <?=$row->descricao?>
        </div>
    </div>
    <?php
}