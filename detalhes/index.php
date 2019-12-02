<?php
session_start();
include('../includes/db.php');
include('../functions/functions.php');
?>
<?php
global $con;
if (isset($_GET['produto'])) {
    $produto_id = $_GET['produto'];
    $sql = "select * from products where url ='$produto_id'";
    $query = mysqli_query($con, $sql);
    $rowProduto = mysqli_fetch_array($query);
    $title = $rowProduto['title'];
    $img1 = $rowProduto['img1'];
    $img2 = $rowProduto['img2'];
    $img3 = $rowProduto['img3'];
    $price = $rowProduto['price'];
    $qtd = $rowProduto['qtd'];
    $descricao = $rowProduto['pro_desc'];

    $get_p_categoria = "select * from product_marcas where p_cat_id='$produto_id'";
    $cat_rs = mysqli_query($con, $get_p_categoria);
    $row_cate = mysqli_fetch_array($cat_rs);
    $id_cat = $row_cate['p_cat_id'];
    $cat_title = $row_cate['p_cat_title'];
}
?>
<!doctype html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalhes | New Caps Oficial</title>
    <link rel="stylesheet" href="../styles/bootstrap4.1.min.css">
    <link rel="stylesheet" href="../styles/estilo7.css">
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/responsive-style2.css">
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
                            echo  "<a href='../carrinho'>Carrinho</a>";
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
    <img src="../images/logo.png" alt="Logo new caps" class="img-fluid">
    <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <form class="form-inline mx-5 d-none d-lg-block">
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
                    echo  "<a class='text-capitalize nav-link' href='../customer/login.php' >Minha conta</a>";
                }else{
                    echo  "<a class='text-capitalize nav-link' href='../customer/minha_conta.php?meus_pedidos' >Pedidos</a>";
                }
                ?>
            <li>
            <li class="nav-item">
                <a class="nav-link" href="../contato">Contato</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-dark btn-md nav-link text-white" href="../carrinho/"><!-- btn btn-primary navbar-btn right Starts -->

                    <i class="fa fa-shopping-cart"></i>

                    <span><?php itens(); ?> item(s) no carrinho </span>

                </a><!-- btn btn-primary navbar-btn right Ends -->

            </li>
        </ul>
    </div>
</nav>
<div id="content">
    <div class="container">
        <div class="col-md-12">
               <ul class="breadcrumb">
                   <li>Home</li>
                   <li>Produtos</li>
                   <li>
                       <a href="../shopping/?marca=<?php echo $id_cat;?>"> <?php echo $cat_title; ?></a>
                   </li>
                   <li><?php echo $title; ?></li>
               </ul>
        </div>
    </div>
</div>

