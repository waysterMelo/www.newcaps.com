<?php
session_start();
$sId = session_id();
include('../includes/db.php');
include('../functions/functions.php');
?>
<!doctype html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping</title>
    <link rel="stylesheet" href="../styles/bootstrap4.1.min.css">
    <link rel="stylesheet" href="../styles/estilo5.css">
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="responsive4.css">

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
                            echo "<a href=\"../customer/customer_register.php\"> Registrar</a>";
                        }else{
                            echo "<a href=\"../customer/minha_conta.php?edit_account\"> Editar Conta</a>";
                        }
                        ?>
                    </li>

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo  "<a href='../shopping' >Produtos</a>";
                        }else{
                            echo  "<a class='text-capitalize' href='../customer/minha_conta.php?meus_pedidos' >meus Pedidos</a>";
                        }
                        ?>
                    <li>

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo  "<a href='../carrinho/'>Carrinho</a>";
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="../images/logo.png" alt="Logo new caps" class="img-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mx-auto">
            <form class="form-inline mx-2 d-none d-sm-block" id="search">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <input type="text" class="form-control" placeholder="pesquisar" aria-label="" aria-describedby="basic-addon1">
                    </div>
                    <button class="btn btn-danger" type="button"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <li class="nav-item ml-2">
                <a class="nav-link" href="../index.php">Pagina Inicial</a>
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
            <li class="nav-item ml-2">
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

<div id="content" class="">
    <div class="container-fluid">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="../index.php">Home</a></li>
                <li>Shopping</li>
            </ul>
        </div>

        <div class="row">

            <div class="col-md-3 col-lg-3">
                <?php include ('../includes/sidebar.php')?>
            </div>

            <div class="col-md-9 col-lg-9 col-12" id="sloganProdutos">
                <?php
                if (!isset($_GET['marca'])){
                    if (!isset($_GET['categoria'])){
                        echo "
                               <div class='card mb-3'>
                                <h1 class='py-3 card-title'>Produtos</h1>
                                <div class='card-body'>
                     <p class='pb-2 text-muted'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam laudantium omnis perferendis. Aspernatur beatae delectus deserunt eveniet repellat, rerum sint sit! Aperiam architecto atque consectetur consequatur debitis delectus dolorum eaque excepturi exercitationem illo inventore iste itaque mollitia nam officiis placeat quaerat quam quas quibusdam recusandae rem sapiente, sint unde veniam!</p>
                                </div>
                                 </div>                            
                            ";
                    }
                }

                ?>
                <div class="row justify-content-center">
                    <?php
                    if (!isset($_GET['marca'])) {
                    if (!isset($_GET['categoria'])) {

                    $per_page = 9;

                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $comecar_de = ($page-1) * $per_page;

                    $get_products = "select  * from products order by 1 DESC LIMIT $comecar_de, $per_page";

                    $run = mysqli_query($con, $get_products);

                    while ($row = mysqli_fetch_array($run)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $img1 = $row['img1'];
                        $img2 = $row['img2'];
                        $price = $row['price'];
                        $url = $row['url'];
                        $newpreco = number_format($price,2,',','.');
                        echo "
                 <div class='col-md-6 col-lg-4 d-flex flex-row justify-content-center col-4'>
                   <div class=\"product-grid4\">
                    <div class=\"product-image4\">
                        <a href=\"$url\">
                            <img src=\"../admin_area/product_images/$img1\" class=\"img-fluid pic-1\">
                            <img src=\"../admin_area/product_images/$img2\" class=\"img-fluid pic-2\">
                        </a>
                        <ul class=\"social\">
                            <li><a href='$url' data-trip=\"Ver\"><i class=\"fa fa-eye\"></i></a></li>
                        </ul>
                        <span class=\"product-new-label\">Lançamento</span>
                    </div>
                    <div class=\"product-content\">
                        <h3 class=\"title\"><a href=\"../detalhes/?produto=$id\">$title</a></h3>
                        <div class=\"price\">
                            R$ $newpreco
                        </div>
                        <a href='../detalhes/?produto=$id' class=\"add-to-cart\">Detalhes</a>
                    </div>
                </div>
            </div>";
                    } ?>

                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php
                        $per_page = 9;
                        $query = "select * from products";
                        $rs = mysqli_query($con, $query);
                        $rows = mysqli_num_rows($rs);
                        $total_pages= ceil($rows / $per_page);

                        echo "
                       <li class=\"page-item\"><a class=\"page-link\" href=\"?page=1\">".'Primeira pagina'."</a></li>
                            ";

                        for ($i = 1; $i <=$total_pages; $i++){
                            echo "
                                    <li class=\"page-item\"><a class=\"page-link\" href=\"?page=".$i."\">".$i."</a></li>        
                                ";
                        };
                        echo "
                            <li class=\"page-item\"><a class=\"page-link\" href=\"?page=$total_pages\">".'Ultima pagina'."</a></li>                           
                            ";
                        }
                        }
                        ?>
                    </ul>
                </nav>
                <div class="col-lg-12">
                   <div class="row justify-content-center">
                       <?php marcas_consulta();
                       categoria_consulta(); ?>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include ('../includes/footer.php')?>
