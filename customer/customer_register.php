<?php
session_start();
include ('../includes/db.php');
include('../functions/functions.php');

?>
<!doctype html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minha Conta</title>
    <link rel="stylesheet" href="../styles/bootstrap4.1.min.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="../styles/estilo5.css">
=======
    <link rel="stylesheet" href="../styles/estilo3.css">
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/responsive4.css">

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
                            echo  "<a href='login.php' >Logar</a>";
                        }else{
                            echo  "<a class='text-capitalize' href='../customer/minha_conta.php?meus_pedidos' >meus Pedidos</a>";
                        }
                        ?>
                    <li>

                    <li>
                        <a href="../carrinho/">
                            Vá para o carrinho
                        </a>
                    </li>

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo "<a href='login.php'> Login </a>";
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
        <ul class="navbar-nav mr-auto">
            <form class="form-inline mx-5 d-none d-sm-block">
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
                <a class='nav-link' href='../customer/minha_conta.php'>Minha Conta</a>
            <li>
            <li class="nav-item ml-2">
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
    <div class="container pb-5">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="../index.php">Página Inicial</a></li>
                <li>Cadastrar conta</li>
            </ul>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="card p-5" style="background: white;">
                <center><article class="card-body" style="max-width: 400px;">
                    <h1 class="text-center">Criar Sua Conta</h1>
                    <p class="text-center">Começe a comprar registrando sua conta</p>
                    <p>
                    </p>
                        <hr>
                    <form method="post" enctype="multipart/form-data" action="customer_register.php">
                        <div class="form-group input-group">
                            <div class="input-group-addon">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="nome" class="form-control" placeholder="Nome Completo" type="text">
                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-addon">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="email" class="form-control" placeholder="Endereço de Email" type="email">
                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-addon">
                                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                            </div>
                            <input name="tel" class="form-control" placeholder="Telefone" type="text">
                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-addon">
                                <span class="input-group-text"> <i class="fa fa-globe"></i> </span>
                            </div>
                            <input name="endereco" class="form-control" placeholder="Endereco e Numero" type="text">
                            <input name="cep" class="form-control ml-2" placeholder="Cep" type="text">

                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-addon">
                                <span class="input-group-text"> <i class="fa fa-map"></i> </span>
                            </div>
                            <input name="cidade" class="form-control" placeholder="Cidade" type="text">
                            <input name="estado" class="form-control ml-2" placeholder="Estado" type="text">

                        </div> <!-- form-group// -->


                        <div class="form-group input-group">
                            <div class="input-group-addon">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control" name="senha" placeholder="Criar senha" type="password">
                        </div> <!-- form-group// -->


                        <div class="form-group input-group">
                            <div class="input-group-addon">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control" name="senha_again" placeholder="Repita sua senha" type="password">
                        </div> <!-- form-group// -->

                        <div class="form-group">
                            <button type="submit" name="cadastrar" class="btn btn-primary btn-block"> Criar Conta</button>
                        </div> <!-- form-group// -->
                        <h4 class="text-center">Ja tem uma conta ? <a href="login.php">Entrar agora</a> </h4>
                    </form>
                </article>
            </div> <!-- panel.// -->

        </div>
    </div>
</div>

<?php include('../includes/footer.php') ?>

<script src="../js/bootstrap4.1.min.js"></script>
</body>
</html>
<?php

if (isset($_POST['cadastrar'])){
    $name = $_POST['nome'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $endereco = $_POST['endereco'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $senha = $_POST['senha'];
    $cep = $_POST['cep'];
    $ip = get_ip();

    $insert = "insert into clientes (nome, email,senha, tel,endereco,cidade,estado,ip,cep) values ('$name','$email','$senha','$tel','$endereco', '$cidade', '$estado','$ip','$cep')";
    $query = mysqli_query($con, $insert);

    $select_cart = "select * from cart where ip ='$ip'";

    $run_cart = mysqli_query($con,$select_cart);

    $rs_cart = mysqli_num_rows($run_cart);


    //se houver produtos no carrinho , vai pra minha conta login
    if ($rs_cart > 0 ){
        $_SESSION['email'] = $email;
        echo  "<script>alert('Cadastro Realizado com sucesso')</script>";
        echo  "<script>window.open('minha_conta.php?meus_pedidos', '_self')</script>";


        //senao  houver -> produtos p/ comprar
    }else {
        $_SESSION['email'] = $email;

        echo  "<script>alert('Cadastro Realizado')</script>";
        echo  "<script>window.open('../shopping/', '_self')</script>";
    }

}

?>