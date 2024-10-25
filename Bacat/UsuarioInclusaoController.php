<?php
    include_once("conexao.php");
    $nome = $email = $senha = $csenha = $nasc = $cnpj = $cpf ="";
    
    $senha = $_POST["senha"];
    $csenha = $_POST["csenha"];

    if ($senha <> $csenha) {
        print "senhas diferente porra";
    } else if (empty($_POST["lieaceito"])) {
        print "tem que falar que leu e aceita ne";
    } else if (empty($_POST["cnpj"])) {
        session_start();
        $_SESSION['pfpj'] = $_POST['cpf'];

        $clienprest = "cliente";
        $pfpj = $_POST["cpf"];
        $nasc = $_POST["nasc"];
        $nome = $_POST["nome"];
        $snome = $_POST["snome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $result = mysqli_query($mysqli, 
        "INSERT INTO tb_usuarios(pfpj, nasc, nome, snome, email, senha, ativo, clienprest) 
        VALUES('$pfpj','$nasc','$nome','$snome','$email','$senha', 1, '$clienprest')");
            
    } else if (empty($_POST["cpf"])) {
        session_start();
        $_SESSION['pfpj'] = $_POST['cnpj'];

        $clienprest = "prestador";
        $pfpj = $_POST["cnpj"];
        $nasc = $_POST["nasc"];
        $nome = $_POST["nome"];
        $snome = $_POST["snome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $result = mysqli_query($mysqli, 
        "INSERT INTO tb_usuarios(pfpj, nasc, nome, snome, email, senha, ativo, clienprest) 
        VALUES('$pfpj','$nasc','$nome','$snome','$email','$senha', 1, '$clienprest')");

        $result = mysqli_query($mysqli, 
        "INSERT INTO tb_lojas(cnpj, nome, tipo, descricao, valmed, imagem, avaliacao) 
        VALUES('$pfpj','$nome $snome','','','','default.png', '0')");
        
        include 'cadendereco.html';  
    }
?>