<?php
include '../functions/functions.php';
include '../includes/db.php';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Esqueci minha senha | New Caps</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minha conta</title>
    <link rel="stylesheet" href="../styles/bootstrap4.1.min.css">
    <link rel="stylesheet" href="../styles/estilo.css">
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

</head>

<body>

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
<nav class="navbar navbar-expand-lg navbar-light">
    <img src="../admin_area/admin_images/logo.svg" alt="Logo new caps" class="img-fluid">
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

<div id="content" ><!-- content Starts -->
    <div class="container" ><!-- container Starts -->

        <div class="col-md-12" ><!--- col-md-12 Starts -->

            <ul class="breadcrumb" ><!-- breadcrumb Starts -->

                <li>
                    <a href="index.php">Página Inicial</a>
                </li>

                <li>Recuperar Senha</li>

            </ul><!-- breadcrumb Ends -->



        </div><!--- col-md-12 Ends -->


        <div class="col-md-12 col-lg-12 pb-5"><!-- col-md-12 Starts -->

            <div class="card p-5"><!-- box Starts -->

                <div class="card-header"><!-- box-header Starts -->

                    <center>

                        <h3> Digite seu email abaixo, Nós enviaremos sua senha !</h3>

                    </center>

                </div><!-- box-header Ends -->

                <div align="center"><!-- center div Starts -->

                    <form action="" method="post"><!-- form Starts -->

                        <input type="text" class="form-control" name="c_email" placeholder="Digite seu email">

                        <br>

                        <input type="submit" name="forgot_pass" class="btn btn-primary" value="enviar senha">

                    </form><!-- form Ends -->

                </div><!-- center div Ends -->

            </div><!-- box Ends -->
        </div><!-- col-md-12 Ends -->
    </div><!-- container Ends -->
</div><!-- content Ends -->

<?php include '../includes/footer.php';?>

<script src="../js/bootstrap4.1.min.js"></script>
</body>
</html>

<?php

if(isset($_POST['forgot_pass'])){

    $c_email = $_POST['c_email'];

    $sel_c = "select * from clientes where email='$c_email'";

    $run_c = mysqli_query($con,$sel_c);

    $count_c = mysqli_num_rows($run_c);

    $row_c = mysqli_fetch_array($run_c);

    $c_name = $row_c['nome'];

    $c_pass = $row_c['senha'];

    if($count_c == 0){

        echo "<script> alert('Não encontramos nenhum email em nossos sistemas') </script>";

        exit();

    }
    else{

        $message = "

<h1 align='center'>Senha foi enviada</h1>

<h2 align='center'>Caro, $c_name </h2>

<h3 align='center'>

Sua Senha é : <span> <b>$c_pass</b> </span>

</h3>

<h3 align='center'>

<a href='newcapsoficial.com.br/custumer/index.php'>
 
Clique aqui para logar !
 
</a>

</h3>

";

        $from = "waystermelo@gmail.com";

        $subject = "Sua Senha";

        $headers = "From: $from\r\n";

        $headers .= "Content-type: text/html\r\n";

        mail($c_email,$subject,$message,$headers);

        echo "<script> alert('Senha Enviada com sucesso') </script>";

        echo "<script>window.open(index.php,'_self')</script>";

    }

}

?>