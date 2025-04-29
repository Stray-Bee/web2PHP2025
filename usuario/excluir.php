<?php
    include_once "../class/usuario.class.php";
    include_once "../class/usuarioDAO.class.php";

    $id=$_GET["id"];
    $obj = new usuario();
    $retorno= $objDAO->delete(id: $id);
    if(retorno)
            header("location:listar.php?deleteOK");
        else
            header("location:listar.php?deleteN");

?>