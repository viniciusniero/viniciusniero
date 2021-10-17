<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: paineldeprodutos.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}
?>

<!DOCTYPE html>
<html lang="PT-BR">
     <meta charset="UTF-8"
     <head>
      <title>Tela de login</title>
      <meta name="viewport" content="width=divice-width, initial-scale=1.0 maximun-scale=1.0"/>
     </head>
       <style>
         *{
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}
html.body{
    height: 100%;
    overflow-y: hidden;
}

.center{
    display: flex;
    flex-wrap: wrap;
    max-width: 1100px;
    margin:0 auto;
    padding: 0 2%;
}
header{
    padding:20px 0;
}
.logo{
    width: 50%;
  
}
.menu{
    width: 50%;
    text-align: right;
}
.menu a{
    color: black;
    text-decoration: none;
    font-weight: bold;
    margin-left: 15px;
}
.login{
  background-color: rgb(255, 255, 255);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  padding: 50px;
  border-radius: 20px;
}
input{
  padding: 15px;
  border: blue;
  font-size: 15px;
  border-radius: 10px;
}
button{
  color: white;
  background-color: rgb(0, 0, 0);
  padding: 10px;
  border: none;
  width: 100%;
  border-radius: 10px;
  font-size: 15px;
}
button:hover{
  background-color: rgb(1, 192, 255);
  cursor: pointer;
}

       </style>
      
       <header>
        <div class="center">
          <div class="logo"><img src="logosite.png" alt="imagem" height="120" width="120" /></div><!--logo-->
          <div class="menu">
          <a href="index.html">Inicio</a>
          <a href="#">Funcionalidades</a>
          <a href="#">Sobre</a>
          <a href="login.html">Login</a>
          </div><!--menu-->
          </div><!--center-->

          <div class="login">
            <h1>Login</h1>
            <form action= "" method ="POST">
            <input type="text" placeholder="E-mail" required>
            <br><br>
            <input type="password" placeholder="Senha"required >
            <button>Enviar</button>
          <p>Não tem uma conta ?<p>
            <a href="cadastro.html">Cadastre-se</a>
          </div>
            </form>
            
          
          </div>
          
        </header>

  <body>
    <div style="height: 9000px;background-color: rgb(0, 0, 0);"></div>
</body>
 

</html>
