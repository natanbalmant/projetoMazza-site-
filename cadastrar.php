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
<div id="corpo-form-Cad">
    <h1>Cadastrar</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
        <input type="tel" name="telefone" placeholder="Telefone" maxlength="30">
        <input type="email" name="email" placeholder="Email" maxlength="40">
        <input type="password" name="senha" placeholder="Senha" maxlength="15">
        <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
        <input type="submit" value="Cadastrar" class="button_cad">
    </form>
</div>
<?php
//verificar se clicou no botao
if (isset($_POST['nome'])){
  $nome = addslashes($_POST['nome']);
  $telefone = addslashes($_POST['telefone']);
  $email = addslashes($_POST['email']);
  $senha = addslashes($_POST['senha']);
  $confirmarSenha = addslashes($_POST['confSenha']);
  //verificar se esta preenchido
  if (!empty($nome) && !empty($telefone) && !empty($email) &&
      !empty($senha) && !empty($confirmarSenha)){
      $u->conectar("projeto_login", "localhost", "natan", "1201");
      if ($u->msgErro == ""){
          if ($senha == $confirmarSenha){
              if($u->cadastrar($nome, $telefone, $email, $senha)){
                  ?>
                <div id="msg-suc">
                  echo "Cadastrado com sucesso! Acesse para entrar";
                </div>
                <?php
                }else{
                  ?>
                  <div class="msg-erro">
                  Email ja cadastrado
                  </div>
                <?php
                }
          }else{
              ?>
              <div class="msg-erro">
              Senha e Confirmar Senha não correspondem!
              </div>
              <?php
          }

      }else{
          echo "Erro: ".$u->msgErro;
      }
  }else{
      ?>
      <div class="msg-erro">
      Preencha todos os campos
      </div>
      <?php
  }
}
?>
</body>
</html>

