<?php
if(!isset($_SESSION['admin_email']) && (!isset($_SESSION['admin_pass']))){
    echo "<script>window.open('index.php', '_self')</script>";
}else {

if(isset($_GET['customer_delete'])){

$delete_id = $_GET['customer_delete'];

$delete_customer = "delete from clientes where id='$delete_id'";

$run_delete = mysqli_query($con,$delete_customer);


if($run_delete){

echo "<script>alert('Cliente Deletado !')</script>";

echo "<script>window.open('home.php?ver_clientes','_self')</script>";


}

}


?>

<?php } ?>
