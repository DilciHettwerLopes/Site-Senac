<div class="table-responsive">
        <h2 class="display-5" id="title-table">Unidades</h2>
        <a href="index.php?pagina=unidades/formulario" class="btn btn-info">Cadastrar nova unidade</a>
        <?php
        $sqlUnidades = mysqli_query($link, "SELECT * FROM unidade ORDER BY nome ASC");
        if (mysqli_num_rows($sqlUnidades) > 0) {
        ?>
        <table class="table mt-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imagem</th>
                <th scope="col">Nome</th>
                <th scope="col">Endereço</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $x = 0;
            while ($rowUnidades = mysqli_fetch_object($sqlUnidades)) {
                $x++;
                ?>
                <tr>
                    <th scope="row"><?= $x ?></th>
                    <td> 
                    <img src = "../public/uploads/<?= $rowUnidades->arquivo;?>" width= "80">
                    </td>
                    <td><?= $rowUnidades->nome; ?></td>
                    <td><?= $rowUnidades->endereco; ?></td>
                    <td>
                    <?php
                      if($rowUnidades->total<1){
                        ?>
                        <a class="btn btn-danger" href="index.php?pagina=unidades/acoes&acao=apagar&id=<?= $rowUnidades->id; ?>">Apagar</a>
                        <?php }?>
                        <a class="btn btn-info" href="index.php?pagina=unidades/formulario&id=<?= $rowUnidades->id; ?>">Alterar</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php }else{
            ?>
            <div class="alert alert-warning mt-3 mb-3">Nenhum registro encontrado.</div>
            <?php
        }?>
    </div>
