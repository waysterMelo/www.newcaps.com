<?php
session_start();
$sId = session_id();
include '../includes/db.php';
include "../functions/functions.php";
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Carrinho | New Caps oficial</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../styles/estilo7.css">
    <link rel="stylesheet" href="../styles/bootstrap4.1.min.css">
    <link rel="stylesheet" href="../styles/jquery-confirm.min.css">
    <script src="../js/jquery-confirm.min.js"></script>
    <link rel="stylesheet" href="table-basic.css">
    <link rel="stylesheet" href="../styles/responsive-style2.css">
</head>
<body class="bg-light">
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
                        echo "<span class='mr-2'>Bem Vindo:</span>".$_SESSION['email']. "";
                    }
                    ?>
                </a>


            </div>
            <div class="col-md-6"><!-- col-md-6 Starts -->
                <ul class="menu"><!-- menu Starts -->

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo "
                            <a href=\"../customer/customer_register.php\"> Registrar</a>
                            ";
                        }else{
                            echo "<a href=\"../customer/minha_conta.php?edit_account\"> Editar Conta</a>";
                        }
                        ?>
                    </li>

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo  "<a href='../shopping/' >Produtos</a>";
                        }else{
                            echo  "<a class='text-capitalize' href='../customer/minha_conta.php?meus_pedidos' >meus Pedidos</a>";
                        }
                        ?>
                    <li>

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo  "<a href=''>Carrinho</a>";
                        }else{
                            echo  "<a class='text-capitalize' href='../customer/minha_conta.php?meus_pedidos' >minha conta</a>";
                        }
                        ?>
                    </li>

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo "<a href='../customer/login.php'> Login </a>";
                        }else {
                            echo "<a href='../customer/logout.php'> Sair </a>";
                        }
                        ?>
                    </li>

                </ul><!-- menu Ends -->

            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="button-nav">
    <img src="/images/logo.png" alt="Logo new caps" class="img-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mx-auto">
            <form class="form-inline mx-2 d-none d-sm-block">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <input type="text" class="form-control" placeholder="pesquisar" aria-label="" aria-describedby="basic-addon1">
                    </div>
                    <button class="btn btn-danger" type="button"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <li class="nav-item ml-2">
                <a class="nav-link" href="../">Pagina Inicial</a>
            </li>
            <li class="nav-item ml-2">
                <a class="nav-link" href="../shopping">Produtos</a>
            </li>
            <li class="nav-item ml-2">
                <?php
                if (!isset($_SESSION['email'])){
                    echo "<a class='nav-link' href='../customer/login.php'>Minha Conta</a>";
                }else{
                    echo "<a class='nav-link' href='../customer/minha_conta.php?meus_pedidos'>Pedidos</a>";
                }
                ?>
            <li>

            <li class="nav-item">

            <li class="nav-item">
                <a class="nav-link" href="../contato">Contato</a>
            </li>
            <li class="nav-item">
                <a style="background-color: black;" class="btn btn-dark btn-md nav-link text-white" href="../carrinho/"><!-- btn btn-primary navbar-btn right Starts -->

                    <i class="fa fa-shopping-cart"></i>

                    <span><?php itens(); ?> item(s) no carrinho </span>

                </a><!-- btn btn-primary navbar-btn right Ends -->

            </li>
        </ul>
    </div>
</nav>
<div id="content"><!-- content Starts -->
    <div class="container-fluid"><!-- container Starts -->
        <div class="col-md-12" ><!--- col-md-12 Starts -->
            <ul class="breadcrumb" ><!-- breadcrumb Starts -->
                <li class="breadcrumb-item">
                    <a href="../index.php">Página Inicial</a>
                </li>
                <li class="breadcrumb-item">Carrinho</li>
            </ul><!-- breadcrumb Ends -->
        </div><!--- col-md-12 Ends -->
    </div><!-- container Ends -->
