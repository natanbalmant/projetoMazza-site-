<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div id="corpo-form">
    <h1>Entrar</h1>
    <form method="POST">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="senha" placeholder="Senha">
        <input type="submit" value="ACESSAR" class="button_cad">
        <a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se</strong></a>
    </form>
    </div>
</body>
<?php
if (isset($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
//verificar se esta preenchido
    if (empty($email) && empty($senha)) {
        $u->conectar("projeto_login", "localhost", "natan", "1201");
        if ($u->msgErro == "") {

            if ($u->logar($email, $senha)) {
                header("location: areavagas.php");
            } else {
                echo "Email ou senha estão incorretos";
            }
        }else{
            echo "Erro: ".$u->msgErro;
        }
    } else {
        echo "Preencha todos os campos";
    }
}

?>
</html>
