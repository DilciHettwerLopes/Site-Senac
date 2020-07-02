<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu site com Bootstrap</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <header class="pb-3">
        <div class="row flex-nowrap justify-content-between align-items-center pt-3 pb-3">
            <div class="col-4 pt-1">
                <a href="#" class="text-muted" id="data">
                    <?=date('d/m/Y')?>
                </a>
            </div>
            <div class="col-4 text-center">
                <a href="index.php">
                    <img id="logo" class="col-md-6" src="public/images/senac.png"> <!-- Logo Senac -->
                </a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="ead.html" aria-label="Pesquisar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                         stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"
                         viewBox="0 0 24 24" focusable="false">
                        <title>Pesquisar</title>
                        <circle cx="10.5" cy="10.5" r="7.5" />
                        <path d="M21 21l-5.2-5.2" />
                    </svg>
                </a>
                <a class="btn btn-sm btn-outline-secondary" href="ead.html" id="portal">Portal do Aluno</a>
            </div>
        </div>
        <div id="menu">
            <div class="nav-scroller">
                <nav class="nav d-flex justify-content-between">
                    <a class="p-2 text-muted" href="index.php?pagina=unidades">Unidades</a>
                    <a class="p-2 text-muted" href="index.php?pagina=cursos">Cursos</a>
                    <a class="p-2 text-muted" href="index.php?pagina=historia">Sobre</a>
                    <a class="p-2 text-muted" href="index.php?pagina=ead">EAD</a>
                    <a class="p-2 text-muted" href="index.php?pagina=contato">Fale Conosco</a>
                </nav>
            </div>
        </div>
    </header>