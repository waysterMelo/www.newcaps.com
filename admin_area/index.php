<?php
session_start();
include("../includes/db.php");
?>
    <!DOCTYPE HTML>
    <html lang="pt">
    <head>
<<<<<<< HEAD
        <title>Admin Login | New Caps Oficial</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/login2.css">
        <link rel="stylesheet" href="../styles/jquery-confirm.min.css">
=======
        <title>Dashboard | New Caps Oficial</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" >
        <script src="../js/jquery.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="../styles/jquery-confirm.min.css">

>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
    </head>
    <body>
<<<<<<< HEAD
    <div class="container" ><!-- container Starts -->
        <form class="form-login" enctype="application/x-www-form-urlencoded" action="" method="post" ><!-- form-login Starts -->
=======
    <div id="wrapper" class="col-lg-12">
       <div class="col-lg-3">
           <?php include("includes/sidebar.php"); ?>
       </div>

        <div id="page-wrapper">

            <div class="container-fluid">

                <?php
                if(isset($_GET['dashboard'])){
                    include("dashboard.php");}

                if (isset($_GET['inserir_produtos'])){
                   include 'insert_product.php';}

                if (isset($_GET['ver_produtos'])){
                    include "ver_produtos.php";}

                if (isset($_GET['delete_product'])){
                    include "deletar_produto.php";}

                if (isset($_GET['edit_product'])){
                    include "editar_produtos.php";}

                if (isset($_GET['inserir_categorias'])){
                    include "generos.php";}

                if (isset($_GET['ver_categorias'])){
                    include 'ver_generos.php';}

                if (isset($_GET['delete_p_cat'])){
                    include 'delete_p_cat.php';
                }
                if (isset($_GET['edit_p_cat'])){
                    include 'edit_p_cat.php';}
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9

            <h2 class="form-login-heading" >Login</h2>

            <input type="text" class="form-control" name="admin_email" placeholder="Email" required >

            <input type="password" class="form-control" name="admin_pass" placeholder="Senha" required >

            <button class="btn btn-lg btn-danger btn-block" type="submit" name="admin_login" >Entrar</button>


        </form>
    </div>
<<<<<<< HEAD
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap4.1.min.js"></script>
    <script src="../js/jquery-confirm.min.js"></script>
=======
    <script src="../js/jquery-confirm.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
    <script>
        let fatura = document.getElementById('fatura_detalhes').innerHTML;
       if (fatura == ''){
           $('#detalhes_tabela').html('');
           $('#result_tabela').html('');
           $('#produto').html('');
       }
    </script>
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
    </body>
    </html>
<?php

if(isset($_POST['admin_login'])){

    $admin_email = $_POST['admin_email'];

    $admin_pass = $_POST['admin_pass'];

    $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";

    $run_admin = mysqli_query($con,$get_admin);

    $rs = mysqli_fetch_array($run_admin);

    if($rs){
        $_SESSION['admin_email']= $admin_email;
        $_SESSION['admin_pass']= $admin_pass;
        echo "<script>
   $.confirm({
                         title: 'Olá Administrador',
                           content: 'seu login foi efetuado com sucesso !',
                            theme: 'dark',
                            buttons: {
                             Entrar: function() {
                              window.open('home.php?dashboard','_self');
                            },
                            Sair: function() {
                              window.open('index.php','_self'); 
                            }                                             
       }
                         
                                 });</script>";
    }
    else {
        echo "<script>$.confirm({
                                                     title: 'Caro Administrador !',
                                                     content: 'sua senha ou email estão errados!',
                                                     theme: 'dark',
                                                     buttons: {
                                                         Login :function () {
                                                         window.open('index.php', '_self');
                                                         } 
                                                        
                                                     }
                                                    });</script>";

    }

}

?>