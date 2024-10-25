<?php
    include_once("conexao.php");
    $email = $senha = $query = "";
    $stylesheet_url = "bacat.css";


    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $query =  "SELECT `senha` FROM `tb_usuarios` WHERE `email` = '$email'";
	$result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($result);     


    if ($senha<>$row[0]){
        echo "Login ou senha incorretos";
    } else if ($senha=$row[0]){
        $query =  "SELECT `pfpj` FROM `tb_usuarios` WHERE `email` = '$email'";
	    $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_array($result);
        $pfpj = $row[0];

        $query =  "SELECT `clienprest` FROM `tb_usuarios` WHERE `pfpj` = '$pfpj'";
	    $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_array($result);
        $clienprest = $row[0];

        if ($clienprest == 'cliente') {
            session_start();
            $_SESSION["info"] = "$pfpj";
            header("Location: /bacat/homecliente.html");
        } else if ($clienprest == 'prestador') {
            session_start();
            $_SESSION["info"] = "$pfpj";
            header("Location: /bacat/homeprestador.html");
        }
    }

?>