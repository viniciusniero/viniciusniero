<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="PT-BR">
     <meta charset="UTF-8"
     <head>
      <title>Tela de login</title>
      <meta name="viewport" content="width=divice-width, initial-scale=1.0 maximun-scale=1.0">
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
    padding: 15px 0;
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
.criar{
  background-color: rgb(255, 255, 255);
  position: absolute;
  top: 53%;
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
<div class="pcadastro">
      <form class="criar" method = POST action="./config.php">
        <h1>Cadastre-se</h1>
        <input type="text" placeholder="Usuario" required>
        <br><br>
        <input type="text" placeholder="Nome Completo" required>
        <br><br>
        <input type="password" placeholder="Senha" required>
        <br><br>
        <input type="password" placeholder="Confirmar senha" required>
        <br><br>
        <button>Cadastrar</button>
      </form>
</header>
</div>
<body>
    <div style="height: 9000px;background-color: rgb(0, 0, 0);"></div>
</body>
</html>
