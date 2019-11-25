<div class="card" id="sidebar">
    <div class="card-heading">
        <?php
           $sessao_user =  $_SESSION['email'];
           $get_client = "select * from clientes where email='$sessao_user'";
           $query = mysqli_query($con, $get_client);
           $rs = mysqli_fetch_array($query);
           $id = $rs['id'];
           $nome = $rs['nome'];

               if (!isset($_SESSION['email'])) {
                   echo "<script>window.open('./minha_conta?login', '_self')</script>";
               } else {
                   echo "             
               <div class=\" py-5\">
<<<<<<< HEAD
                <img src=\"../images/logo.png\" alt=\"foto do usuario\" class=\"img-fluid img-thumbnail border-0\">
=======
                <img src=\"../admin_area/admin_images/logo.svg\" alt=\"foto do usuario\" class=\"img-fluid img-thumbnail border-0\">
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
            </div>
        <br>
        <div class=\"card-heading\">
            <h5 align=\"center\" class=\"card-title font-weight-bold text-capitalize\">$nome</h5>
        </div>
              ";}?>

    </div>
    <div class="card-body">
        <ul class="nav flex-column nav-pills">

            <li class="py-2 <?php if(isset($_GET['meus_pedidos'])){ echo "activeSidebar my-2"; } ?>">
                <a href="minha_conta.php?meus_pedidos"><i class="fa fa-list mx-2"></i>Meus Pedidos</a>
            </li>

            <li class=" py-2 <?php if(isset($_GET['edit_account'])){ echo "activeSidebar my-2"; } ?>">
                <a href="minha_conta.php?edit_account"><i class="fa fa-pencil mx-2"></i>Editar Conta</a>
            </li>

            <li class="py-2 <?php if(isset($_GET['change_pass'])){ echo "activeSidebar my-2"; } ?>">
                <a href="minha_conta.php?change_pass"><i class="fa fa-user-secret mx-2"></i>Editar Senha</a>
            </li>

            <li class="py-2 <?php if(isset($_GET['delete_acc'])){ echo "activeSidebar my-2"; } ?>">
                <a href="minha_conta.php?delete_acc=<?php echo md5($id); ?>"><i class="fa fa-trash mx-2"></i>Deletar Conta</a>
            </li>

            <li class="py-2 <?php if(isset($_GET['logout_acc'])){ echo "activeSidebar my-2"; } ?>">
                <a href="minha_conta.php?logout_acc"><i class="fa fa-sign-out mx-2"></i>Logout</a>
            </li>
        </ul>
    </div>
</div>