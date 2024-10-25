<?php
    session_start();
    $pfpjendereco = $_SESSION['pfpj'];

    include_once("conexao.php");

    $cep = $cidade = $estado = $rua = $bairro = $num = "";

        
        $cep = $_POST["cep"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $rua = $_POST["rua"];
        $bairro = $_POST["bairro"];
        $num = $_POST["num"];

        $result = mysqli_query($mysqli, "INSERT INTO tb_endereco(pfpj, cep, cidade, estado, rua, bairro, num) VALUES('$pfpjendereco','$cep','$cidade','$estado','$rua','$bairro','$num')");
        print "<font color='green'> Dados inseridos com sucesso!</font>";  

?>
    