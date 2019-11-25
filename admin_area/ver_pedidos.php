<?php
<<<<<<< HEAD
include '../includes/db.php';
if(!isset($_SESSION['admin_email']) && (!isset($_SESSION['admin_pass']))){
    echo "<script>window.open('index.php', '_self')</script>";
}else {

    ?>

    <div class="container-fluid">
    <div class="row"><!-- 1 row Starts -->
=======
if(!isset($_SESSION['admin_email'])){
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts  --->

                <li class="active">

<<<<<<< HEAD
                    <i class="fa fa-dashboard"></i> Dashboard / Ver Pedidos

                </li>

            </ol><!-- breadcrumb Ends  --->

        </div><!-- col-lg-12 Ends -->

    </div>
    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"></i> Ver Pedidos

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <div class="table-responsive"><!-- table-responsive Starts -->

                        <table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

                            <thead><!-- thead Starts -->

                            <tr>

                                <th class="text-center">Pedido Nº</th>
                                <!--<th>Cliente Email:</th>-->
                                <th class="text-center">Fatura Nº</th>
                                <th class="text-center">Data Pedido</th>
                                <!--<th>Total:</th>-->
                                <th class="text-center">Pedido Status</th>
                                <th class="text-center"><i class="fa fa-plus"></i> Detalhes</th>
                                <th class="text-center">Deletar Pedido</th>


                            </tr>

                            </thead><!-- thead Ends -->


                            <tbody><!-- tbody Starts -->

                            <?php

                            $i = 0;

                            $get_orders = "select * from pedidos order by id DESC limit 20 ";

                            $run_orders = mysqli_query($con,$get_orders);
=======
?>

<div class="container-fluid">
    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts  --->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Ver Pedidos

                </li>

            </ol><!-- breadcrumb Ends  --->

        </div><!-- col-lg-12 Ends -->

    </div>
    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"></i> Ver Pedidos

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <div class="table-responsive"><!-- table-responsive Starts -->

                        <table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

                            <thead><!-- thead Starts -->

                            <tr>

                                <th class="text-center">Pedido Nº</th>
                                <!--<th>Cliente Email:</th>-->
                                <th class="text-center">Fatura Nº</th>
                                <th class="text-center">Data Pedido</th>
                                <!--<th>Total:</th>-->
                                <th class="text-center">Pedido Status</th>
                                <th class="text-center"><i class="fa fa-plus"></i> Detalhes</th>
                                <th class="text-center">Deletar Pedido</th>


                            </tr>

                            </thead><!-- thead Ends -->
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9

                            while ($row_orders = mysqli_fetch_array($run_orders)) {

<<<<<<< HEAD
                                $order_id = $row_orders['id'];

                                $c_id = $row_orders['cliente_id'];

                                $invoice_no = $row_orders['pedido_number'];

                                $product_id = $row_orders['id'];

                                $qty = $row_orders['qtd'];

                                $size = $row_orders['size_p'];

                                $order_status = $row_orders['order_status'];

                                $get_products = "select * from products where id='$product_id'";

                                $run_products = mysqli_query($con,$get_products);

                                $row_products = mysqli_fetch_array($run_products);

                                $product_title = $row_products['title'];

                                $i++;
                                ?>
                                <tr class="text-center">

                                    <td><?php echo $order_id; ?></td>
                                    <td bgcolor="yellow" id="fatura"><?php echo $invoice_no?></td>
                                    <td class="text-center">
                                        <?php

                                        $get_customer_order = "select * from pedidos where cliente_id='$c_id'";

=======
                            <tbody><!-- tbody Starts -->

                            <?php

                            $i = 0;

                            $get_orders = "select * from pedidos ";

                            $run_orders = mysqli_query($con,$get_orders);

                            while ($row_orders = mysqli_fetch_array($run_orders)) {

                                $order_id = $row_orders['id'];

                                $c_id = $row_orders['cliente_id'];

                                $invoice_no = $row_orders['pedido_number'];

                                $product_id = $row_orders['id'];

                                $qty = $row_orders['qtd'];

                                $size = $row_orders['size_p'];

                                $order_status = $row_orders['order_status'];

                                $get_products = "select * from products where id='$product_id'";

                                $run_products = mysqli_query($con,$get_products);

                                $row_products = mysqli_fetch_array($run_products);

                                $product_title = $row_products['title'];

                                $i++;
                                ?>
                                <tr class="text-center">

                                    <td><?php echo $order_id; ?></td>
                                    <td bgcolor="yellow" id="fatura"><?php echo $invoice_no;?></td>
                                    <td class="text-center">
                                        <?php

                                        $get_customer_order = "select * from pedidos where cliente_id='$c_id'";

>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
                                        $run_customer_order = mysqli_query($con,$get_customer_order);

                                        $row_customer_order = mysqli_fetch_array($run_customer_order);

                                        $order_date = $row_customer_order['pedido_data'];

                                        $nova_data = $order_date;

                                        $due_amount = $row_customer_order['due_amount'];

                                        echo date("d-m-Y",strtotime($order_date));

                                        ?>
                                    </td>
                                    <td>
                                        <?php

                                        if($order_status=='Pendente'){

                                            echo $order_status='Não Pago';
                                        }
                                        if($order_status=='cancelled'){

                                            echo $order_status='Cancelado';
                                        }
                                        if($order_status=='rejected'){

                                            echo $order_status='Rejeitado';
                                        }

                                        if($order_status=='approved'){

                                            echo $order_status='Pago';
                                        }

                                        ?>
                                    </td>
                                    <td>
<<<<<<< HEAD
                                        <a class="btn btn-info" href="home.php?ver_pedidos&pedido=<?php echo $order_id;?>">
=======
                                        <a class="btn btn-info" href="index.php?ver_pedidos&pedido=<?php echo $order_id;?>">
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
                                            <i class="fa fa-plus"></i> ver
                                        </a>
                                    </td>
                                    <td>

<<<<<<< HEAD
                                        <a class="btn btn-danger" href="home.php?order_delete=<?php echo $order_id; ?>" >
=======
                                        <a class="btn btn-danger" href="index.php?order_delete=<?php echo $order_id; ?>" >
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9

                                            <i class="fa fa-trash-o" ></i> Deletar

                                        </a>

                                    </td>

                                </tr>

                            <?php } ?>

                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
            <?php
            if (isset($_GET['pedido'])) {
                $id = $_GET['pedido'];

                $sql = "SELECT * from pedidos WHERE id = '$id'";
                $q = mysqli_query($con, $sql);
                while ($rs = mysqli_fetch_array($q)) {
                    $faturaOrder = $rs['pedido_number'];
                    $preco = $rs['due_amount'];
                    $produto_id = $rs['produto_id'];
                    $quantidade = $rs['qtd'];
                    $cliente_id = $rs['cliente_id'];
                    $frete_desc = $rs['frete'];


                    $sql_frete = "select frete from pedidos where pedido_number ='$faturaOrder' limit 1";
                    $exe_sql = mysqli_query($con, $sql_frete);
                    $rsSql = mysqli_fetch_array($exe_sql);
                    $frete = $rsSql['frete'];
                    $frete2 = str_replace(',', '.', $frete);
<<<<<<< HEAD
                    $fretenew = substr($frete2, 0, 5);

                    $valorTotal = $preco + $fretenew;
=======

                    $valorTotal = $preco + $frete2;
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9

                    $getNome = "select * from products where id = '$produto_id'";
                    $queryNome = mysqli_query($con, $getNome);
                    $rsNome = mysqli_fetch_array($queryNome);
                    $nome = $rsNome['title'];
                    $precoUn = $rsNome['price'];
                    $img1 = $rsNome['img1'];

                    $getCliente = "select * from clientes where id ='$cliente_id'";
                    $runGetClientes = mysqli_query($con,$getCliente);
                    $rs_clientes = mysqli_fetch_array($runGetClientes);
                    $nomeC = $rs_clientes['nome'];
                    $email = $rs_clientes['email'];
                    $tel = $rs_clientes['tel'];
                    $endereco = $rs_clientes['endereco'];
                    $city  = $rs_clientes['cidade'];
                    $estado =  $rs_clientes['estado'];
                    $cep = $rs_clientes['cep'];
                }
            }
            ?>
            <div class="table-responsive" id="detalhes_tabela">
                <table class="table table-bordered">
                    <thead class="bg-primary">
                    <th class="text-uppercase">detalhes do pedido <span id="fatura_detalhes"><?php echo @$faturaOrder?></span></th>
                    </thead>
                    <tbody>
                    <div class="container">
                        <tr>
                            <td class="row">
                                <div class="col-lg-4">
                                    <h4 class="font-weight-bold">Comprador</h4>
                                    <hr class="bg-danger">
                                    <b>Nome:</b><span> <?php echo $nomeC; ?></span> <br>
                                    <b>Email:</b><span> <?php echo $email; ?></span><br>
                                    <b>Telefone:</b><span> <?php echo $tel; ?></span>
                                </div>
                                <div class="col-lg-4 text-left">
                                    <h4 class="font-weight-bold">Entrega</h4>
                                    <hr class="bg-danger">
                                    <address class="text-capitalize">
                                        <b>Cidade:</b><span> <?php echo $city; ?></span>
                                        <b>Estado:</b><span> <?php echo $estado; ?> </span><br>
                                        <b>Endereço:</b><span> <?php echo $endereco; ?></span><br>
                                        <b>CEP:</b><span> <?php echo $cep; ?></span>
                                    </address>
                                </div>
                                <div class="col-lg-4 text-left">
                                    <h4 class="font-weight-bold">Taxa Entrega</h4>
                                    <hr class="bg-danger">
                                    <div class="col-lg-6">
                                        <address>
                                            <b>Tipo:</b><span class="text-uppercase"> <?=substr($frete_desc,'8','8')?></span><br>
                                            <b>Prazo:</b><span class="text-uppercase"> <?=substr($frete_desc,'6','1')?> dia(s) </span><br>
                                            <b>Valor:</b><span> R$ <span class="text-uppercase"> <?=substr($frete_desc,'0','5')?></span></span><br>
                                        </address>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="text-right">
                                            <h3>
                                                <i class="fa fa-truck "></i>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </div>
                    </tbody>
                    <table class="table table-striped" id="result_tabela">
                        <thead>
                        <tr>
                            <th class="text-center">Produto</th>
                            <th class="text-center">Fatura</th>
                            <th class="text-center">Nome do Produto</th>
                            <th class="text-center">Quantidade</th>
                            <th class="text-center">Preço Un</th>
                            <th class="text-center">Valor dos produtos</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr class="text-center">
                            <td>
                                <?php echo $id; ?>
                            </td>
                            <td>
                                <?php echo $faturaOrder?>
                            </td>
                            <td class="text-uppercase">
                                <?php echo $nome; ?>
                            </td>
                            <td>
                                <?php echo $quantidade;?>
                            </td>
                            <td>
                                <?php echo number_format($precoUn, 2,',','.')?>
                            </td>
                            <td>
                                R$ <?php echo number_format( $preco, 2, ',','.')?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </table>
            </div>
        </div>

    </div>

        <div class="container-fluid" style="padding-bottom: 4px; margin-top: 20px;">
            <center><div class="col-lg-4 col-lg-4">

                </div></center>

            <center><div class="col-lg-4 col-lg-4" id="produto">
                    <center><div class="panel" style="
-webkit-box-shadow: 1px 2px 15px 9px #3A3937;
box-shadow: 1px 2px 15px 9px #3A3937;">
                            <div class="panel-header" style="background-color: white">
                                <img style="width: 200px;" class="img-responsive" src="../admin_area/product_images/<?php echo $img1 ?>" alt="">
                            </div>
                            <div class="panel-body">
                                <b><?php echo $nome; ?></b>
                                <h1>R$ <span><?php echo number_format($precoUn, 2, ',', '.'); ?></span></h1>un
                            </div>
                        </div>
                    </center>
                </div></center>

            <center><div class="col-lg-4 col-lg-4">

                </div></center>
        </div>
    </div>
    <?php } ?>
