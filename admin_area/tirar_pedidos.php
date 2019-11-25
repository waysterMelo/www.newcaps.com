<?php
include '../includes/db.php';
if(!isset($_SESSION['admin_email']) && (!isset($_SESSION['admin_pass']))){
    echo "<script>window.open('index.php', '_self')</script>";
}
else {
    ?>
<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / Tirar Pedido

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"> </i> Tirar Pedido

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->
    <div class="row">
        <form action="" method="post" enctype="application/x-www-form-urlencoded">
            <div  class="col-lg-10">
                <center><div class="input-group">
      <span class="input-group-btn">
           <input required type="text" name="pedido" class="form-control" placeholder="pesquisar pedido ...">
        <button class="btn btn-primary" type="submit" name="pesquisar">Pesquisar</button>
      </span>
    </div>
            </div>
        </form>
        <?php
                if (isset($_POST['pesquisar'])) {
                    $i = 0;
                    @$pedido = $_POST['pedido'];

                    $sql = "select * from pedidos where pedido_number = '$pedido'";
                    $query = mysqli_query($con, $sql);
                    while ($rs = mysqli_fetch_array($query)) {
                        $faturaOrder = $rs['pedido_number'];
                        $preco = $rs['due_amount'];
                        $produto_id = $rs['produto_id'];
                        $quantidade = $rs['qtd'];
                        $cliente_id = $rs['cliente_id'];
                        $frete_desc = $rs['frete'];
                        $id_pedido = $rs['id'];

                            $sql_frete = "select frete from pedidos where pedido_number ='$faturaOrder' limit 1";
                            $exe_sql = mysqli_query($con, $sql_frete);
                            $rsSql = mysqli_fetch_array($exe_sql);
                            $frete = $rsSql['frete'];
                            $frete2 = str_replace(',', '.', $frete);
                            $fretenew = substr($frete2, 0, 5);

                            @$valorTotal = $preco + $fretenew;


                            $getCliente = "select * from clientes where id ='$cliente_id'";
                            $runGetClientes = mysqli_query($con, $getCliente);
                            $rs_clientes = mysqli_fetch_array($runGetClientes);
                            $nomeC = $rs_clientes['nome'];
                            $email = $rs_clientes['email'];
                            $tel = $rs_clientes['tel'];
                            $endereco = $rs_clientes['endereco'];
                            $city = $rs_clientes['cidade'];
                            $estado = $rs_clientes['estado'];
                            $cep = $rs_clientes['cep'];
                        }
                    }
        ?>
    </div>
</div>

</div>

</div>

</div>

<section id="dados">
    <div class="table-responsive-md" id="detalhes_tabela">
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
                <?php
                $sql = "select * from pedidos where pedido_number = '$pedido'";
                $query = mysqli_query($con, $sql);
                while ($rs = mysqli_fetch_array($query)) {
                    $faturaOrder = $rs['pedido_number'];
                    $preco = $rs['due_amount'];
                    $produto_id = $rs['produto_id'];
                    $quantidade = $rs['qtd'];
                    $cliente_id = $rs['cliente_id'];
                    $frete_desc = $rs['frete'];
                    $id_pedido = $rs['id'];


                    $getNome = "select * from products where id = '$produto_id'";
                    $queryNome = mysqli_query($con, $getNome);
                    while ($rsNome = mysqli_fetch_array($queryNome)) {
                        $nome = $rsNome['title'];
                        $precoUn = $rsNome['price'];
                        $img1 = $rsNome['img1'];
                        ?>
                        <tr class="text-center">
                            <td>
                                <?php echo $id_pedido; ?>
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
                    <?php }  }  ?>
                </tbody>
            </table>
        </table>
        <section id="valores">
            <div class="col-lg-12">
                <div class="container-fluid" style="padding-bottom: 4px; margin-top: 20px;">
                    <?php
                    $sql = "select * from pedidos where pedido_number = ' $pedido '";
                    $query = mysqli_query($con, $sql);
                    while ($rs = mysqli_fetch_array($query)) {
                        $faturaOrder = $rs['pedido_number'];
                        $preco = $rs['due_amount'];
                        $produto_id = $rs['produto_id'];
                        $quantidade = $rs['qtd'];
                        $cliente_id = $rs['cliente_id'];
                        $frete_desc = $rs['frete'];
                        $id_pedido = $rs['id'];


                        $getNome = "select * from products where id = '$produto_id'";
                        $queryNome = mysqli_query($con, $getNome);
                        while ($rsNome = mysqli_fetch_array($queryNome)) {
                            $nome = $rsNome['title'];
                            $precoUn = $rsNome['price'];
                            $img1 = $rsNome['img1'];
                            ?>
                            <div class="col-lg-4 col-md-6" id="produto" style="margin-right: 10px">
                                <div class="row">
                                    <center><div class="panel" style="
-webkit-box-shadow: 1px 2px 15px 9px #3A3937;
box-shadow: 1px 2px 15px 9px #3A3937;">
                                            <div class="panel-header" style="background-color: white">
                                                <img style="width: 200px;" class="img-responsive" src="../admin_area/product_images/<?php echo $img1 ?>" alt="">
                                            </div>
                                            <div class="panel-body">
                                                <b id="nome"><?php echo $nome; ?></b>
                                                <h1>R$ <span><?php echo number_format($precoUn, 2, ',', '.'); ?></span></h1>un
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        <?php } } ?>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <center><div class="col-md-10">
                            <div class="panel" align="center" style="border: 1px solid black;">
                                <div class="panel-heading">
                                    <h3 align="center" class="h3 panel-title text-uppercase">Valor Total do pedido</h3>
                                </div>
                            </div>
                            <?php
                            require_once "../includes/db.php";
                            $getprice= "select SUM(due_amount) as valor from pedidos WHERE pedido_number='$pedido'";
                            $queryGetprice = mysqli_query($con, $getprice);
                            $rs = mysqli_fetch_array($queryGetprice);
                            $valor = $rs['valor'];

                            $sub = $fretenew + $valor;
                            ?>
                            <div class="panel-body">
                                <span class="col-md-6 text-capitalize">produtos</span><span class="col-md-6">R$<?php echo $valor?></span>
                                <span class="col-md-6 text-capitalize">frete</span><span class="col-md-6">R$<?php echo $fretenew?></span>
                            </div>
                            <div class="panel-footer">
                                <span class="col-md-6 text-capitalize">Total</span><span class="col-md-6">R$<?php echo $sub?></span>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </div>
</section>
    <button id="tirarpedido_button" onclick="generatePDF();" class="pull-right btn btn-success btn-lg"><i class="fa fa-file-pdf-o"></i> imprimir pedido</button>
<?php }?>

