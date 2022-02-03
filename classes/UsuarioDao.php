<?php

class UsuarioDao implements Metodos{
    
    private $pdo;

    public function __construct($pdo){
        $this -> pdo = $pdo;
    }

    public function add(Usuario $u){
        $sql = $this -> pdo -> prepare("INSERT INTO fornecedores(nome, razaoSocial, contato, cep, cidade, estado) VALUES(:nome, :razao, :contato, :cep, :cidade, :estado)");
        $sql -> bindValue(':nome', $u -> getNome());
        $sql -> bindValue(':razao', $u -> getRazao());
        $sql -> bindValue(':contato', $u -> getContato());
        $sql -> bindValue(':cep', $u -> getCep());
        $sql -> bindValue(':cidade', $u -> getCidade());
        $sql -> bindValue(':estado', $u -> getEstado());
        $sql -> execute();

        $u -> setId($this -> pdo -> lastInsertId());
    }    

    public function update(Usuario $u){
        $sql = $this -> pdo -> prepare("UPDATE fornecedores SET nome=:nome, razaoSocial=:razao, contato=:contato, cep=:cep, cidade=:cidade, estado=:estado WHERE id=:id");
        $sql -> bindValue(':id', $u -> getId());
        $sql -> bindValue(':nome', $u -> getNome());
        $sql -> bindValue(':razao', $u -> getRazao());
        $sql -> bindValue(':contato', $u -> getContato());
        $sql -> bindValue(':cep', $u -> getCep());
        $sql -> bindValue(':cidade', $u -> getCidade());
        $sql -> bindValue(':estado', $u -> getEstado());
        $sql -> execute();

        return true;
    }

    public function delete($id){
        $sql = $this -> pdo -> prepare('DELETE FROM fornecedores WHERE id=:id');
        $sql -> bindValue(':id', $id);
        $sql -> execute();
    }

    public function findAll(){
        $sql = $this -> pdo -> query('SELECT * FROM fornecedores');
        
        if($sql -> rowCount()){

            $dados = $sql -> fetchAll();
            foreach($dados as $item){
                $user = new Usuario();
                $user -> setId($item['id']);
                $user -> setNome($item['nome']);
                $user -> setRazao($item['razaoSocial']);
                $user -> setContato($item['contato']);
                $user -> setCep($item['cep']);
                $user -> setCidade($item['cidade']);
                $user -> setEstado($item['estado']);

                $lista[] = $user;
            }

            return $lista;
        }
    }

    public function findById($id){
        $sql = $this -> pdo -> prepare('SELECT * FROM fornecedores WHERE id=:id');
        $sql -> bindValue(':id', $id);
        $sql -> execute();

        if($sql -> rowCount() > 0){
            $item = $sql -> fetch();

            $user = new Usuario();
            $user -> setId($item['id']);
            $user -> setNome($item['nome']);
            $user -> setRazao($item['razaoSocial']);
            $user -> setContato($item['contato']);
            $user -> setCep($item['cep']);
            $user -> setCidade($item['cidade']);
            $user -> setEstado($item['estado']);

            return $user;
        }
        else{
            return false;
        }
    }

    public function findByContato($contato){
        $sql = $this -> pdo -> prepare("SELECT * FROM fornecedores WHERE contato=:contato");
        $sql -> bindValue(':contato', $contato);
        $sql -> execute();

        if($sql -> rowCount() > 0){
            return false;
        }
        else{
            return true;
        }
    }
}

interface Metodos {

    public function add(Usuario $u);
    public function update(Usuario $u);
    public function delete($id);
    public function findAll();
    public function findById($id);
    public function findByContato($contato);

}