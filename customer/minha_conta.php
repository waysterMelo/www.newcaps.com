<?php
session_start();
if (!isset($_SESSION['email'])){
        echo "<script>window.open(index.php,'_self')</script>";
    }else{

?>
<?php
include('../includes/db.php');
include('../functions/functions.php');
?>
<!doctype html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minha conta</title>
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
                            echo  "<a href='minha_conta.php'>Produtos</a>";
                        }else{
                            echo  "<a class='text-capitalize' href='minha_conta.php?meus_pedidos' >meus Pedidos</a>";
                        }
                        ?>
                    <li>

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo  "<a href='minha_conta.php?login'>Carrinho</a>";
                        }else{
                            echo  "<a class='text-capitalize' href='minha_conta.php?meus_pedidos' >minha conta</a>";
                        }
                        ?>
                    </li>

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo "<a href='minha_conta.php?login'> Login </a>";
                        }else {
                            echo "<a href='logout.php'> Sair </a>";
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
                <a class="nav-link" href="../index.php">Pagina Inicial</a>
            </li>
            <li class="nav-item ml-2">
                <a class="nav-link" href="../shopping">Produtos</a>
            </li>
            <li class="nav-item">
                <a class='nav-link' href='../customer/minha_conta.php?meus_pedidos'>Minha Conta</a>
            <li>
            <li class="nav-item">
                <a class="nav-link" href="../contato">Contato</a>
            </li>
            <li class="nav-item">
                <a style="background-color: black;" class="btn btn-md nav-link text-white" href="../carrinho/"><!-- btn btn-primary navbar-btn right Starts -->

                    <i class="fa fa-shopping-cart"></i>

                    <span><?php itens(); ?> item(s) no carrinho </span>

                </a><!-- btn btn-primary navbar-btn right Ends -->

            </li>
        </ul>
    </div>
</nav>

<div id="content">
    <div class="container">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../index.php">Pagina Inicial</a>
                </li>
                <li>
                    Minha conta
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-3 mb-5">
                <?php include ('includes/sidebar.php'); ?>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <?php
                    if(isset($_GET['login'])){
                        include 'login.php';}

                        if (isset($_GET['meus_pedidos'])){
                        include("my_order.php");}

                    if (isset($_GET['edit_account'])){
                        include("edit_account.php");}

                    if (isset($_GET['change_pass'])){
                        include('change_pass.php');}

                    if (isset($_GET['delete_acc'])){
                        include('delete_acc.php');}

                    if (isset($_GET['logout_acc'])){
                        include "logout.php";}
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('../includes/footer.php');?>
<script src="../js/bootstrap4.1.min.js"></script>
<script type="text/javascript">
    $(window).on('load',function () {
        $('#status').fadeOut();
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({ 'overflow' : 'visible'})
    });
</script>
</body>
</html>
<?php } ?>