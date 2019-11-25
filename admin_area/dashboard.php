<?php
if(!isset($_SESSION['admin_email']) && (!isset($_SESSION['admin_pass']))){
    echo "<script>window.open('index.php', '_self')</script>";
}else {

?>

<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <h1 class="page-header">Dashboard</h1>

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

        <div class="panel panel-primary"><!-- panel panel-primary Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <div class="row"><!-- panel-heading row Starts -->

                    <div class="col-xs-3"><!-- col-xs-3 Starts -->

                        <i class="fa fa-tasks fa-5x"> </i>

                    </div><!-- col-xs-3 Ends -->

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                        <div class="huge"><?php echo $count_pro; ?></div>

                        <div>Produtos</div>

                    </div><!-- col-xs-9 text-right Ends -->

                </div><!-- panel-heading row Ends -->

            </div><!-- panel-heading Ends -->

            <a href="home.php?ver_produtos">

                <div class="panel-footer"><!-- panel-footer Starts -->

                    <span class="pull-left"> Ver Detalhes </span>

                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                    <div class="clearfix"></div>

                </div><!-- panel-footer Ends -->

            </a>

        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-3 col-md-6 Ends -->


    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

        <div class="panel panel-green"><!-- panel panel-green Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <div class="row"><!-- panel-heading row Starts -->

                    <div class="col-xs-3"><!-- col-xs-3 Starts -->

                        <i class="fa fa-comments fa-5x"> </i>

                    </div><!-- col-xs-3 Ends -->

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                        <div class="huge"><?php echo $count_clientes; ?></div>

                        <div>Clientes</div>

                    </div><!-- col-xs-9 text-right Ends -->

                </div><!-- panel-heading row Ends -->

            </div><!-- panel-heading Ends -->

            <a href="home.php?ver_clientes">

                <div class="panel-footer"><!-- panel-footer Starts -->

                    <span class="pull-left"> Ver Detalhes </span>

                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                    <div class="clearfix"></div>

                </div><!-- panel-footer Ends -->

            </a>

        </div><!-- panel panel-green Ends -->

    </div><!-- col-lg-3 col-md-6 Ends -->


    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

        <div class="panel panel-yellow"><!-- panel panel-yellow Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <div class="row"><!-- panel-heading row Starts -->

                    <div class="col-xs-3"><!-- col-xs-3 Starts -->

                        <i class="fa fa-shopping-cart fa-5x"> </i>

                    </div><!-- col-xs-3 Ends -->

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                        <div class="huge"><?php echo $count_marcas; ?></div>

                        <div>Produtos Marcas</div>

                    </div><!-- col-xs-9 text-right Ends -->

                </div><!-- panel-heading row Ends -->

            </div><!-- panel-heading Ends -->

            <a href="home.php?ver_marcas">

                <div class="panel-footer"><!-- panel-footer Starts -->

                    <span class="pull-left"> Ver Detalhes </span>

                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                    <div class="clearfix"></div>

                </div><!-- panel-footer Ends -->

            </a>

        </div><!-- panel panel-yellow Ends -->

    </div><!-- col-lg-3 col-md-6 Ends -->


    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

        <div class="panel panel-red"><!-- panel panel-red Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <div class="row"><!-- panel-heading row Starts -->

                    <div class="col-xs-3"><!-- col-xs-3 Starts -->

                        <i class="fa fa-support fa-5x"> </i>

                    </div><!-- col-xs-3 Ends -->

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                        <div class="huge"><?php echo  $count_pedidos; ?></div>

                        <div>Pedidos Pendentes</div>

                    </div><!-- col-xs-9 text-right Ends -->

                </div><!-- panel-heading row Ends -->

            </div><!-- panel-heading Ends -->

            <a href="home.php?ver_pedidos">

                <div class="panel-footer"><!-- panel-footer Starts -->

                    <span class="pull-left"> Ver Detalhes </span>

                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                    <div class="clearfix"></div>

                </div><!-- panel-footer Ends -->

            </a>

        </div><!-- panel panel-red Ends -->

    </div><!-- col-lg-3 col-md-6 Ends -->


</div><!-- 2 row Ends -->

<div class="row" ><!-- 3 row Starts -->

    <div class="col-lg-8" ><!-- col-lg-8 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i> Novos pedidos

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body" ><!-- panel-body Starts -->

                <div class="table-responsive" ><!-- table-responsive Starts -->

                    <table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

                        <thead><!-- thead Starts -->

                        <tr>
                            <th>Pedido Numero:</th>
                            <th>Email cliente</th>
                            <th>Valor Total</th>
                            <th>Produto</th>
                            <th>Qtd</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            $get_pedidos = "select * from pedidos order by 1 DESC LIMIT 0,5";
                            $run_mysql = mysqli_query($con,$get_pedidos);
                            while ($rs = mysqli_fetch_array($run_mysql)){
                                $pedido_id = $rs['id'];
                                $pedido_cliente = $rs['cliente_id'];
                                $pedido_valor = $rs['due_amount'];
                                $pedido_n = $rs['pedido_number'];
                                $pedido_qtd = $rs['qtd'];
                                $pedido_size = $rs['size_p'];
                                $pedido_status = $rs['order_status'];
                                $prod_id = $rs['produto_id'];
                                $i++;

                                $frete = "select frete from pedidos where pedido_number = '$pedido_n' limit 1";
                                $query2 = mysqli_query($con, $frete);
                                $rs_frete = mysqli_fetch_array($query2);
                                $valor_frete = $rs_frete['frete'];
                                $frete_com_ponto = str_replace(',', '.', $valor_frete);
<<<<<<< HEAD
                                $fretenew = substr($frete_com_ponto, 0,5);

                                $valor_total = $pedido_valor + $fretenew;
=======

                                $valor_total = $pedido_valor + $frete_com_ponto;
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
                                $newValor = number_format($valor_total,2, ',','.');
                        ?>
                            <tr>

                                <td><?php echo $pedido_n; ?></td>
                                <td>
                                    <?php
                                        $sql = "select * from clientes where id='$pedido_cliente'";
                                        $query = mysqli_query($con,$sql);
                                        $row = mysqli_fetch_array($query);
                                        $email = $row['email'];
                                        echo $email;
                                    ?>
                                </td>
                                <td><?php echo $newValor
                                    ;?></td>
                                <td><?php
                                    $sql = "select * from products where id='$prod_id'";
                                    $run = mysqli_query($con,$sql);
                                    $row = mysqli_fetch_array($run);
                                    $nome = $row['title'];
                                    echo $nome;
                                    ?></td>
                                <td><?php echo $pedido_qtd;?></td>
                                <td><?php
                                    if($pedido_status=='Pendente'){

                                        echo $pedido_status='Não Pago';
                                    }
<<<<<<< HEAD
                                    if($pedido_status=='Cancelado'){

                                        echo $pedido_status='Cancelado';
                                    }
                                    if($pedido_status=='Rejeitado'){
=======
                                    if($pedido_status=='cancelled'){

                                        echo $pedido_status='Cancelado';
                                    }
                                    if($pedido_status=='rejected'){
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9

                                        echo $pedido_status='Rejeitado';
                                    }

<<<<<<< HEAD
                                    if($pedido_status=='Aprovado'){
=======
                                    if($pedido_status=='approved'){
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9

                                        echo $pedido_status='Pago';
                                    }

                                    ?></td>
                            </tr>

        <?php } ?>
                        </tbody><!-- tbody Ends -->


                    </table><!-- table table-bordered table-hover table-striped Ends -->

                </div><!-- table-responsive Ends -->

                <div class="text-right" ><!-- text-right Starts -->

<<<<<<< HEAD
                    <a href="home.php?ver_pedidos" >
=======
                    <a href="index.php?ver_pedidos" >
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9

                        Ver Todos Pedidos <i class="fa fa-arrow-circle-right" ></i>

                    </a>

                </div><!-- text-right Ends -->


            </div>
        </div>

    </div>

    <div class="col-md-4">

        <div class="panel">

            <div class="panel-body">

                <div class="thumb-info mb-md">

                    <img src="../images/logo.png" class="rounded img-responsive">

                    <div class="thumb-info-title">

                        <span class="thumb-info-inner"><?php echo $admin_nome;?></span>

                        <span class="thumb-info-type"><?php echo $admin_cargo;?></span>

                    </div>

                </div>

                <div class="mb-md">

                    <div class="widget-content-expanded"><!-- widget-content-expanded Starts -->

                        <i class="fa fa-user"></i> <span>Email: </span><?php echo  $admin_email; ?><br>
                        <i class="fa fa-user"></i> <span>País: </span><?php echo $admin_pais; ?><br>
                        <i class="fa fa-user"></i> <span>Telefone: </span><?php echo $admin_contato; ?><br>

                    </div>

                    <hr class="dotted short">

                    <h5 class="text-muted">Sobre</h5>

                    <p>
                        <?php echo $admin_sobre?>
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<?php } ?>
