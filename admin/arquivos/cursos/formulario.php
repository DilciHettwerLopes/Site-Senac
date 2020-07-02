<?php
$id = $_GET['id'];

if(is_numeric($id) && !empty($id)){
    $titulo = "Formulário de alteração de cursos";
    $botao = 'Atualizar';
    $curso = mysqli_query($link,"SELECT * FROM curso WHERE id=$id");
    if(mysqli_num_rows($curso)<1){
        echo 'Curso não encontrado';
        exit();
    }
    $buscaCurso = mysqli_fetch_object($curso);
}else{
    $titulo = "Formulário de cadastro de cursos";
    $botao = 'Cadastrar';
    $id = '';
}

?>
<form enctype="multipart/form-data" method="POST" action="index.php?pagina=cursos/acoes&id=<?=$id?>" class="form-horizontal">
    <h2 class="display-5" id="titleform"><?=$titulo?></h2>
    <div class="input-group mb-3">
        <input type="text" value="<?=$buscaCurso->titulo?>" class="form-control" name="titulo" placeholder="Digite o titulo">
    </div>
    <div class="input-group mb-3">
        <input type="text" value="<?=$buscaCurso->manchete?>" class="form-control" name="manchete" placeholder="Digite a manchete">
    </div>
    <div class="input-group">
        <textarea class="form-control" name="conteudo" placeholder="Digite o conteúdo"><?=trim($buscaCurso->conteudo)?></textarea>
    </div>
    <div class="input-group mt-3">
        <?php
            if(!empty($buscaCurso->arquivo) && !empty($id)){
                echo '<img src="../public/uploads/'.$buscaCurso->arquivo.'" width="150">';
                echo '<input type="hidden" name="arquivo_auxiliar" value="'.$buscaCurso->arquivo.'">';
            }
        ?>
        <input type="file" name="arquivo">
    </div>
    <div class="mt-4 pb-4">
        <button type="submit" class="btn btn-success"><?=$botao?> cursos</button>
        <button type="reset" class="btn btn-danger">Limpar formulário</button>
    </div>
</form>