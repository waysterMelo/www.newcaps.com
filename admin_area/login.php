<?php

session_start();

include("../includes/db.php");

?>
    <!DOCTYPE HTML>
    <html lang="pt">
    <head>
        <title>Admin Login | New Caps Oficial</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/login2.css">
        <link rel="stylesheet" href="../styles/jquery-confirm.min.css">
    </head>
    <body>
    <div class="container" ><!-- container Starts -->
        <form class="form-login" action="" method="post" ><!-- form-login Starts -->

            <h2 class="form-login-heading" >Login</h2>

            <input type="text" class="form-control" name="admin_email" placeholder="Email" required >

            <input type="password" class="form-control" name="admin_pass" placeholder="Senha" required >

            <button class="btn btn-lg btn-danger btn-block" type="submit" name="admin_login" >

             Entrar

            </button>


        </form>
    </div>
    <script src="../js/jquery.min.js"></script>

    <script src="../js/bootstrap4.1.min.js"></script>
    <script src="../js/jquery-confirm.min.js"></script>
    </body>
    </html>
<?php

if(isset($_POST['admin_login'])){

    $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);

    $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);

    $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";

    $run_admin = mysqli_query($con,$get_admin);

    $count = mysqli_num_rows($run_admin);

    if($count==1){
        $_SESSION['admin_email']=$admin_email;
        echo "<script>
                        $.confirm({
                         title: 'Olá Administrador',
                           content: 'seu login foi efetuado com sucesso !',
                            theme: 'dark',
                            buttons: {
                             Entrar: function() {
                              window.open('index.php?dashboard','_self');
                            },
                            Sair: function() {
                              window.open('login.php','_self'); 
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
                                                         window.open('login.php', '_self');
                                                         } 
                                                        
                                                     }
                                                    });</script>";

    }

}

?>