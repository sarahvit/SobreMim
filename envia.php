<?php
    require_once'config.php';

    date_default_timezone_set('America/Sao_Paulo');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];
    $data_atual = date('d/m/Y'); //18/01/2024
    $hora_atual = date('H:i:s');
    
    //PREPARAR COMANDO
    $smtp = $conn->prepare("INSERT INTO mensagens (nome, email, telefone, mensagem, data, hora) VALUES (?,?,?,?,?,?)");
    $smtp-> bind_param("ssssss",$nome, $email, $telefone, $mensagem, $data_atual, $hora_atual);


    if($smtp->execute()){
        echo("Mensagem enviada com sucesso!");
    }else{
        echo("Erro no envio da mensagem: ").$smtp->error;
    }
    $smtp->close();
    $conn->close();

?>