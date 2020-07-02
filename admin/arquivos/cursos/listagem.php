    <div class="table-responsive">
        <h2 class="display-5" id="title-table">Cursos</h2>
        <a href="index.php?pagina=cursos/formulario" class="btn btn-info mb-4">Cadastrar novo curso</a>
        <?php
        $sqlCursos = mysqli_query($link, "SELECT *,(SELECT COUNT(id) FROM publicacao WHERE publicacao.curso=curso.id) as total FROM curso ORDER BY titulo ASC");
        if (mysqli_num_rows($sqlCursos) > 0) {
        ?>
        <table class="table table-striped" data-toggle="data-tables" style="width:100%">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imagem</th>
                <th scope="col">Título</th>
                <th scope="col">Manchete</th>
                <th scope="col">Conteúdo</th>
                <th scope="col">Opções</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $x = 0;
            while ($rowCursos = mysqli_fetch_object($sqlCursos)) {
                $x++;
                ?>
                <tr>
                    <th scope="row"><?= $x ?></th>
                    <td>
                        <img src="../public/uploads/<?= $rowCursos->arquivo; ?>" width="80">
                    </td>
                    <td><?= $rowCursos->titulo; ?></td>
                    <td><?= $rowCursos->manchete; ?></td>
                    <td><?= $rowCursos->conteudo; ?></td>
                    <td>
                        <?php
                            if($rowCursos->total<1){
                        ?>
                        <a class="btn btn-danger" href="index.php?pagina=cursos/acoes&acao=apagar&id=<?= $rowCursos->id; ?>">Apagar</a>
                        <?php }?>
                        <a class="btn btn-info" href="index.php?pagina=cursos/formulario&id=<?= $rowCursos->id; ?>">Alterar</a>
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
