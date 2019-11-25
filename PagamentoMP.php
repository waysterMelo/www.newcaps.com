<?php
class PagamentoMP{
    public $btn_mp;
    private $lightbox = true;
    public $info = array();
    private $sandbox = false;
    private $client_id = "8810352759020786";
    private $client_secret = "16IfyEtYWQmpKjDoL4e0onsWqXQHreSw";

    public function PagarMP($ref , $nome , $valor , $url){
        $mp = new MP($this->client_id, $this->client_secret);

        $preference_data = array(
            "items" => array(
                array(
                    "id"          => 0001,
                    "title"       => $nome,
                    "currency_id" => "BRL",
                    "picture_url" => "https://www.mercadopago.com/org-img/MP3/home/logomp3.gif",
                    "description" => $nome,
                    "quantity"    => 1,
                    "unit_price"  => $valor
                )
            ),
            "back_urls" => array(
                "success" => $url."/notifica.php?success",
                "failure" => $url."/notifica.php?failure",
                "pending" => $url."/notifica.php?pending"
            ),
            "notification_url" => $url."/notifica.php",
            "external_reference" => $ref
        );
        $preference = $mp->create_preference($preference_data);

        // Criar link para o botão de pagamento normal ou sandbox
        if($this->sandbox):
            //sandbox
            $mp->sandbox_mode(TRUE);
            $link = $preference["response"]["sandbox_init_point"];
        else:
            // normal em produção
            $mp->sandbox_mode(FALSE);
            $link = $preference["response"]["init_point"];
        endif;
        $this->btn_mp = '<a class="btn" id="btnMP" href="'.$link.'" ';
        $this->btn_mp .= 'name="MP-Checkout" ><img src="images/MP.jpg" alt="merado pago" style="width: 200px"></a>';
        if($this->lightbox):
            $this->btn_mp .= '<script type="text/javascript" src="//secure.mlstatic.com/mptools/render.js"></script>';
        endif;

        return $this->btn_mp;


    }


    public function Retorno($id , $con){
        $mp = new MP($this->client_id, $this->client_secret);
        $params = ["access_token" => $mp->get_access_token()];
        // params recebe o token
        $topic = 'payment';

        if ($topic == 'payment'){
            $payment_info = $mp->get("/collections/notifications/" . $id, $params, false);

            $merchant_order_info = $mp->get("/merchant_orders/" . $payment_info["response"]["collection"]["merchant_order_id"], $params, false);

        }

        switch ($payment_info["response"]["collection"]["status"]):
            case "approved"     : $status = "Aprovado";           break;
            case "pending"      : $status = "Pendente";           break;
            case "in_process"   : $status = "Análise";            break;
            case "rejected"     : $status = "Rejeitado";          break;
            case "refunded"     : $status = "Devolvido";          break;
            case "cancelled"    : $status = "Cancelado";          break;
            case "in_mediation" : $status = "Mediação";           break;

        endswitch;


        switch ($payment_info["response"]["collection"]["payment_type"]):

            case "ticket"        : $forma = "Boleto";
                break;
            case "account_money" : $forma = "Saldo MP";
                break;
            case "credit_card"   : $forma = "Cartão de Crédito";
                break;
            default : $forma =   $payment_info["response"]["collection"]["payment_type"];

        endswitch;


        $ref = $payment_info["response"]["collection"]["external_reference"];

        $query = mysqli_query($con,"UPDATE pedidos SET order_status='$status',forma='$forma' WHERE pedido_number='$ref'");
        if($query){
            return true;
        }



    }
}
