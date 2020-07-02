<?php
if($pagina=='sobre/acoes' && $_POST) {
    extract($_POST);
    if(empty($titulo) || empty($descricao)){
        $_SESSION['mensagem'] = '<div class="alert alert-danger">Preencha corretamente todos os campos obrigatórios.</div>';
        header('Location:index.php?pagina=sobre/formulario');
    }else {
        $update = mysqli_query($link, "UPDATE historia SET titulo='$titulo',descricao='$descricao'");
        if (mysqli_affected_rows($link) > 0) {
            $_SESSION['mensagem'] = '<div class="alert alert-success">História alterada com sucesso.</div>';
        } else {
            $_SESSION['mensagem'] = '<div class="alert alert-danger">Falha ao gravar</div>';
        }
        header('Location:index.php?pagina=sobre/formulario');
    }
}