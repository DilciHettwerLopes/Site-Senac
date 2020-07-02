<?php
$id = $_GET['id'];

if(is_numeric($id) && !empty($id)){
    $titulo = "Formulário de alteração de publicação";
    $botao = 'Atualizar';
    $publicacao = mysqli_query($link,"SELECT * FROM publicacao WHERE id=$id");
    if(mysqli_num_rows($publicacao)<1){
        echo 'Publicação não encontrada';
        exit();
    }
    $buscaPublicacao = mysqli_fetch_object($publicacao);
}else{
    $titulo = "Formulário de cadastro de publicação";
    $botao = 'Cadastrar';
    $id = '';
}

?>
<div class="row">
    <div class="col-12 col-md-6">
        <form method="POST" action="index.php?pagina=publicacoes/acoes&id=<?=$id?>" class="form-horizontal" id="form-publicacoes">
            <h2 class="display-5" id="titleform"><?=$titulo?></h2>
            <div class="form-group mb-3">
                <input type="text" value="<?=$buscaPublicacao->aluno?>" class="form-control" name="aluno" id="aluno" placeholder="Digite o nome aluno">
            </div>
            <div class="form-group mb-3">
                <select name="curso" class="form-control" required>
                    <option value="">selecione o curso</option>
                    <?php
                        $cursos = mysqli_query($link,'SELECT * FROM curso ORDER BY titulo ASC');
                        while($curso = mysqli_fetch_object($cursos)){
                            echo '<option value="'.$curso->id.'" '.($buscaPublicacao->curso==$curso->id?"selected":null).'>'.$curso->titulo.'</option>';
                        }
                    ?>
                </select>
                <!--<input type="text" value="<?=$buscaPublicacao->curso?>" class="form-control" name="curso" id="curso" placeholder="Digite o nome do curso">-->
            </div>
            <div class="form-group mb-3">
                <input type="date" value="<?=$buscaPublicacao->data?>" class="form-control col-12 col-md-5" name="data" id="data" placeholder="Selecione a data">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="conteudo" id="conteudo" placeholder="Digite o conteúdo da publicação"><?=trim($buscaPublicacao->conteudo)?></textarea>
            </div>
            <div class="mt-4 pb-4">
                <button type="submit" class="btn btn-success" id="btn-enviar"><?=$botao?> publicação</button>
                <button type="reset" class="btn btn-danger">Limpar formulário</button>
            </div>
        </form>
    </div>
</div>