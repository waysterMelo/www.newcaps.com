<?php
session_start();

if (!isset($_SESSION['email'])){

   if (@$_GET['frete_valor']){

       @$frete_valor = $_GET['frete_valor'];
       echo "<script>alert('Loge na sua conta para continuar')</script>";
       echo "<script>window.open('./customer/loginComprar.php?frete_valor=$frete_valor','_self')</script>";

   }

} else {

    if ((isset($_GET['frete_valor']) && isset($_GET['cliente_id']))) {
        include('./includes/db.php');
        require_once './functions/functions.php';
        $banco = "";
        $forma = '';
        $valor = $_GET['frete_valor'];
        $cliente = $_GET['cliente_id'];
        $session_id = session_id();
        $status = 'Pendente';
        $invoice_n = mt_rand();

        $sql = "update clientes set session_id ='$session_id', dtmodification = NOW()";
        $run = mysqli_query($con, $sql);

        $getClient = "select * from clientes where id ='$cliente'";
        $queryCliente = mysqli_query($con, $getClient);
        $rsCliente = mysqli_fetch_array($queryCliente);
        $session_id_cliente = $rsCliente['session_id'];

        $select_cart = "select * from cart where session_id ='$session_id_cliente' and dtremoved is NULL";
        $run = mysqli_query($con, $select_cart);
        while ($row = mysqli_fetch_array($run)) {
            $pro_id = $row['id_pro'];
            $pro_size = $row['p_size'];
            $qtd = $row['quantidade'];

            $getPro = "select * from products where id ='$pro_id'";
            $runP = mysqli_query($con, $getPro);
            while ($rowP = mysqli_fetch_array($runP)) {
                $pro_id = $rowP['id'];
                $preco = $rowP['price'] * $qtd;

                $insert_pedido = "insert into pedidos (cliente_id, due_amount, pedido_number,qtd,pedido_data,order_status,size_p,produto_id,forma,frete,banco)
                values ('$cliente','$preco','$invoice_n','$qtd',NOW(),'$status','$pro_size','$pro_id','$forma','$valor','$banco')";
                $runp_o = mysqli_query($con, $insert_pedido);


                $delete = "update cart set dtremoved = NOW() where session_id = '$session_id_cliente'";
                $runDelete = mysqli_query($con, $delete);
          }
        }
        $get_fatura = "select * from pedidos where cliente_id='$cliente'";
        $query = mysqli_query($con, $get_fatura);
        while ($rs = mysqli_fetch_array($query)) {
            $id = $rs['pedido_number'];
        }
        echo "<script>window.open('finaliza.php?id=$id','_self')</script>";
    }
}


