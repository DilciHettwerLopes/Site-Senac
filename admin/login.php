
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administração Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="theme-color" content="#563d7c">
    <link href="../public/css/login.css" rel="stylesheet">
</head>
<body class="text-center">
<form class="form-signin" action="login.php" method="POST">
    <h1 class="h3 mb-3 font-weight-normal">Digite os dados</h1>
    <?php
        if($_POST){
            extract($_POST);
            if(empty($email) OR empty($senha)){
               echo '<div class="alert alert-danger">Preencha todos os campos</div>';
            }else{
                require_once "../includes/conecta.php";
               $busca = mysqli_query($link,"SELECT * FROM usuario WHERE email='$email' AND senha='".(hash('sha512',$chave.$senha))."'");
               if(mysqli_num_rows($busca)>0){
                   $row = mysqli_fetch_object($busca);
                   session_start();
                   $_SESSION['logado'] = true;
                   $_SESSION['id'] = $row->id;
                   $_SESSION['email'] = $row->email;
                   $_SESSION['nome'] = $row->nome;
                   header('Location:index.php');
               }else{
                   echo '<div class="alert alert-danger">Login inválido.</div>';
               }
            }
        }
    ?>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Digite o email" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Digite a senha" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
</form>
</body>
</html>
