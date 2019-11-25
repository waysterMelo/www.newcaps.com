<?php

if (isset($_POST['enviar'])){
    $name = $_POST['nome'];
    $email = $_POST['email'];
    $ass= $_POST['assunto'];
    $msg = $_POST['message'];

    $recebe_email = "waystermelo@gmail.com";

    mail($recebe_email,$name,$ass,$msg,$email);

    // return email to sender

    $email_sender = $_POST['email'];
    $subject = "Bem Vindo a New Caps Oficial";
    $msg_sender = "Obridago pela mensagem , vamos te responder em breve";
    $from = "waystermelo@gmail.com";
    mail($email_sender,$subject,$msg_sender,$from);


    echo "<script>alert('Mensagem enviada com sucesso')</script>";
    echo "<script>window.open('../contato','_self')</script>";

};
