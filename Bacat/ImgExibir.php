<?php
if (isset($_GET["imagem"])) {
    $imagem = $_GET["imagem"];
    $caminho_imagem = "C:/xampp/php/ext/php_gd.dll" . $imagem;

    if (file_exists($caminho_imagem)) {
        $tipo_imagem = mime_content_type($caminho_imagem);
        header("Content-Type: $tipo_imagem");
        readfile($caminho_imagem);
    } else {
        echo "A imagem não foi encontrada.";
    }
} else {
    echo "Parâmetro 'imagem' ausente na URL.";
}
?>