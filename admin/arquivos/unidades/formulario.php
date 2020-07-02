<?php
$id = $_GET['id'];

if(is_numeric($id) && !empty($id)){
    $titulo = "Formulário de alteração de unidade";
    $botao = 'Atualizar';
    $unidade = mysqli_query($link,"SELECT * FROM unidade WHERE id=$id");
    if(mysqli_num_rows($unidade)<1){
        echo 'Unidade não encontrado';
        exit();
    }
    $buscaUnidade = mysqli_fetch_object($unidade);
}else{
    $nome = "Formulário de cadastro de unidade";
    $botao = 'Cadastrar';
    $id = '';
}

?>
<form enctype="multipart/form-data" method="POST" action="index.php?pagina=unidades/acoes&id=<?=$id?>" class="form-horizontal">
    <h2 class="display-5" id="titleform"><?=$nome?></h2>
    <div class="input-group mb-3">
        <input type="text" value="<?=$buscaUnidade->nome?>" class="form-control" name="nome" placeholder="Digite o nome da unidade">
    </div>
    <div class="input-group mb-3">
        <input type="text" value="<?=$buscaUnidade->endereco?>" class="form-control" name="endereco" placeholder="Digite o endereço da unidade">
    </div>
     <div class="input-group mt-3">
    <?php
     if(!empty($buscaUnidade->arquivo) && !empty(id)){
         echo '<img src="../public/uploads/'.$buscaUnidade->arquivo.'" width = 150">';
         echo '<input type="hidden" name="arquivo_auxiliar" value="'.$buscaUnidade->arquivo.'">';
     }
?>
        <input type="file" name="arquivo"> 
    </div>
    <div class="mt-4 pb-4">
        <button type="submit" class="btn btn-success"><?=$botao?>Unidade</button>
        <button type="reset" class="btn btn-danger">Limpar formulário</button>
    </div>
</form>