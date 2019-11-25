<?php
include '../includes/db.php';
if(!isset($_SESSION['admin_email']) && (!isset($_SESSION['admin_pass']))){
    echo "<script>window.open('index.php', '_self')</script>";
}else {

    ?>
<?php
if(isset($_GET['order_delete'])){

$delete_id = $_GET['order_delete'];

$delete_order = "delete from pedidos where id='$delete_id'";

$run_delete = mysqli_query($con,$delete_order);

if($run_delete){

echo "<script>alert('Pedido Deletado')</script>";

echo "<script>window.open('home.php?ver_pedidos','_self')</script>";

}}?>
<?php }  ?>
