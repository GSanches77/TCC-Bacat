<?php
    include_once("conexao.php");

    $search = $num = "";
    $search = $_POST["search"];

        $result = mysqli_query($mysqli, "SELECT `nome`, `tipo` FROM `tb_lojas` WHERE `nome` LIKE '%$search%';");
        
        $rows = $result -> fetch_all(MYSQLI_ASSOC);
        $count = $result -> num_rows;
        $num = 0;

        while ($num < $count) {
            echo "<link rel='stylesheet' href='bacat.css'>";
            echo "<body style='background-color: #f8fff7;'>";
            echo '<a href="algo.html" target="_top" class="abc">',
                print($rows[$num]["nome"]), '<br>',
                '<p>', print($rows[$num]["tipo"]), '</p>', 
                '</a>';
            echo "</body>";
            $num = $num + 1;
        }
?>