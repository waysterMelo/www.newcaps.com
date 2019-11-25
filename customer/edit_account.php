<?php
include '../includes/db.php';
$email_sessao = $_SESSION['email'];
$sql  = "select * from clientes where email='$email_sessao'";
$query = mysqli_query($con, $sql);
$rs = mysqli_fetch_array($query);
$id = $rs['id'];
$nome = $rs['nome'];
$email = $rs['email'];
$senha= $rs['senha'];
$tel = $rs['tel'];
$endereco = $rs['endereco'];
$cidade = $rs['cidade'];
$estado = $rs['estado'];
$cep = $rs['cep'];
?>
<div class="card p-5 bg-light">
    <div class="card-heading">
        <h3>Editar Conta</h3>
        <hr>
    </div>
    <div class="card-body bg-dark p-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group input-group">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-user"></i> </span>
                    </div>
                    <input name="nome" value="<?php echo $nome;?>" class="form-control" placeholder="Nome Completo" type="text">
                </div> <!-- form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-append">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" value="<?php echo $email;?>" class="form-control" placeholder="Endereço de Email" type="email">
                </div> <!-- form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-append">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <input name="tel" value="<?php echo $tel;?>" class="form-control" placeholder="Telefone" type="text">
                </div> <!-- form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-append">
                        <span class="input-group-text"> <i class="fa fa-globe"></i> </span>
                    </div>
                    <input name="endereco" value="<?php echo $endereco;?>" class="form-control" placeholder="Endereco e Numero" type="text">
                    <input name="cep" value="<?php echo $cep;?>" class="form-control ml-2" placeholder="Cep">
                </div> <!-- form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-append">
                        <span class="input-group-text"> <i class="fa fa-map"></i> </span>
                    </div>
                    <input name="cidade" value="<?php echo $cidade;?>" class="form-control" placeholder="Cidade" type="text">
                    <input name="estado" value="<?php echo $estado;?>" class="form-control ml-2" placeholder="Estado" type="text">

                </div> <!-- form-group// -->

                <div class="form-group d-flex">
                    <button type="submit" name="atualizar" class="mx-auto btn btn-danger btn-md">Salvar</button>
                </div>
            </form>
        <?php
        if (isset($_POST['atualizar'])){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $endereco = $_POST['endereco'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $cep = $_POST['cep'];
            $updated = "update clientes set nome='$nome',email='$email',senha='$senha', tel='$tel', endereco='$endereco', cidade='$cidade', estado='$estado',cep='$cep' where id ='$id'";
            $runU = mysqli_query($con,$updated);

            if ($runU){
                echo "<script>alert('Cadastro alterado')</script>";
                echo "<script>window.open('minha_conta.php?edit_account', '_self')</script>";
            }else{
                echo "<script>alert('Nao foi possivel alterar seus dados, tente novamente')</script>";
                echo "<script>window.open('minha_conta.php?edit_account', '_self')</script>";

            }


        }
        ?>
    </div>
</div>