</div><!-- content Ends -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8" id="cart"><!-- col-md-9 Starts -->
            <div class="bg-white p-3"><!-- box Starts -->
                <form action="" method="post" enctype="multipart/form-data" ><!-- form Starts -->
                    <h2 class="card-title"> Carrinho </h2>
                    <?php
                    $selectcar = "select * from cart where session_id ='$sId' and dtremoved is NULL";
                    $run = mysqli_query($con, $selectcar);
                    $count = mysqli_num_rows($run)
                    ?>
                    <p class="card-text text-muted" > Voce tem <?php echo $count; ?> item(s) no carrinho </p>
                  <div class="bg-white">
                      <div class="table-responsive-lg col-lg-12">
                          <!--TABELA DOS PRODUTOS -->
                          <table class="table table-striped tableBasic">
                              <thead class="text-center">
                              <tr>
                                  <th scope="col">Imagem</th>
                                  <th scope="col">Produto</th>
                                  <th scope="col">Quantidade</th>
                                  <th scope="col">Preço un</th>
                                  <th scope="col">Tamanho</th>
                                  <th scope="col">Deletar</th>
                                  <th scope="col" colspan="">Total</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $total = 0;
                              while($row = mysqli_fetch_array($run)){
                                  $id = $row['id_pro'];
                                  $qty = $row['quantidade'];

                                  $products  = "select * from products where id='$id'";
                                  $runproducts = mysqli_query($con, $products);
                                  while($rowP = mysqli_fetch_array($runproducts)){

                                      $pro_id = $rowP['id'];
                                      $title = $rowP['title'];
                                      $img1 =  $rowP['img1'];
                                      $price = $rowP['price'];
                                      $sub_total = $rowP['price'] * $qty;
                                      $total += $sub_total;
                                      ?>

                                      <tr class="text-center">
                                          <td>
                                              <img src="../admin_area/product_images/<?php echo $img1; ?>"
                                                   alt="bone" class="img-fluid img-thumbnail" style="width: 50px">
                                          </td>
                                          <td>
                                              <a class="text-danger" href="../detalhes/?pro_id=<?php echo $pro_id?>"><?php echo $title; ?></a>
                                          </td>
                                          <td>
                                              <?php echo $qty; ?>
                                          </td>
                                          <td>
                                              <?php echo 'R$' . number_format($price, 2, ',', '.');?>
                                          <td>
                                              Único
                                          </td>
                                          <td>
                                              <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" >
                                          </td>
                                          <td class="text-center" colspan="5">
                                              <?php echo 'R$' . number_format($sub_total, 2, ',', '.');?>
                                          </td>
                                      </tr>
                                  <?php } } ?>
                              </tbody>
                          </table>
                          <!--end TABELA DOS PRODUTOS -->
                          <!--TABELA DOS BOTOES -->
                              <table class="table table-dark">
                                  <tbody>
                                  <tr>
                                      <th class="th_um">
                                          <a href="../shopping/" class="btn btn-success padding_xs">
                                              <i class="fa fa-chevron-left"></i> Continuar Comprando
                                          </a>
                                      </th>
                                      <th class="float-right th_dois">
                                          <button class="btn btn-light" type="submit" name="atualizar" value="">
                                              <i class="fa fa-refresh"></i> Atualizar Carrinho
                                          </button>
                                      </th>
                                  </tr>
                                  </tbody>
                              </table>
                          </div>
                          <!--end TABELA DOS BOTOES -->
                      </div>
                </form>
            </div>
            </div>
            <?php
            function update_cart(){
                        global $con;
                        $sId = session_id();
                        if (isset($_POST['atualizar'])){
                            foreach ($_POST['remove'] as $remove_id){
                                $delete_pro = "update cart set dtremoved = NOW() 
where session_id ='$sId' and id_pro = '$remove_id'";
                                $run = mysqli_query($con, $delete_pro);

                                if ($run){
                                    echo "<script>window.open('../carrinho', '_self')</script>";
                                }
                            }
                        }
                    }
                    echo @$up_cart = update_cart();
            ?>
        <div class="col-sm-12 col-md-12 col-lg-4"><!-- col-md-3 Starts -->
            <?php
                 @$email = $_SESSION['email'];
                $sql = "select * from clientes where email='$email'";
                $query = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($query);
                $id_cl = $row['id'];
            ?>
            <div class="card" id="order-summary"><!-- box Starts -->
                <div class="card-header" style="background-color: black; color: white;"><!-- box-header Starts -->
                    <h3 class="card-title text-center">Pedido Total</h3>
                </div><!-- box-header Ends -->
                <p class="text-center card-text p-4">
                    Valores correspondentes ao serviço PAC e SEDEX dos correios <br>
                    calcule o frete na proxima pagina.
                </p>
                <div class="table-responsive-lg"><!-- table-responsive Starts -->

                    <table class="table table-dark"><!-- table Starts -->

                        <tbody class="text-center"><!-- tbody Starts -->

                        <tr>
                            <td>Pedido</td>
                            <th class="text-center">
                                R$<?php echo number_format($total, 2, ',', '.');?>
                            </th>
                        </tr>
                        </tbody><!-- tbody Ends -->
                        <tfoot>
                        <th class="text-left h2">
                            TOTAL
                        </th>

                        <th class="text-right h2">
                            <p id="total_carrinho">
                                R$<?php echo number_format($total, 2, ',', '.');?>
                            </p>
                        </th>
                        </tfoot>
                    </table><!-- table Ends -->
                </div><!-- table-responsive Ends -->
                <div class="table-responsive">
                    <table class="table table-bordered border-0">
                        <tr>
                            <th class="text-center border-0">
                                    <a href="../carrinho/calcular-frete.php" class="btn btn-primary text-center font-weight-light">Concluir e calcular o frete</span></a>
                                    <img src="../images/correios.jpg" style="width: 200px; min-height: 80px;max-height: 80px;" alt="mercado pago" class="img-fluid">
                            </th>
                        </tr>
                    </table>
                </div>
            </div><!-- pedido total -->
        </div>
        </div>

