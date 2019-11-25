<?php
session_start();
$sId = session_id();
include('./includes/db.php');
include('./functions/functions.php');
?>
<!doctype html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Caps Oficial</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="styles/estilo5.css">
=======
    <link rel="stylesheet" href="styles/estilo3.css">
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
    <link rel="stylesheet" href="styles/animate.css">
    <link rel="stylesheet" href="styles/responsive.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/bootstrap4.1.min.css">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/responsive4.css">

</head>
<body>
<<<<<<< HEAD

=======
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
<div id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-12"><!-- col-md-6 offer Starts -->
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
            <div class="col-md-6 col-12"><!-- col-md-6 Starts -->
                <ul class="menu"><!-- menu Starts -->
                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo "<a href=\"./customer/customer_register.php\"> Registrar</a>";
                        }else{
                            echo "<a href=\"./customer/minha_conta.php?edit_account\"> Editar Conta</a>";
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
<<<<<<< HEAD
    <img src="images/logo.png" alt="Logo new caps" class="img-fluid">
=======
    <img src="./admin_area/admin_images/logo.svg" alt="Logo new caps" class="img-fluid">
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
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
                <a class="nav-link" href="index.php">Pagina Inicial</a>
            </li>
            <li class="nav-item ml-2">
                <a class="nav-link" href="./shopping">Produtos</a>
            </li>
            <li class="nav-item ml-2">
                <?php
                if (!isset($_SESSION['email'])){
                    echo "<a class='nav-link' href='./customer/login.php'>Minha Conta</a>";
                }else{
                    echo "<a class='nav-link' href='./customer/minha_conta.php?meus_pedidos'>Pedidos</a>";
                }
                ?>
            <li>
<<<<<<< HEAD
            <li class="nav-item mx-3">
=======
            <li class="nav-item ml-2">
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
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
<<<<<<< HEAD
=======

>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
    <div class="container-fluid" id="slider">
        <div class="col-md-12" style="padding: 0;">

            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <?php
                    $getImages = "select * from slider limit 0,1";
                    $run = mysqli_query($con,$getImages);
                    $rs = mysqli_fetch_array($run);
                        $img1 = $rs['slide_image'];
                    ?>
                    <div class="carousel-item active">
                        <img class="d-block w-100 img-fluid" src="images/<?=$img1?>" alt="Primeiro Slide">
                        <div class="carousel-caption">
                            <h1 class="animated fadeInDownBig text-capitalize">New Caps Oficial <br></h1>
                            <h2 class="animated fadeInUpBig delay-1s text-capitalize text-white"> contamos com diversos tipos e modelos de bonés</h2>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <?php
                        $getImages = "select * from slider limit 1,1";
                        $run = mysqli_query($con,$getImages);
                        $rs = mysqli_fetch_array($run);
                        $img2 = $rs['slide_image'];
                        ?>
                        <img class="d-block w-100 img-fluid" src="images/<?=$img2?>" alt="Segundo Slide">
                        <div class="carousel-caption">
                            <h1 class="animated swing text-capitalize">Durabilidade</h1>
                            <h2 class="animated swing delay-1s text-capitalize text-white">produtos com alta durabilidade </h2>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <?php
                        $getImages = "select * from slider limit 2,2";
                        $run = mysqli_query($con,$getImages);
                        $rs = mysqli_fetch_array($run);
                        $img3 = $rs['slide_image'];
                        ?>
                        <img class="d-block w-100" src="images/<?=$img3?>" alt="Terceiro Slide">
                        <div class="carousel-caption">
                            <h1 class="animated fadeInDown text-capitalize">Não fique de fora</h1>
                            <h2 class="animated swing delay-1s text-capitalize text-white">escolha seu modelo ! <i class="fa fa-smile-o fa-2x"></i></h2>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
        </div>
    </div>
    <div class="container" id="diferenciais" >
        <div class="row">
<<<<<<< HEAD
            <div class="col-sm-6 col-md-4 col-4 dif_col">
=======
            <div class="col-sm-6 col-md-4 col-12 dif_col">
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
                <div class="thumbnail">
                    <img src="images/foto1.jpg" alt="tendencias" class="img-fluid">
                    <h2 class="text-capitalize text-center" style="margin-top: -20vh">As últimas tendências.</h2>
                </div>
            </div>
<<<<<<< HEAD
            <div class="col-sm-6 col-md-4 col-4 dif_col">
=======
            <div class="col-sm-6 col-md-4 col-12 dif_col">
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
                <div class="thumbnail">
                    <img src="images/foto2.jpg" alt="gostos" class="img-fluid">
                    <h2 class="text-center text-capitalize" style="margin-top: -20vh">diversos gostos</h2>
                </div>
            </div>
<<<<<<< HEAD
            <div class="col-sm-6 col-md-4 col-4 dif_col">
=======
            <div class="col-sm-6 col-md-4 col-12 dif_col">
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
                <div class="thumbnail">
                    <img src="images/foto3.jpg" alt="qualidade" class="img-fluid">
                    <h2 class="text-capitalize text-center" style="margin-top: -20vh">Excelente qualidade no atendimento</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4" id="news">
<<<<<<< HEAD
        <h2 class="text-capitalize font-weight-bold text-white">Útimas novidades</h2>
=======
        <h2 class="text-capitalize font-weight-bold">Útimas novidades</h2>
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
        <hr>
        </div>
    <div class="container" id="produtos">
        <div class="col-lg-12 col-12 col-md-12" style="margin-bottom: 15px; margin-left: 4%">
            <div class="row justify-content-center">
                <?php
                global $con;

                $sql = "select * from products limit 0,11";
                $query = mysqli_query($con, $sql);
                while($rs = mysqli_fetch_array($query)){
                    $id = $rs['id'];
                    $marcas = $rs['marcas_id'];
                    $title = $rs['title'];
                    $img1 = $rs['img1'];
                    $img2 = $rs['img2'];
                    $price = $rs['price'];
                    $newpreco = number_format($price,2,',','.');
                    $url = $rs['url'];

<<<<<<< HEAD
                    echo " <div class='col-md-6 col-lg-4 d-flex flex-row col-6 mx-auto'>
=======
                    echo " <div class='col-md-3 col-lg-4 d-flex flex-row col-12 mx-auto'>
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
                   <div class=\"product-grid4\">
                    <div class=\"product-image4\">
                        <a href=\"./detalhes/?produto=$id\">
                            <img src=\"./admin_area/product_images/$img1\" class=\"img-fluid pic-1\">
                            <img src=\"./admin_area/product_images/$img2\" class=\"img-fluid pic-2\">
                        </a>
                        
                        <ul class=\"social\">
                            <li><a href=\"./detalhes/?produto=$id\" data-trip=\"Ver\"><i class=\"fa fa-eye\"></i></a></li>
                        </ul>
                        <span class=\"product-new-label\">Lançamento</span>
                    </div>
                    <div class=\"product-content\">
                        <h3 class=\"title\"><a href=\"./detalhes/?produto=$id\">$title</a></h3>
                        <div class=\"price\">
                            R$ $newpreco
                        </div>
                        <a href=\"./detalhes/?produto=$id\" class=\"add-to-cart\">Ver Detalhes</a>
                    </div>
                </div>
            </div>           
        ";
                }
                ?>
            </div>
            <div class="row justify-content-end">
<<<<<<< HEAD
                <a href="shopping/?all_products" class="btn btn-secondary my-5">ver todos produtos</a>
=======
                <a href="shopping/?all_products" class="btn btn-danger my-5">ver todos produtos</a>
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
            </div>
        </div>
    </div>

<div id="footer"><!-- footer Starts -->
    <div class="container"><!-- container Starts -->
<<<<<<< HEAD
        <div class="row pt-5">
=======
        <div class="row" >
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
            <div class="col-lg-2 col-md-3 col-sm-6 text-center pt-3">
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
            <div class="col-lg-4 col-md-3 col-sm-6 text-center"><!-- col-md-3 col-sm-6 Starts -->

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
                <h4 class="text-center" style="color: red;"> Redes Sociais </h4>
                <p class="text-center"><!-- social Starts --->
<<<<<<< HEAD
                    <a href="https://www.facebook.com/jhonatan.stetcar" target="_blank"><i><img src="./images/social/facebook.png" alt="facebook"></i></a>
                    <a href="https://www.instagram.com/newcaps.oficial/" target="_blank"><i><img src="./images/social/instagram.png" alt="facebook"></i></a>
                    <a href="contato@newcapsoficial.com.br" target="_blank"><i><img src="./images/social/email.png" alt="email"></i></a>
=======
                    <a href="#"><i><img src="./images/social/facebook.png" alt="facebook"></i></a>
                    <a href="#"><i><img src="./images/social/instagram.png" alt="facebook"></i></a>
                    <a href="#"><i><img src="./images/social/google+.png" alt="facebook"></i></a>
                    <a href="#"><i><img src="./images/social/email.png" alt="facebook"></i></a>
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
                </p><!-- social Ends --->
            </div>
            <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->
                <h4 class="text-capitalize text-center" style="color: red;">Formas de pagamento</h4>
                <img src="images/mercado_pago.png" alt="pagamento"
                     class="img-fluid" style="width: 100%"><br>
                <img src="images/pagseguro.png" alt="pagamento"
                     class="img-fluid" style="width: 100%"><br>
                <hr>
            </div><!-- col-md-3 col-sm-6 Ends -->
        </div><!-- row Ends -->
    </div><!-- container Ends -->
</div><!-- footer Ends -->
<<<<<<< HEAD
<div id="copyright" style="background-color: transparent" ><!-- copyright Starts -->
=======
<div id="copyright" style="background-image: linear-gradient(to right top, #ff0000, #ff0706, #ff0d0d, #ff1312, #ff1717);" ><!-- copyright Starts -->
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9

    <div class="container" ><!-- container Starts -->

        <div class="col-md-6" ><!-- col-md-6 Starts -->

            <p class="float-left text-capitalize"> &copy; <?php echo date("Y"); ?>
                todos os direitos reservados New Caps Oficial
            </p>

        </div><!-- col-md-6 Ends -->

        <div class="col-md-6 ml-auto" ><!-- col-md-6 Starts -->
             <p class="text-right" >
                   Desenvolvido por:<a class="mx-2 text-dark" target="_blank" href="https://www.linkedin.com/in/wayster-de-melo-b32278105/" >Wayster H. De Melo</a>
             </p>

        </div><!-- col-md-6 Ends -->

    </div><!-- container Ends -->

</div><!-- copyright Ends -->
<script src="js/bootstrap4.1.min.js"></script>
</body>
</html>