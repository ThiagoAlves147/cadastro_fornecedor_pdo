<?php
    require "config.php";
    require "autoload.php";

    $sql = new UsuarioDao($pdo);

    $id = filter_input(INPUT_GET, 'id');

    if($id){
        $sql -> delete($id);
    }

    header("Location: index.php");
    exit;