<div class="container-fluid" id="content">
    <div class="row">
        <div class="col-md-3 col-lg-3 d-none d-sm-block">
            <section id="ladodireito" class="py-4">
                <div class="card sidebar-menu">
                    <div class="card-heading" style="background-image: linear-gradient(to bottom, #ff0000, #ff0706, #ff0d0d, #ff1312, #ff1717);">
                        <h4 class="card-title font-weight-bold ml-3 pt-2">
                            Marcas
                        </h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav flex-column">
                            <?php
                            global $db;
                            $sql = "select * from product_marcas";
                            $query  = mysqli_query($db,$sql);
                            while($row = mysqli_fetch_array($query)){
                                $marcas_id =$row['p_cat_id'];
                                $nome = $row['p_cat_title'];
                                echo "
             <li class='nav-item'>                 
             <a class='nav-link' href=\"../shopping/?marca=$marcas_id\">
             $nome
             </a>
             </li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </section>
            <section id="ladodireito2">
                <div class="card sidebar-menu">
                    <div class="card-heading" style="background-image: linear-gradient(to bottom, #ff0000, #ff0706, #ff0d0d, #ff1312, #ff1717);">
                        <h4 class="card-title font-weight-bold ml-3 pt-2">
                            Categorias
                        </h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav flex-xl-column">
                            <?php
                            global $db;
                            $sql = "select * from categoria";
                            $query  = mysqli_query($db,$sql);
                            while($row = mysqli_fetch_array($query)){
                                $id = $row['id'];
                                $nome = $row['categoria'];

                                echo "
             <li class='nav-item'>
             <a class='nav-link' href=\"../shopping/?categoria=$id\">
             $nome
             </a>
             </li>  ";} ?>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-9 col-lg-9 col-12 d-block">
            <div class="row">
                <div class="col-sm-6 col-lg-6 col-6" id="productMain">
                    <div id="mainImage">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner carousel-fade">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 img-fluid" src="../admin_area/product_images/<?php echo $img1; ?>" alt="Primeiro Slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-thumbnail" src="../admin_area/product_images/<?php echo $img2; ?>" alt="Segundo Slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-thumbnail" src="../admin_area/product_images/<?php echo $img3; ?>" alt="Terceiro Slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Próximo</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-6">
                    <?php addCart(); ?>
                    <form class="form-horizontal" action="?add_cart=<?php echo $produto_id;?>" method="post" enctype="multipart/form-data">
                        <div class="card border-dark rounded-5 my-2">
                            <div class="card-header p-0">
                                <div style="background-color: black" class="text-white text-center py-2">
                                    <h3 class="text-capitalize"><?php echo $title?></h3>
                                    <p class="m-0"><?php echo $cat_title ?></p>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <!--Body-->
                                <div class="form-group row justify-content-center">
                                    <label for="" class="mx-2 col-form-label">Quantidade</label>
                                    <select name="qtd">
                                        <?php
                                        for ($i = 1; $i <= $qtd; $i++){
                                            echo "
                                                     <option>$i</option>
                                               ";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <select name="p_size" class="py-2">
                                        <option>Tamanho único</option>
                                    </select>
                                </div>

                                <div class="col-md-12 input-group row justify-content-center">
                                    <h1 class="input-group-append">
                                        <i class="fa fa-money  border-0">
                                            <?php echo number_format($price, 2, ',', '.')?>
                                        </i>
                                    </h1>
                                </div>


                                <div class="text-center">
                                    <input type="submit" value="Adicionar ao carrinho" class="btn btn-danger py-2">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-lg-12 col-12" id="moreImages">
                        <div class="row my-3" id="thumbs">
                            <div class="col-xs-4 col-md-4 col-4" id="maisFotos">
                                <img src="../admin_area/product_images/<?php echo $img1?>" class="img-fluid">
                            </div>
                            <div class="col-xs-4 col-md-4 col-4" id="maisFotos">
                                <img src="../admin_area/product_images/<?php echo $img2?>"
                                     class="img-fluid">
                            </div>
                            <div class="col-xs-4 col-md-4 col-4" id="maisFotos">
                                <img src="../admin_area/product_images/<?php echo $img3?>"
                                     class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            <div class="row">

            </div>
            <div class="row pb-2 col-12">
                <div class="card" id="details" style="width: 100%">
                    <h1 class="card-title">Detalhes do Produto</h1>
                    <p class="text-muted">
                        <?= utf8_encode($descricao); ?>
                    </p>
                    <div class="card-body">
                        <h4>Tamanho</h4>
                        <ul>
                            <li class="text-muted">Único</li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
        <div class="row pb-5">
                <div class="col-lg-3">
                    <div class="card headline"style="border: 2px solid black;">
                        <h3 class="text-center">Voçê Tambêm vai Gostar</h3>
                    </div>
                </div>
        </div>
<div class="container pb-5" id="youMayLike">
    <div class="row justify-content-center">
        <?php
            $sql = "select * from products order by RAND() LIMIT 0,4";
            $query = mysqli_query($con, $sql);
            while($row = mysqli_fetch_array($query)){
                $like_id = $row['id'];
                $like_title = $row['title'];
                $like_price = $row['price'];
                $price = number_format($like_price,2,',','.');
                $like_img = $row['img1'];
                $url = $row['url'];
                echo "
                <div class=\"col-lg-3 like_product col-md-4 col-6 pb-4\">
                             <div class=\"card \">
                   <div class='card-title'>
                    <h5 class=\"text-center mt-3\">$like_title</h5>
                    </div>
                    <img style='width: 150px;' src='../admin_area/product_images/$like_img'
                        class=\"card-img-top img-fluid mx-auto\" alt=\"bone\">
                    <p class=\"text-center\">R$ $price</p>
                    <a href=\"$url\" class=\"btn btn-danger col-12 mx-auto py-3 mb-2\"><i class='fa fa-plus'></i> Detalhes</a>
                </div> 
                </div>";
            }
            ?>
        </div>
    </div>

<?php include('../includes/footer.php'); ?>
