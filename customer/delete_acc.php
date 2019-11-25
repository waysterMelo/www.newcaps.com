<?php
$c_email = $_SESSION['email'];
?>

<div class="jumbotron">
        <h1>Quer realmente exluir a conta ?</h1>
    <form action="" method="post">
        <a type="submit" name="sim" class="btn btn-dark btn-md float-right">
            <i class="fa fa-frown-o"> Sim , quero !</i>
        </a>
        <a href="../shopping/" class="btn btn-danger btn-md float-right">Não , quero comprar mais ! <i class="fa fa-heart"></i></a>
    </form>
</div>

<?php
if (isset($_POST['sim'])) {
    $sql = "select * from clientes where email='$c_email'";
    $query = mysqli_query($con, $sql);
    $rs = mysqli_fetch_array($query);
    $id = $rs['id'];

   $delete = "delete from pedidos where cliente_id='$id'";
   $query_delete = mysqli_query($con,$delete);

   $delete_cli = "delete from clientes where id ='$id'";
   $query_delete_cli = mysqli_query($con, $delete_cli);

   if ($query_delete_cli){
       session_destroy();
       echo "<script>alert('Conta deletada com sucesso')</script>";
       echo "<script>window.open('../index.php', '_self')</script>";
   }
}
?>








