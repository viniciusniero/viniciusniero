<?php
session_start();
?>

<!DOCTYPE html>
<html lang="PT-BR">
     
     <head>
      <title>Fast Gerência</title>
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

     </style>
     </body>
         <header>
         <div class="center">
          <div class="logo"><img src="logosite.png" alt="imagem" height="120px" width="120px" /></div><!--logo-->

           <div class="menu">
           <a href="#">Inicio</a>
           <a href="#">Funcionalidades</a>
           <a href="#">Sobre</a>
           <a href="login.html">Login</a>
           </div><!--menu-->
           </div><!--center-->

         </header>
         <div style="height: 9000px;background-color: rgb(0, 0, 0);"></div>
     </body>
</html>