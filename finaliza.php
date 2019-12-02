<?php
session_start();
require_once 'includes/db.php';
require_once 'mercadopago.php';
require_once 'PagamentoMP.php';
include "functions/functions.php";
?>

<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Revise sua compra | New Caps Oficial</title>
    <link rel="stylesheet" href="styles/estilo7.css">
    <link rel="stylesheet" href="./styles/animate.css">
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./styles/bootstrap4.1.min.css">
    <script src="./js/jquery.min.js"></script>
</head>
<body style="background-color: whitesmoke;">
<div id="preloader">
    <div id="status"></div>
</div>
<div id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-6"><!-- col-md-6 offer Starts -->
                <a href="" class="btn btn-default btn-md text-white"
                   style="background-color: black; border: none; font-weight: 700">
                    <?php
                    if (!isset($_SESSION['email'])){
                        echo "Bem Vindo Visitante";
                    }else{
                        echo "<span class='mr-2'>Bem Vindo:</span>".$_SESSION['email']."";
                    }
                    ?>
                </a>
            </div>
            <div class="col-md-6"><!-- col-md-6 Starts -->
                <ul class="menu"><!-- menu Starts -->

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo "<a href='customer/customer_register.php'>Registrar</a>";
                        }else{
                            echo "<a href='customer/minha_conta.php?edit_account'>Editar Conta</a>";
                        }
                        ?>
                    </li>

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo  "<a href='./shopping/'>Produtos</a>";
                        }else{
                            echo  "<a class='text-capitalize' href='./customer/minha_conta.php?meus_pedidos' >meus pedidos</a>";
                        }
                        ?>
                    <li>

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo  "<a href='./carrinho/'>Carrinho</a>";
                        }else{
                            echo  "<a class='text-capitalize' href='./customer/minha_conta.php?meus_pedidos' >minha conta</a>";
                        }
                        ?>
                    </li>

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo "<a href='./customer/login.php'> Login </a>";
                        }else {
                            echo "<a href='./customer/logout.php'> Sair </a>";
                        }
                        ?>
                    </li>

                </ul><!-- menu Ends -->

            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="./images/logo.png" alt="Logo new caps" class="d-block w-25">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <form class="form-inline mx-5">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <input type="text" class="form-control" placeholder="pesquisar" aria-label="" aria-describedby="basic-addon1">
                    </div>
                    <button class="btn btn-danger" type="button"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <li class="nav-item ml-2">
                <a class="nav-link" href="index.php">Pagina Inicial</a>
            </li>
            <li class="nav-item ml-2">
                <a class="nav-link" href="./shopping">Produtos</a>
            </li>
            <li class="nav-item">
                <?php
                if (!isset($_SESSION['email'])){
                    echo "<a class='nav-link' href='./customer/login.php'>Minha Conta</a>";
                }else{
                    echo "<a class='nav-link' href='./customer/minha_conta.php?meus_pedidos'>Pedidos</a>";
                }
                ?>
            <li>
            <li class="nav-item">
                <a class="nav-link" href="./contato">Contato</a>
            </li>
            <li class="nav-item">
                <a style="background-color: black;" class="btn btn-dark btn-md nav-link text-white" href="./carrinho/"><!-- btn btn-primary navbar-btn right Starts -->

                    <i class="fa fa-shopping-cart"></i>

                    <span><?php itens(); ?> item(s) no carrinho </span>

                </a><!-- btn btn-primary navbar-btn right Ends -->

            </li>
        </ul>
    </div>