<div class="container" style="background-color: transparent">
        <div class="col-lg-12 text-left text-white">
            <div class="pb-4">
                <h1>Lançamentos da semana</h1>
                <p>produtos que você com certeza vai gostar <i class="fa fa-smile-o"></i></p>
            </div>
        </div>
</div>
<div class="row pb-5">
    <div class="col-lg-8">
        <div class="row">
            <?php echo productsRandom() ?>
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 col-md-12">
        <div class="ctg-right">
            <a href="#" target="_blank">
                <img class="img-fluid d-block mx-auto" src="../images/foto1.jpg" class="img-fluid">
            </a>
        </div>
    </div>
</div>
</div>


<div id="footer"><!-- footer Starts -->
    <div class="container"><!-- container Starts -->
        <div class="row pt-3">
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
                    <li class='nav-item my-2'><a href=\"./shopping/?categoria=$id\" class=\"text-white text-capitalize\">$categoria</a></li>
                    ";
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

                <a href="../contato/" class="text-capitalize">Va para Pagina de contatos</a>

                <hr class="hidden-md hidden-lg">

            </div><!-- col-md-3 col-sm-6 Ends -->
            <div class="col-md-3">
                <h4 style="color: red;"> Redes Sociais </h4>
                <p class=""><!-- social Starts --->
                    <a href="#"><i><img src="../images/social/facebook.png" alt="facebook"></i></a>
                    <a href="#"><i><img src="../images/social/instagram.png" alt="facebook"></i></a>
                    <a href="#"><i><img src="../images/social/google+.png" alt="facebook"></i></a>
                    <a href="#"><i><img src="../images/social/email.png" alt="facebook"></i></a>
                </p><!-- social Ends --->
            </div>
            <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->
                <h4 class="text-capitalize" style="color: red;">Formas de pagamento</h4>
                <img src="../images/mercado_pago.png" alt="pagamento"
                     class="img-fluid" style="width: 100%"><br>
                <img src="../images/pagseguro.png" alt="pagamento"
                     class="img-fluid" style="width: 100%"><br>
                <hr>
            </div><!-- col-md-3 col-sm-6 Ends -->
        </div><!-- row Ends -->
    </div><!-- container Ends -->
</div>
<div id="copyright" style="background-image: linear-gradient(to right top, #ff0000, #ff0706, #ff0d0d, #ff1312, #ff1717);" ><!-- copyright Starts -->

    <div class="container" ><!-- container Starts -->

        <div class="col-md-6" ><!-- col-md-6 Starts -->

            <p class="pull-left text-capitalize"> &copy; <?php echo date("Y"); ?>
                todos os direitos reservados New Caps Oficial
            </p>

        </div><!-- col-md-6 Ends -->

        <div class="col-md-6 ml-auto" ><!-- col-md-6 Starts -->
            <p class="text-right" >
                Desenvolvido por:<a class="text-dark mx-2" target="_blank" href="https://api.whatsapp.com/send?phone=31971624192&text=Ola%20,%20gostaria%20de%20fazer%20um%20or%C3%A7amento" >Wayster H. De Melo</a>
            </p>

        </div><!-- col-md-6 Ends -->

    </div><!-- container Ends -->

</div>

<script src="../js/bootstrap4.1.min.js"></script>
<script src="basic-table.min.js"></script>
<script type="text/javascript">
    $(window).on('load',function () {
        $('#status').fadeOut();
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({ 'overflow' : 'visible'});
    });
$('.tableBasic').basictable();
</script>
</body>
</html>