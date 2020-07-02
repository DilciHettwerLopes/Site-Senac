<?php
    $titulo = "Formulário de alteração da história";
    $botao = 'Atualizar história';
    $historia = mysqli_query($link,"SELECT * FROM historia");
    if(mysqli_num_rows($historia)<1){
        echo 'Nenhum registro encontrado';
        exit();
    }
    $buscaHistoria = mysqli_fetch_object($historia);

?>
<form method="POST" action="index.php?pagina=sobre/acoes" class="form-horizontal">
    <h2 class="display-5" id="titleform"><?=$titulo?></h2>
    <div class="input-group mb-3">
        <input type="text" value="<?=$buscaHistoria->titulo?>" class="form-control" name="titulo" placeholder="Digite o titulo">
    </div>
    <div class="input-group">
        <textarea class="form-control" id="summernote" name="descricao" placeholder="Digite o descrição"><?=trim($buscaHistoria->descricao)?></textarea>
    </div>
    <div class="mt-4 pb-4">
        <button type="submit" class="btn btn-success"><?=$botao?></button>
    </div>
</form>