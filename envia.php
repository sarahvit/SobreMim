<?php
    require_once 'config.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];
    $data_atual = date('d/m/Y'); //18/01/2024
    $hora_atual = date('H:i:s');

    // $para = "sasavit0700@gmail.com";
    // $assunto = "Coleta de dados - Portifólio";

    // $corpo = "Nome: ".$nome."\r\n"."E-mail ".$email."\r\n"."Telefone: ".$telefone."\r\n"."Mensagem: ".$mensagem;

    // $cabeca = "From: teste@portfolio.com"."\n"."Reply-to: ".$email."\n"."X=Mailer:PHP/".phpversion();


    // $server = 'localhost';
    // $usuario = 'root';
    // $senha = '';
    // $banco = 'formulario_portifolio';

    // $conn = new mysqli($server, $usuario, $senha, $banco);

    //VERIFICAR CONEXAO
    if($conn->connect_error){
        die("Falha ao se comunicar com banco de dados: ".$conn->connect_error);
    }

    $smtp = $conn->prepare("INSERT INTO mensagens (nome, email, telefone, mensagem, data, hora) VALUES (?,?,?,?,?,?)");
    $smtp-> bind_param("ssssss",$nome, $email, $telefone, $mensagem, $data_atual, $hora_atual);


    if($smtp->execute()){
        echo ("Mensagem enviada com sucesso!");
    }else{
        echo ("Erro no envio da mensagem: ").$smtp->error;
    }
    $smtp->close();
    $conn->close();
?>