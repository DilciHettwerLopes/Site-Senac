<?php
$id = @$_GET['id'];

if(is_numeric($id) && !empty($id) && $_GET['acao']=="apagar"){
    mysqli_query($link,"DELETE FROM publicacao WHERE id=$id");
    if(mysqli_affected_rows($link)>0){
        $retorno = array(
            'result' => true,
            'mensagem' => 'Publicação apagada com sucesso.'
        );
    }else{
        $retorno = array(
            'result' => false,
            'mensagem' => 'Falha ao apagar, atualize sua página.'
        );
    }
    echo json_encode($retorno);
}

if($pagina=='publicacoes/acoes' && $_POST) {
    extract($_POST);
    if(empty($aluno) || empty($curso) || empty($data) || empty($conteudo)){
        $_SESSION['mensagem'] = '<div class="alert alert-danger">Preencha corretamente todos os campos obrigatórios.</div>';
        if (!empty($id)) {
            header('Location:index.php?pagina=publicacoes/formulario&id='.$id);
        }else{
            header('Location:index.php?pagina=publicacoes/formulario');
        }
    }else {
        if (!empty($id)) {
            $update = mysqli_query($link, "UPDATE publicacao SET aluno='$aluno',curso='$curso',data='$data',conteudo='$conteudo' WHERE id=$id");
            if (mysqli_affected_rows($link) > 0) {
                $retorno = array(
                    'result' => true,
                    'mensagem' => 'Publicação alterada com sucesso',
                    'url' => 'index.php?pagina=publicacoes/listagem'
                );
                $_SESSION['mensagem'] = '<div class="alert alert-success">Publicação alterada com sucesso.</div>';
            } else {
                $retorno = array(
                    'result' => false,
                    'mensagem' => 'Falha ao gravar, verifique seus dados e tente novamente'
                );
                $_SESSION['mensagem'] = '<div class="alert alert-danger">Falha ao gravar</div>';
            }
        } else {
            $insert = mysqli_query($link, "INSERT INTO publicacao VALUES (null,'$aluno','$curso','$data','$conteudo')");
            if (mysqli_affected_rows($link) > 0) {
                $retorno = array(
                    'result' => true,
                    'mensagem' => 'Publicação cadastrada com sucesso',
                    'url' => 'index.php?pagina=publicacoes/listagem'
                );
                $_SESSION['mensagem'] = '<div class="alert alert-success">Publicação cadastrada com sucesso.</div>';
            } else {
                $retorno = array(
                    'result' => false,
                    'mensagem' => 'Falha ao gravar, verifique seus dados e tente novamente'
                );
                $_SESSION['mensagem'] = '<div class="alert alert-danger">Falha ao gravar</div>';
            }
        }        

        echo json_encode($retorno);
    }
}