<?php
include_once('../config/conexao.php');
if (isset($_GET['idDel'])) {
    $id = $_GET['idDel'];
    // Selecionar a imagem
    $select = "SELECT * FROM agenda_contato WHERE id_contato=:id";

    try {
        $result = $conect->prepare($select);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();

        $contar = $result->rowCount();
        if ($contar > 0) {
            $loop = $result->fetchAll();
            foreach ($loop as $exibir) {
            }

            $fotoDeleta = $exibir['avatar_contato'];
            $arquivo = "../img/avatar/" . $fotoDeleta;
            unlink($arquivo);
            $delete = "DELETE FROM agenda_contato WHERE (id_contato = :id)";
            try {
                $result = $conect->prepare($delete);
                $result->bindParam(':id', $id, PDO::PARAM_INT);
                $result->execute();

                // Ailess permite mais segurança a seu código pois se você digtar logo direto, alguém pode rodar um script e já fazer o que quiser no seu banco de dados sem qualquer proteção
                $contar = $result->rowCount();
                if ($contar > 0) {
                    // Selecionar a imagem a ser deletada 

                    header("Location:home.php?acao=principal");
                } else {
                    header("Location:home.php");
                }
            } catch (PDOException $e) {
                echo '<strong>ERRO DE DELETE = </strong>' . $e->getMessage();
            }
        }
    } catch (PDOException $e) {
        echo '<strong>ERRO DE SLECT</strong>' . $e->getMessage();
    }
}
