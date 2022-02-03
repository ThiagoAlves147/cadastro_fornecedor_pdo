<?php
  session_start();
  require "config.php";
  require "autoload.php";

  $sql = new UsuarioDao($pdo);

  $id = filter_input(INPUT_POST, 'id');
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
  $razao = filter_input(INPUT_POST, 'razao');
  $contato = filter_input(INPUT_POST, 'tel', FILTER_VALIDATE_INT);
  $cep = filter_input(INPUT_POST, 'cep', FILTER_VALIDATE_INT);
  $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
  $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);

  if($id && $nome && $razao && strlen($contato) == 11 && strlen($cep) == 8 && $cidade && $estado){
      $user = new Usuario();

      $user -> setId($id);
      $user -> setNome($nome);
      $user -> setRazao($razao);
      $user -> setContato($contato);
      $user -> setCep($cep);
      $user -> setCidade($cidade);
      $user -> setEstado($estado);

      $sql -> update($user);
      
      header("Location: index.php");
      exit;
  } else{
      $_SESSION['falha'] = "Falha ao atualizar cadastro!";
      header("Location: index.php");
      exit;
  }