<?php
    include_once("conexao.php");
    $sql = "SELECT * FROM tb_lojas";
    $result = $mysqli->query($sql);
    $site = "algo.html";
    $counter = 0;

    if ($result->num_rows > 0) {
        echo "<link rel='stylesheet' href='bacat.css'>";
        echo "<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>";
        echo "<body bgcolor='#f7fff6'>";
        echo "<div class='cardLojasRow' style='display: flex; flex-direction: row; justify-content: center; align-items: center;'>"; // Abra uma div para a primeira linha
        while ($row = $result->fetch_assoc()) {
            echo "<a href='$site' style='text-decoration: none;'>";
            echo "<div class='cardLojas' style='border-radius: 10px; background-color: #ffffff; height: 105px; width: 350px; padding: 10px; box-shadow: 0px 2px 5px 0px #a9c6a6; border: none; margin: 6px;'>";
            echo "<div style='padding-left: 15px; padding-right: 15px; padding-top: 10px; padding-bottom: 0px; float: left;'>";
            echo "<img src='./img/" . $row["imagem"] . "' width='75px'>";
            echo "</div>";
            echo "<p style='padding-left: 105px; color: #000000; width: 225px; margin: 5px; font-weight: bold;' align='left'>" . $row["nome"] . "</p>";
            echo "<p style='padding-left: 105px; color: #000000; width: 225px; margin: 5px; font-weight: bold; font-size: 12px;' align='left'>" . $row["tipo"] . "</p>";
            echo "<p style='padding-left: 105px; color: #000000; width: 225px; margin: 5px; font-size: 12px;' align='left'>" . "Valor Médio: R$" . $row["valmed"] . " - " . $row["avaliacao"] . "★" . "</p>";
            echo "<p style='padding-left: 105px; color: #000000; width: 225px; margin: 5px; font-size: 12px;' align='left'>" . $row["descricao"] . "</p>";
            echo "</div>";
            echo "</a>";
            
            $counter++; 

            if ($counter % 3 === 0) {
                echo "</div>"."<div class='cardLojasRow' style='display: flex; flex-direction: row; justify-content: center; align-items: center;'>";
            }
        }

        if ($counter % 3 !== 0) {
            echo "</div>";
        }
    } else {
        echo "Nenhum dado encontrado na tabela.";
    }

$mysqli->close();
?>