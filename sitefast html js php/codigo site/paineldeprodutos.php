<?php

include('protecao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Produtos</title>
    <h1> Bem vindo ao Gerenciamento de Produtos, <?php echo $_SESSION['nome']; ?>.</h1>
    <script type='text/javascript' src="main.js"></script>

    <style>
        #listaRegistros{ display: none; }
        #cadastroRegistro{
            display: none;
            flex-direction: column;
            gap: 30px;
        }

        body[page=lista] #listaRegistros{ display: block; }
        body[page=cadastro] #cadastroRegistro{ display: flex; }

        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }
        table th,
        table td{
            font-size: 14px;
            padding: 10px 15px;
            border: solid 1px #ccc;
        }

        button{
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #07a;
            color: #fff;
            margin: 3px;
            padding: 10px 15px;
        }
        button.cinza{
            background-color: #ccc;
            color: #666;
        }
        button.vermelho{
            background-color: #a00;
        }
        button:hover{
            opacity: 0.8;
        }

        input{
            border: solid 1px #ccc;
            border-radius: 4px;
            padding: 10px;
        }

        .label>div{
            display: flex;
        }
        .label>div>input{
            flex: 1;
        }
    </style>

</head>
<body page='lista'>

    <div id='listaRegistros'>

        <div style='display: flex;'>
            <input style='flex:1' placeholder="PESQUISAR" autofocus id='inputPesquisa' />
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Valor</th>
                    <th>Quantidade do produto</th>
                    <th>Valor pela a quantidade</th>
                    <th></th>
                </tr>
                
            </thead>
            <tbody id='listaRegistrosBody'></tbody>
        </table>

        <div>
            <button onclick="vizualizar('cadastro', true)">Novo Produto</button>
        </div>

    </div>

    <form id='cadastroRegistro'>

        <div class='label'>
            <div>ID</div>
            <div>
                <input readonly id='id' />
            </div>
        </div>

        <div class='label'>
            <div>Produto</div>
            <div>
                <input id='produto' />
            </div>
        </div>

        <div class='label'>
            <div>Valor</div>
            <div>
                <input type='number' id='valor' />
            </div>
        </div>

        <div class="label">Quantidade do produto</div>
         <div> 
         <input type='number' id='qt' /> 
         </div>

         <div readonly id= 'vpaq'>  </div>

        <div>
            <button>Salvar</button>
            <button onclick="vizualizar('lista')" class="cinza" type='button'>Cancelar</button>
        </div>

    </form>
    <p>
        <a href="logout.php">Encerrar sessão</a>
    </p>

</body>
</html>