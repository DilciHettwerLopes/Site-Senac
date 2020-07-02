<?php
$id = @$_GET['id'];

if(is_numeric($id) && !empty($id) && $_GET['acao']=="apagar"){
    $busca = mysqli_query($link,'SELECT arquivo FROM curso WHERE id='.$id);
    $busca = mysqli_fetch_object($busca);
    if(unlink('../public/uploads/'.$busca->arquivo)) {
        mysqli_query($link, "DELETE FROM curso WHERE id=$id");
        if (mysqli_affected_rows($link) > 0) {
            $_SESSION['mensagem'] = '<div class="alert alert-success">Curso apagado com sucesso.</div>';
        } else {
            $_SESSION['mensagem'] = '<div class="alert alert-danger">Falha ao apagar</div>';
        }
    }else{
        $_SESSION['mensagem'] = '<div class="alert alert-danger">Falha ao apagar o arquivo no servidor.</div>';
    }
    header('Location:index.php?pagina=cursos/listagem');
}

if($pagina=='cursos/acoes' && $_POST) {
    extract($_POST);
    if(empty($titulo) || empty($manchete) || empty($conteudo)){
        $_SESSION['mensagem'] = '<div class="alert alert-danger">Preencha corretamente todos os campos obrigatórios.</div>';
        if (!empty($id)) {
            header('Location:index.php?pagina=cursos/formulario&id='.$id);
        }else{
            header('Location:index.php?pagina=cursos/formulario');
        }
    }else {
        $arquivo =  $_FILES['arquivo'];
        $nomeArquivo = md5($arquivo['name'].date('YmdHis')).'.'. pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        if (!empty($id)) {
            $arquivoDB = $arquivo_auxiliar;
            if(!empty($nomeArquivo)) {
                if (move_uploaded_file($arquivo['tmp_name'], '../public/uploads/' . $nomeArquivo)) {
                    unlink('../public/uploads/'.$arquivo_auxiliar);
                    $arquivoDB = $nomeArquivo;
                }
            }
            $update = mysqli_query($link, "UPDATE curso SET arquivo='$arquivoDB',titulo='$titulo',manchete='$manchete',conteudo='$conteudo' WHERE id=$id");
            if (mysqli_affected_rows($link) > 0) {
                $_SESSION['mensagem'] = '<div class="alert alert-success">Curso alterado com sucesso.</div>';
            } else {
                $_SESSION['mensagem'] = '<div class="alert alert-danger">Falha ao gravar</div>';
            }
        } else {
            if(!empty($nomeArquivo)) {
                if (move_uploaded_file($arquivo['tmp_name'], '../public/uploads/' . $nomeArquivo)) {
                    $insert = mysqli_query($link, "INSERT INTO curso VALUES (null,'$titulo','$manchete','$conteudo','$nomeArquivo')");
                    if (mysqli_affected_rows($link) > 0) {
                        $_SESSION['mensagem'] = '<div class="alert alert-success">Curso cadastrado com sucesso.</div>';
                    } else {
                        $_SESSION['mensagem'] = '<div class="alert alert-danger">Falha ao gravar</div>';
                    }
                } else {
                    $_SESSION['mensagem'] = '<div class="alert alert-danger">Falha ao enviar o arquivo.</div>';
                }
            }else{
                $_SESSION['mensagem'] = '<div class="alert alert-danger">Selecione um arquivo.</div>';
                header('Location:index.php?pagina=cursos/formulario');
                exit();
            }
        }
        header('Location:index.php?pagina=cursos/listagem');
    }
}