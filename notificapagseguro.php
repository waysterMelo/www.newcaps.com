<?php

$notificationcode = preg_replace('/[^[:alnum:]-]/','',$_POST["notificationCode"]);

//$data['token'] = '1A13D2F104D547629471D79D2DBF0461';
//$data['email'] = 'dionaton_santos@hotmail.com';

$data['token'] = '4A97C26E784D4EF6978BE1FAA3DA9DC6';
$data['email'] = 'waystermelo@gmail.com';



$data = http_build_query($data);

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/'.$notificationcode.'?'.$data;

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
$xml = curl_exec($curl);
curl_close($curl);

$xml = simplexml_load_string($xml);

$reference = $xml->reference;


switch ($forma = $xml->paymentMethod->type){
    case 2 : $forma = "Boleto"; break;
    case 1 : $forma = "Cartão de Credito"; break;
    case 3 : $forma = "Debito Online"; break;
}

switch ($status = $xml->status){
    case 1 : $status = "Aguardando Pagamento"; break;
    case 2 : $status = "Em Analise"; break;
    case 3 : $status =  "Pago"; break;
    case 6 : $status = "Devolvido"; break;
    case 7 : $status = "Cancelado"; break;
}

if ($reference && $status){
    include "includes/db.php";
    $sql = "select * from pedidos where pedido_number='$reference'";
    $query = mysqli_query($con,$sql);


    $alterStatus = mysqli_query($con, "UPDATE pedidos SET order_status='$status',forma='$forma' WHERE pedido_number='$reference'");


}


