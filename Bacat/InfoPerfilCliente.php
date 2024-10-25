<?php
    include_once("conexao.php");
    session_start();
    error_reporting(0);
    $pfpj = $_SESSION["info"];
    $foto = $clienPerf_foto = $clienPerf_nome = $clienPerf_cnpj = $clienPerf_dataNascimento = $clienPerf_email = $clienPerf_rua = $clienPerf_num = $clienPerf_estado = $clienPerf_cidade = $clienPerf_cep = "";
    
    $result = mysqli_query($mysqli, "SELECT `nome`, `pfpj`, `nasc`, `email`, `imagem` FROM `tb_usuarios` WHERE `pfpj`='$pfpj';");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $clienPerf_nome = $row["nome"];
        $clienPerf_cnpj = $row["pfpj"];
        $clienPerf_dataNascimento = $row["nasc"];
        $clienPerf_email = $row["email"];
        $foto = $row["imagem"];
        $clienPerf_imagem = "ImgExibir.php?imagem=$foto";
    } else {
        echo "Nenhum resultado encontrado.";
    }

    $resultend = mysqli_query($mysqli, "SELECT `rua`, `num`, `estado`, `cidade`, `cep` FROM `tb_endereco` WHERE `pfpj`='$pfpj';");
    
    if ($resultend->num_rows > 0) {
        $row = $resultend->fetch_assoc();
        $clienPerf_rua = $row["rua"];
        $clienPerf_num = $row["num"];
        $clienPerf_estado = $row["estado"];
        $clienPerf_cidade = $row["cidade"];
        $clienPerf_cep = $row["cep"];
    } else {
        echo "Nenhum resultado encontrado.";
    }

?>