<?php
    session_start();
    require "config.php";
    require "autoload.php";

    $sql =  new UsuarioDao($pdo);
    $ver = [];
    $id = filter_input(INPUT_GET, 'id');
    $user = $sql -> findById($id);
    if($id){
        $user = $sql -> findById($id);

        if($user === false){
            $_SESSION['falha'] = "Falha ao atualizar cadastro!";
            header("Location: index.php");
            exit;
        } 

    }else{
        $_SESSION['falha'] = "Falha ao atualizar cadastro!";
        header("Location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilo.css" rel="stylesheet">
    <title>Atualizar</title>
</head>
<body>
    <h1>Atualizar Cadastro</h1>

    <div>
        <form method="POST" action="verificarAtualizar.php">
            <input type="hidden" name="id" value="<?= $user -> getId()?>"/>

            <label>
                Nome:<br>
                <input type="text" name="nome" value="<?= $user -> getNome()?>"/>
            </label>

            <label>
                Razão Social:<br>
                <input type="text" name="razao" value="<?= $user -> getRazao()?>"/>
            </label>

            <label>
                Contato:<br>
                <input  type="text" name="tel" maxlength="11" value="<?= $user -> getContato()?>"/>
            </label>

            <label>
                CEP:<br>
                <input type="text" name="cep" maxlength="8" value="<?= $user -> getCep()?>"/>
            </label>

            <label>
                Cidade:<br>
                <input type="text" name="cidade" value="<?= $user -> getCidade()?>"/>
            </label>

            <label>
                Estado:<br>
                <input type="text" name="estado" maxlength="2" placeholder="Ex: MG, RJ, SP..." value="<?= $user -> getEstado()?>"/>
            </label>
            <br>
            <input type="submit" value="Enviar" class="botao"/>
        </form>

        <a href="index.php">Voltar</a>
    </div>
</body>
</html>