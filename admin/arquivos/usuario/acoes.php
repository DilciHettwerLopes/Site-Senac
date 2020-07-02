<?php

if($pagina=='usuario/acoes' && $_POST) {
    extract($_POST);
    if(!empty($nome) && !empty($email)) {
        $updateSenha = '';
        if(!empty($senha) || !empty($senha_confirm)){
            if($senha==$senha_confirm) {
                $updateSenha = " ,senha='".hash('sha512',$chave.$senha)."'";
            }else{
                $retorno = array(
                    'result' => true,
                    'mensagem' => 'Confirmação da senha inválida',
                    'url' => 'index.php?pagina=usuario/formulario'
                );
                $_SESSION['mensagem'] = '<div class="alert alert-warning">Confirmação da senha inválida.</div>';
                echo json_encode($retorno);
                header('Location:index.php?pagina=usuario/formulario');
                exit();
            }
        }

        $update = mysqli_query($link, "UPDATE usuario SET nome='$nome',email='$email' $updateSenha WHERE id=".$_SESSION['id']);
        if (mysqli_affected_rows($link) > 0) {
          header('Location:logout.php');
          exit();
        } else {
            $retorno = array(
                'result' => false,
                'mensagem' => 'Falha ao gravar, verifique seus dados e tente novamente'
            );
            $_SESSION['mensagem'] = '<div class="alert alert-danger">Seu usuário não sofreu alterações.</div>';
        }
    }else{
        $retorno = array(
            'result' => false,
            'mensagem' => 'Preencha todos os campos'
        );
        $_SESSION['mensagem'] = '<div class="alert alert-danger">Preencha todos os campos</div>';
    }
    json_encode($retorno);
    header('Location:index.php?pagina=usuario/formulario');
}