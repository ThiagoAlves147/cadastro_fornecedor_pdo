<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <link href="estilo.css" rel="stylesheet">
    <title>Adicionar</title>
</head>
<body>
    <h1>Cadastro de Fornecedores</h1>

    <div>
        <form method="POST" action="verificarAdicionar.php">
            <label>
                Nome:<br>
                <input type="text" name="nome"/>
            </label>

            <label>
                Razão Social:<br>
                <input type="text" name="razao"/>
            </label>

            <label>
                Contato:<br>
                <input  type="text" name="tel" maxlength="11"/>
            </label>

            <label>
                CEP:<br>
                <input type="text" name="cep" maxlength="8"/>
            </label>

            <label>
                Cidade:<br>
                <input type="text" name="cidade"/>
            </label>

            <label>
                Estado:<br>
                <input type="text" name="estado" maxlength="2" placeholder="Ex: MG, RJ, SP..."/>
            </label>
            <br>
            <input type="submit" value="Enviar" class="botao"/>
        </form>

        <a href="index.php">Voltar</a>
    </div>

    <p style="text-align: center;">
    <?php
        if(isset($_SESSION['aviso'])){
            echo $_SESSION['aviso'];
            $_SESSION['aviso'] = " ";
        }
    ?> 
    </p>
</body>
</html>