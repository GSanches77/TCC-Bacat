<?php
    include_once("conexao.php");
    session_start();
    $pfpj = $_SESSION["info"];
    $prestPerf_nome = $prestPerf_cnpj = $prestPerf_dataNascimento = $prestPerf_email = $prestPerf_rua = $prestPerf_num = $prestPerf_estado = $prestPerf_cidade = $prestPerf_cep = "";
    $result = mysqli_query($mysqli, "SELECT `nome`, `pfpj`, `nasc`, `email` FROM `tb_usuarios` WHERE `pfpj`='$pfpj';");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $prestPerf_nome = $row["nome"];
        $prestPerf_cnpj = $row["pfpj"];
        $prestPerf_dataNascimento = $row["nasc"];
        $prestPerf_email = $row["email"];
    } else {
        echo "Nenhum resultado encontrado.";
    }

    $resultend = mysqli_query($mysqli, "SELECT `rua`, `num`, `estado`, `cidade`, `cep` FROM `tb_endereco` WHERE `pfpj`='$pfpj';");
    
    if ($resultend->num_rows > 0) {
        $row = $resultend->fetch_assoc();
        $prestPerf_rua = $row["rua"];
        $prestPerf_num = $row["num"];
        $prestPerf_estado = $row["estado"];
        $prestPerf_cidade = $row["cidade"];
        $prestPerf_cep = $row["cep"];
    } else {
        echo "Nenhum resultado encontrado.";
    }

    $resultloja = mysqli_query($mysqli, "SELECT `nome`, `tipo`, `descricao`, `valmed`, `imagem`, `avaliacao` FROM `tb_lojas` WHERE `cnpj`='$pfpj';");
    
    if ($resultloja->num_rows > 0) {
        $row = $resultloja->fetch_assoc();
        $prestPerf_nomeloja = $row["nome"];
        $prestPerf_tipo = $row["tipo"];
        $prestPerf_descricao = $row["descricao"];
        $prestPerf_valmed = $row["valmed"];
        $prestPerf_imagem = $row["imagem"];
        $prestPerf_avaliacao = $row["avaliacao"];
    } else {
        echo "Nenhum resultado encontrado.";
    }

?>