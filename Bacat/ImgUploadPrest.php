<?php
error_reporting(0);
include_once("conexao.php");
include_once("InfoPerfilPrestador.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
        $temp_name = $_FILES["imagem"]["tmp_name"];
        $original_name = $_FILES["imagem"]["name"];
        $upload_dir = "C:/xampp/php/ext/php_gd.dll";
        $result = mysqli_query($mysqli, "UPDATE `tb_usuarios` SET `imagem`='$original_name' WHERE `pfpj`='$pfpj'");

        if (move_uploaded_file($temp_name, $upload_dir . $original_name)) {
            session_start();
            $_SESSION["info"] = "$pfpj";
            include("perfilprestador.html");
        } else {
            echo "Erro ao enviar a imagem.";
        }
    } else {
        echo "Erro no envio da imagem.";
    }
}
?>