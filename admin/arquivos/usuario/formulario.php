<?php

$usuario = mysqli_query($link,'SELECT * FROM usuario WHERE id='.$_SESSION['id']);
$usuario = mysqli_fetch_object($usuario);


?>
<div class="row">
    <div class="col-12 col-md-6">
        <h1>Alteração de dados do usuário</h1>
        <form method="POST" action="index.php?pagina=usuario/acoes" class="form-horizontal" id="form-usuario">
            <h2 class="display-5" id="titleform"><?=$titulo?></h2>
            <div class="form-group mb-3">
                <input type="text" value="<?=$usuario->nome?>" class="form-control" name="nome" id="nome" placeholder="Digite seu nome">
            </div>
            <div class="form-group mb-3">
                <input type="text" value="<?=$usuario->email?>" class="form-control" name="email" id="email" placeholder="Digite seu email">
            </div>

            <div class="form-group mb-3">
                <input type="password" value="" class="form-control" name="senha" id="senha" placeholder="Digite seu senha">
            </div>
            <div class="form-group mb-3">
                <input type="password" value="" class="form-control" name="senha_confirm" id="senha_confirm" placeholder="Confirme sua senha">
            </div>
            <div class="mt-4 pb-4">
                <button type="submit" class="btn btn-success">Salvar modificações</button>
                <button type="reset" class="btn btn-danger">Limpar formulário</button>
            </div>
        </form>
    </div>
</div>