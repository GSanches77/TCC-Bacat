<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
        $temp_name = $_FILES["imagem"]["tmp_name"];
        $original_name = $_FILES["imagem"]["name"];
        $upload_dir = "C:/xampp/php/ext/php_gd.dll";

        if (move_uploaded_file($temp_name, $upload_dir . $original_name)) {
            echo "<img src='ImgExibir.php?imagem=$original_name' alt='Imagem'>";
            echo "<br>";
            echo "$temp_name";
            echo "<br>";
            echo "$original_name";
        } else {
            echo "Erro ao enviar a imagem.";
        }
    } else {
        echo "Erro no envio da imagem.";
    }
}
?>