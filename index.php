<?php
require_once "includes/conecta.php";
require_once "includes/header.php";//faz a inclusão do arquivo de cabeçalho
    $pagina = @$_GET['pagina'];
    if(empty($pagina)){//verifica se tem algo na url
        require_once "arquivos/home.php";//se não tiver carrega a home.php
    } else {//se existir algo na url
        if(file_exists("arquivos/$pagina.php")) {//testa se existe um arquivo com o valor que veio pela variável página
            require_once "arquivos/$pagina.php";//inclui o arquivo da variável página
        }else{//se não existir o arquivo que ele quer acessar exibe uma página de 404
            require_once "arquivos/404.php";
        }
    }
require_once "includes/footer.php";////faz a inclusão do arquivo de rodapé