</nav>
<div class="container pb-5">
    <div class="pt-3 text-center">
        <h3 class="bg-light">Resumo do Pedido</h3>
    </div>
    <div class="row">
        <div class="text-center col-lg-12">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                            <tr class="text-center">
                                <td>#</td>
                                <td>Imagem</td>
                                <td>Nome</td>
                                <td>Quantidade</td>
                                <td>Sub-Total</td>
                            </tr>
                            <tr>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            $id = $_GET['id'];
                            $pagar = new PagamentoMP();
                            $query = mysqli_query($con,"SELECT  * FROM pedidos WHERE pedido_number='$id'");
                            while ($rs = mysqli_fetch_array($query)) {
                                $produto_id = $rs['produto_id'];
                                $valor = $rs['due_amount'];
                                $qtd = $rs['qtd'];
                                $sub_total_pro = $valor;
                                $getnome = "select * from products where id = '$produto_id'";
                                $queryP = mysqli_query($con, $getnome);
                                $sql2 = "SELECT SUM(due_amount) as total from pedidos WHERE pedido_number = '$id'";
                                $query2 = mysqli_query($con,$sql2);
                                $rs2 = mysqli_fetch_array($query2);
                                $total_dos_p = $rs2['total'];
                                $entrega = "SELECT frete from pedidos as frete WHERE pedido_number = '$id' LIMIT 1";
                                $query3 = mysqli_query($con,$entrega);
                                $rs3 = mysqli_fetch_array($query3);
                                $frete = $rs3['frete'];
                                $frete2 = substr($frete, '0', '5');
                                $frete3 = str_replace(',', '.', $frete2);
                                $totalMP = $frete3 + $total_dos_p;
                                while ($rsP = mysqli_fetch_array($queryP)) {
                                    $nome = $rsP['title'];
                                    $img = $rsP['img1'];
                                    $i++;
                                    $url   = "https://newcapsoficial.com.br";
                                    $btn   = $pagar->PagarMP($id , $nome , (float)$totalMP, $url);
                                    ?>
                                    <tr class="text-center">
                                        <td>
                                            <b><?php echo $i; ?></b>
                                        </td>
                                        <td>
                                            <img alt="produto" style="width:30px;" src="./admin_area/product_images/<?php echo $img;?>" />
                                        </td>
                                        <td>
                                            <b class="text-capitalize"><?php echo $nome; ?></b>
                                        </td>

                                        <td>
                                            <b><?php echo $qtd; ?></b>
                                        </td>
                                        <td><b>R$ <?php echo number_format($sub_total_pro, 2,',','.')?></b></td>
                                    </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                        <table class="table table-dark"><!-- table Starts -->

                            <tbody><!-- tbody Starts -->

                            <tr>
                                <td>Pedido</td>
                                <th class="text-center">
                                    R$ <?php echo number_format($total_dos_p, 2, ',', '.');?>
                                </th>
                            </tr>

                            <tr>
                                <td>Entrega</td>
                                <th class="input-group-append ml-3">
                                    <span class="input-group-text bg-light border-0 text-right float-right"><i class="fa fa-money"></i></span>
                                    <input style="width: 60%;" name="frete_valor" class="input-group-append form-control bg-light border-0 text-right"
                                           disabled value="R$ <?php echo substr($frete, '0', '5')?>"/>
                                </th>
                            </tr>
                            </tbody><!-- tbody Ends -->
                            <tfoot>
                            <th class="text-left h2">
                               Total
                            </th>

                            <th class="text-right h2">
                                <p id="total_carrinho">R$
                                    <?php
                                    $totalValor = $total_dos_p + @$frete3;
                                    echo number_format($totalValor,2,',','.');
                                    ?>
                                </p>
                            </th>
                            </tfoot>
                        </table><!-- table Ends -->
                    </div>
                </div>
            <div class="row justify-content-end">
                <div class="col-lg-12">
                    <?php echo $btn; ?>
                </div>
                <?php
                $data = array(
                    "token"=> '1A13D2F104D547629471D79D2DBF0461',
                    "email" => 'dionaton_santos@hotmail.com',

//                "token"=> '4A97C26E784D4EF6978BE1FAA3DA9DC6',
//                "email" => 'waystermelo@gmail.com',
                    "currency" => 'BRL',
                    "itemQuantity1" => $qtd,
                    "itemId1" => $produto_id,
                    "itemDescription1" => $nome . ' + frete',
                    "itemAmount1" => $totalValor,
                    "reference" => $id
                );
                $email = "dionaton_santos@hotmail.com";
                $token = "1A13D2F104D547629471D79D2DBF0461";

                $url = "https://ws.pagseguro.uol.com.br/v2/checkout?";


                @$data = http_build_query($data);

                $curl = curl_init($url);

                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);


                $xml = curl_exec($curl);

                curl_close($curl);

                @$xml = simplexml_load_string($xml);

                @$codigo = $xml->code;

                ?>
                <div class="col-lg-12">
                    <!--                        <button name="pagar" type="submit" class="btn btn-outline-success btn-lg text-uppercase">pagar com pag seguro</button>-->
                    <!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
                    <form id="comprar" action="https://pagseguro.uol.com.br/checkout/v2/payment.html?code=<?=$codigo?>" method="post" onsubmit="PagSeguroLightbox(this); return false;" enctype="multipart/form-data">
                        <!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
                        <input type="hidden" name="code" id="code" value="<?=$codigo;?>"/>
                        <input type="hidden" name="iot" value="button" />
                        <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
                    </form>
                    <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
                    <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
                </div>
            </div>
            </div>
            </div>
        </div>

<div id="footer" class="pt-2"><!-- footer Starts -->
    <div class="container"><!-- container Starts -->
        <div class="row" >
            <div class="col-md-3 col-sm-6">
                <h4 style="color:red;">Categorias</h4>
                <ul class="navbar-nav" >
                    <?php
                    $sql = "select * from categoria";
                    $query = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($query)){
                        $id = $row['id'];
                        $categoria = $row['categoria'];
                        echo "
                              <li class='nav-item my-2'><a href=\"./shopping/?categoria=$id\" class=\"text-white text-capitalize\">$categoria</a></li>";
                    }
                    ?>

                </ul><!-- ul Ends -->

                <hr class="hidden-md hidden-lg">

            </div><!-- col-md-3 col-sm-6 Ends -->
            <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

                <h4 style="color: red;">Nosso Endereço</h4>

                <p style="color: white;"><!-- p Starts -->
                    <strong>New Caps Oficial</strong>
                    <br>Matozinhos
                    <br>Minas Gerais
                    <br>CEP:35720-000
                    <br>contato@newcapsoficial.com.br
                </p><!-- p Ends -->

                <a href="./contato/" class="text-capitalize">Va para Pagina de contatos</a>

                <hr class="hidden-md hidden-lg">

            </div><!-- col-md-3 col-sm-6 Ends -->
            <div class="col-md-3">
                <h4 style="color: red;"> Redes Sociais </h4>
                <p class=""><!-- social Starts --->
                    <a href="#"><i><img src="./images/social/facebook.png" alt="facebook"></i></a>
                    <a href="#"><i><img src="./images/social/instagram.png" alt="facebook"></i></a>
                    <a href="#"><i><img src="./images/social/google+.png" alt="facebook"></i></a>
                    <a href="#"><i><img src="./images/social/email.png" alt="facebook"></i></a>
                </p><!-- social Ends --->
            </div>
            <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->
                <h4 class="text-capitalize" style="color: red;">Formas de pagamento</h4>
                <img src="./images/mercado_pago.png" alt="pagamento"
                     class="img-fluid" style="width: 100%"><br>
                <img src="./images/pagseguro.png" alt="pagamento"
                     class="img-fluid" style="width: 100%"><br>
                <hr>
            </div><!-- col-md-3 col-sm-6 Ends -->
        </div><!-- row Ends -->
    </div><!-- container Ends -->
</div><!-- footer Ends -->

<div id="copyright" style="background-image: linear-gradient(to right top, #ff0000, #ff0706, #ff0d0d, #ff1312, #ff1717);" ><!-- copyright Starts -->

    <div class="container" ><!-- container Starts -->

        <div class="col-md-6" ><!-- col-md-6 Starts -->

            <p class="pull-left text-capitalize"> &copy; <?php echo date("Y"); ?>
                todos os direitos reservados New Caps Oficial
            </p>

        </div><!-- col-md-6 Ends -->

        <div class="col-md-6 ml-auto" ><!-- col-md-6 Starts -->
            <p class="text-right" >
                Desenvolvido por:<a class="text-white mx-2" target="_blank" href="https://www.linkedin.com/in/wayster-de-melo-b32278105/" >Wayster H. De Melo</a>
            </p>

        </div><!-- col-md-6 Ends -->

    </div><!-- container Ends -->

</div><!-- copyright Ends -->

<script src="./js/bootstrap4.1.min.js"></script>
<script type="text/javascript">
    $(window).on('load',function () {
        $('#status').fadeOut();
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({ 'overflow' : 'visible'})
    });
</script>
</body>
</html>