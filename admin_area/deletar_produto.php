<?php
include '../includes/db.php';
if(!isset($_SESSION['admin_email']) && (!isset($_SESSION['admin_pass']))){
    echo "<script>window.open('index.php', '_self')</script>";
}else {

?>

    if(isset($_GET['delete_product'])){

        $delete_id = $_GET['delete_product'];

        $delete_pro = "delete from products where id='$delete_id'";

        $run_delete = mysqli_query($con,$delete_pro);

        if($run_delete){

            echo "<script>alert('PRODUTO DELETADO')</script>";

            echo "<script>window.open('home.php?ver_produtos','_self')</script>";

        }

    }

    ?>

<?php } ?>
