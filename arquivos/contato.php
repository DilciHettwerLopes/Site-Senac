<div class="navigation">
    <!-- Barra de navegação -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Página Inicial</a></li>
            <li class="breadcrumb-item" aria-current="page">Fale conosco</li>
        </ol>
    </nav>
</div>
<div class="row mb-2">
    <div class="col-md-8">
        <?php
            if($_POST){
                extract($_POST);
                if(empty($nome) || empty($assunto) || empty($email) || empty($mensagem)){
                    echo '<div class="alert alert-danger">Preencha corretamente todos os campos obrigatórios.</div>';
                }else{
                    $mensagem = $nome.' - '.$telefone.' - '.$mensagem;
                    if(mail("dilcylopes@gmail.com",$assunto,$mensagem)){
                        echo '<div class="alert alert-sucesso">Mensagem enviada com sucesso.</div>';
                    }else{
                        echo '<div class="alert alert-danger">Falha ao enviar a mensagem.</div>';
                    }
                }
            }else{
        ?>
        <form method="POST" action="index.php?pagina=contato" class="form-horizontal">
            <h2 class="display-5" id="titleform">Formulário de Contato</h2>
            <p>Utilize o formulário abaixo para nos enviar sugestões, críticas, dúvidas ou elogios.</p>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                           <svg class="bi bi-person-square" width="1em" height="1em"
                                viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                    d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z"
                                    clip-rule="evenodd" />
                              <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd" />
                           </svg>
                        </span>
                </div>
                <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                           <svg class="bi bi-at" width="1em" height="1em"
                                viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                    d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"
                                    clip-rule="evenodd" />
                           </svg>
                        </span>
                </div>
                <input type="text" class="form-control" name="email" placeholder="Digite seu e-mail">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                           <svg class="bi bi-phone" width="1em" height="1em"
                                viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                    d="M11 1H5a1 1 0 00-1 1v12a1 1 0 001 1h6a1 1 0 001-1V2a1 1 0 00-1-1zM5 0a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V2a2 2 0 00-2-2H5z"
                                    clip-rule="evenodd" />
                              <path fill-rule="evenodd" d="M8 14a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                           </svg>
                        </span>
                </div>
                <input type="text" class="form-control" name="telefone" placeholder="(00)0000-0000">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                           <svg class="bi bi-envelope" width="1em" height="1em"
                                viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                    d="M14 3H2a1 1 0 00-1 1v8a1 1 0 001 1h12a1 1 0 001-1V4a1 1 0 00-1-1zM2 2a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H2z"
                                    clip-rule="evenodd" />
                              <path fill-rule="evenodd"
                                    d="M.071 4.243a.5.5 0 01.686-.172L8 8.417l7.243-4.346a.5.5 0 01.514.858L8 9.583.243 4.93a.5.5 0 01-.172-.686z"
                                    clip-rule="evenodd" />
                              <path
                                  d="M6.752 8.932l.432-.252-.504-.864-.432.252.504.864zm-6 3.5l6-3.5-.504-.864-6 3.5.504.864zm8.496-3.5l-.432-.252.504-.864.432.252-.504.864zm6 3.5l-6-3.5.504-.864 6 3.5-.504.864z" />
                           </svg>
                        </span>
                </div>
                <input type="text" class="form-control" name="assunto" placeholder="Digite o assunto da mensagem">
            </div>
            <p>Mensagem:</p>
            <div class="input-group">
                <textarea class="form-control" name="mensagem" placeholder="Digite o conteúdo da mensagem"></textarea>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-success" id="formsend">Enviar contato</button>
                <button type="reset" class="btn btn-danger" id="formclear">Limpar formulário</button>
            </div>
        </form>
        <?php } ?>
    </div>
    <div class="col-md-4">
        <!--Caixa texto -->
        <div class="card  mb-3 mt-2">
            <div class="card-header">Trilhe seu sucesso!</div>
            <div class="card-body">
                <p class="card-text">O sucesso nasce do querer, da determinação e persistência em se chegar a um objetivo.
                    Mesmo não atingindo o alvo, quem busca e vence obstáculos, no mínimo fará coisas admiráveis.
                </p>
                <p class="card-text"><small class="text-muted">- José de Alencar</small></p>
            </div>
        </div>
    </div>
</div>
<!--Google map-->
<hr class="my-4">
<!-- Linha -->
<div class="card  mb-5">
    <div class="card-header">Onde nos encontrar:</div>
    <div class="card-body">
        <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14253.969645526988!2d-53.52589759999999!3d-26.728658251992208!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94fa5c5f9cf04df1%3A0x402acc9154c0bae4!2sFaculdade%20Senac%20S%C3%A3o%20Miguel%20do%20Oeste!5e0!3m2!1spt-BR!2sbr!4v1585542689278!5m2!1spt-BR!2sbr"
                frameborder="0" style="border:0" allowfullscreen>
            </iframe>
        </div>
    </div>
</div>
</div>