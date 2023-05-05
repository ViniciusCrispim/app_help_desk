<?php
//Inicia a sessão para ter acesso às variáveis
session_start();

    // Verificando se existe o caractere -> # usado no Implore
    foreach ($_POST as &$verifica_caractere) {
        $verifica_caractere = str_replace('#','-', $verifica_caractere);
    }
    // Formando a String com Id + IMPLODE:
    $texto_chamado = $_SESSION['id'] . '#' . implode('#', $_POST) . PHP_EOL;

    // //Abre o arquivo
    $arquivo_texto = fopen('registro_chamados.hd', 'a');
    // //Escreve no arquivo
    fwrite($arquivo_texto, $texto_chamado);
    // //Fecha o arquivo
    fclose($arquivo_texto);

    header('Location: abrir_chamado.php')
?>