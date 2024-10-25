<?php
    include_once("conexao.php");
     
    $pfpj = $nomeloja = $tipoloja = $descricao = $rua = $num = $estado = $cidade = $cep = "";

        $pfpj = $_POST["pfpjperfil"];
        $nomeloja = $_POST["nomeloja"];
        $tipoloja = $_POST["tipoloja"];
        $descricao = $_POST["descricao"];
        $rua = $_POST["rua"];
        $num = $_POST["num"];
        $estado = $_POST["estado"];
        $cidade = $_POST["cidade"];
        $cep = $_POST["cep"];

        $result = mysqli_query($mysqli, "UPDATE `tb_lojas` SET `nome`='$nomeloja',`tipo`='$tipoloja',
        `descricao`='$descricao',`valmed`='5',`imagem`='img' WHERE `cnpj`='$pfpj' ");

    var_dump($_POST);
?>