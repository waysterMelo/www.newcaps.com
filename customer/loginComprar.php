<?php
session_start();
       $frete = $_GET['frete_valor'];
    include('../includes/db.php');
    include('../functions/functions.php');
    ?>
    <!doctype html>
    <html lang="br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login | New Caps</title>
        <link rel="stylesheet" href="../styles/bootstrap4.1.min.css">
        <link rel="stylesheet" href="../styles/jquery-confirm.min.css">
<<<<<<< HEAD
        <link rel="stylesheet" href="../styles/estilo5.css">
=======
        <link rel="stylesheet" href="../styles/estilo3.css">
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/jquery-confirm.min.js"></script>
        <style>
            .activeSidebar a{
                background-color: red;
                color: #000;
                padding: 10px;
                border-radius: 10%;
            }

            #sidebar a:hover{
                background-color: gray;
                color: #000;
                padding: 10px;
                border-radius: 10%;
            }
        </style>
    </head>
    <body style="background-color: whitesmoke;">
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
                                echo  "<a href='../carrinho'>Carrinho</a>";
                            }else{
                                echo  "<a class='text-capitalize' href='minha_conta.php?meus_pedidos' >minha conta</a>";
                            }
                            ?>
                        </li>

                        <li>
                            <?php
                            if (!isset($_SESSION['email'])){
                                echo "<a href='login.php'> Login </a>";
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

    <div id="content" class="pb-5 mb-5">
        <div class="container">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.php">Pagina Inicial</a>
                    </li>
                    <li>
                        Login
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="container" align="center" id="login">
                        <div class="d-flex justify-content-center">
                            <div class="card p-5 mt-5" style="width: 28rem">
                                <div class="justify-content-center">
                                    <div class="brand_logo_container">
                                        <img src="../images/logo.png" class=" img-fluid pb-5" alt="Logo">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center form_container">
                                    <form class="form-group-lg" method="post" enctype="multipart/form-data" action="">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input type="email" name="email" class="form-control" value="" placeholder="Email">
                                        </div>
                                        <div class="input-group" style="margin-top: 10px;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                            </div>
                                            <input type="password" name="senha" class="form-control" value="" placeholder="senha">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                <label class="custom-control-label" for="customControlInline">lembrar minha senha</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3 login_container">
                                            <button type="submit" name="logar" class="btn btn-danger btn-lg">Entrar</button>
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['logar'])){
                                        $email = $_POST['email'];
                                        $senha = $_POST['senha'];

                                        $sql = "select * from clientes where email='$email' and senha='$senha'";
                                        $querySql = mysqli_query($con, $sql);
                                        $row_client = mysqli_fetch_array($querySql);
                                        $cliente = $row_client['id'];

                                        if ($row_client){
                                            $_SESSION['email'] = $email;
                                            $_SESSION['senha'] = $senha;
                                            echo "<script> $.alert({
                                                     title: 'Caro Cliente',
                                                     content: 'login efetuado com sucesso!',
                                                     theme: 'dark',                        
<<<<<<< HEAD
                                                    });                                                                              
                                                window.open('../pedido.php?frete_valor=$frete&cliente_id=$cliente','_self');
                                                
                                              </script>";
=======
                                                    }); 
window.open('../pedido.php?frete=$frete','_self');
</script>";

>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
                                        }else{
                                            echo "<script>
                                                  $.alert({
                                                     title: 'Caro Cliente',
                                                     content: 'senha ou email estão errados !',
                                                     theme: 'dark',                        
                                                    });                                   
                                                </script>";
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="mt-4">
                                    <div class="d-flex justify-content-center links">
                                        Ainda nao tem conta ? <a href="customer_register.php" class="ml-2">Criar Agora</a>
                                    </div>
                                    <div class="d-flex justify-content-center links">
                                        <a href="esqueci_senha.php"> esqueceu sua senha ?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <?php include "../includes/footer.php";