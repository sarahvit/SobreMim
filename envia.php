<?php

    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $telefone = addslashes($_POST['telefone']);
    $mensagem = addslashes($_POST['mensagem']);

    $para = "sasavit0700@gmail.com";
    $assunto = "Coleta de dados - Portifólio";

    $corpo = "Nome: ".$nome."\r\n"."E-mail ".$email."\r\n"."Telefone: ".$telefone."\r\n"."Mensagem: ".$mensagem;

    $cabeca = "From: teste@portfolio.com"."\n"."Reply-to: ".$email."\n"."X=Mailer:PHP/".phpversion();

    if(mail($para,$assunto,$corpo,$cabeca)){
        echo("E-mail enviado com sucesso!");
    }else{
        echo("Houve um erro ao enviar o email!");
    }

?>