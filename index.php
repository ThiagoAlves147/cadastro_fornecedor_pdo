<?php
  session_start();
  require "config.php";
  require "autoload.php";

  $sql = new UsuarioDao($pdo);
  
  $lista = $sql -> findAll();
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="estilo.css" rel="stylesheet">
  <title>Home</title>
</head>
<body>
  <a href="adicionar.php">Cadastrar Fornecedor</a>
    <table border="1" width="100%">
      <thead>
            <th>Id</th>
            <th>Nome</th>
            <th>Razão Social</th>
            <th>Contato</th>
            <th>Cep</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Ações</th>
        </thead>

        <?php foreach($lista as $usuario): //Cria a tabela com os usuarios cadastrados?>
              <tbody>
                  <td><?php echo $usuario -> getId()?></td>
                  <td><?php echo $usuario -> getNome()?></td>
                  <td><?php echo $usuario -> getRazao()?></td>
                  <td><?php echo $usuario -> getContato()?></td>
                  <td><?php echo $usuario -> getCep()?></td>
                  <td><?php echo $usuario -> getCidade()?></td>
                  <td><?php echo $usuario -> getEstado()?></td>
                  <td>
                      <a href="atualizar.php?id=<?php echo $usuario -> getId() ?>">Atualizar</a> <?php echo "   |   "?>
                      <a href="deletar.php?id=<?php echo $usuario -> getId() ?>" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a> 
                  </td>
              </tbody>
        <?php endforeach; ?>
    </table>

    <p style="text-align: center;">
    <?php
      if(isset($_SESSION['falha'])){
        echo $_SESSION['falha'];
        $_SESSION['falha'] = " ";
      }
    ?>
    </p>
</body>
</html>