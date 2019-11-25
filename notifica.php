<?php
require_once ("contato/send_email.php");
if($_GET['collection_id'] || $_GET['id']){

    require_once './includes/db.php';
    require_once 'mercadopago.php';
    require_once 'PagamentoMP.php';

    $pagar = new PagamentoMP;

    if(isset($_GET['collection_id'])):
        $id =  $_GET['collection_id'];
    elseif(isset($_GET['id'])):
        $id =  $_GET['id'];
    endif;


    $retorno = $pagar->Retorno($id , $con);

    if($retorno){

        $name = "Mercado Pago";
        $email = "contato@newcapsoficial.com.br";
        $ass= "VENDA RECEBIDA PELO SITE";
        $msg = "Voce acabou de receber uma nova venda acesse seu painel.";

        $recebe_email = "contato@newcapsoficial.com.br";

        mail($recebe_email, $name, $ass, $msg, $email);

        header("Location: index.php");

    }else{
        // Redirecionar usuario e informar erro ao admin
        echo "<script>location.href='index.php'</script>";
    }

}