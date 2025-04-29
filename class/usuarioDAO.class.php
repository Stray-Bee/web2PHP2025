<?php
include_once "usuario.class.php";
class usuarioDAO{
    private $conexao;
    public function __construct(){
        $this->conexao = new PDO(
            "mysql:host=localhost; dbname=banco",
            "root", ""
        );
    }
    public function inserir(usuario $obj){
        $sql = $this->conexao->prepare(
            "INSERT INTO usuario (nome, email, senha)
            VALUES (:nome, :email, :senha)"
        );
        $sql->bindValue(":nome", $obj->getNome());
        $sql->bindValue(":email", $obj->getEmail());
        $sql->bindValue(":senha", $obj->getSenha());
        return $sql->execute();
    }
    public function listar(){
        $sql = $this->conexao->prepare(
            "SELECT * FROM usuario");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function retornarUnico($id): mixed {
        $sql = $this->conexao->prepare(query: "
        SELECT * FROM usuario WHERE id=:id
        ");
        $sql->bindValue(param: ":id", value: $id);
        $sql->execute();
        return $sql->fetch();
    }

    public function editar(usuario $obj){
        $sql = $this->conexao->prepare(
            "UPDATE usuario SET
            nome=:nome, senha=:senha, email=:email
            WHERE id=:id"
        );
        $sql->bindValue(":nome", $obj->getNome());
        $sql->bindValue(":email", $obj->getEmail());
        $sql->bindValue(":senha", $obj->getSenha());
        $sql->bindValue(":id", $obj->getID());
        return $sql->execute();
    }


}