    <div class="table-responsive">
        <h2 class="display-5" id="title-table">Últimas publicações</h2>
        <a href="index.php?pagina=publicacoes/formulario" class="btn btn-info mb-4">Cadastrar nova publicação</a>
        <?php
        $sqlPublicacoes = mysqli_query($link, "SELECT publicacao.*,DATE_FORMAT(data,'%d/%m/%Y') data,curso.titulo FROM publicacao INNER JOIN curso ON curso.id=publicacao.curso ORDER BY aluno ASC");
        if (mysqli_num_rows($sqlPublicacoes) > 0) {
        ?>
        <table class="table table-striped" data-toggle="data-tables" style="width:100%">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Aluno</th>
                <th scope="col">Curso</th>
                <th scope="col">Data</th>
                <th scope="col">Opções</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $x = 0;
            while ($rowPublicacoes = mysqli_fetch_object($sqlPublicacoes)) {
                $x++;
                ?>
                <tr>
                    <th scope="row"><?= $x ?></th>
                    <td><?= $rowPublicacoes->aluno; ?></td>
                    <td><?= $rowPublicacoes->titulo; ?></td>
                    <td><?= $rowPublicacoes->data; ?></td>
                    <td>
                        <a class="btn btn-danger btn-apagar" href="index.php?pagina=publicacoes/acoes&acao=apagar&id=<?= $rowPublicacoes->id; ?>">Apagar</a>
                        <a class="btn btn-info" href="index.php?pagina=publicacoes/formulario&id=<?= $rowPublicacoes->id; ?>">Alterar</a>
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
