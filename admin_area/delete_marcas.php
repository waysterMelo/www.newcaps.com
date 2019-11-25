<?php
include '../includes/db.php';
if(!isset($_SESSION['admin_email']) && (!isset($_SESSION['admin_pass']))){
    echo "<script>window.open('index.php', '_self')</script>";
}else {

    ?>

    <?php

    if(isset($_GET['delete_marcas'])){

        $delete_p_cat_id = $_GET['delete_marcas'];

        $delete_p_cat = "delete from product_marcas where p_cat_id='$delete_p_cat_id'";

        $run_delete = mysqli_query($con,$delete_p_cat);

        if($run_delete){

            echo "<script>alert('Marca Deletada')</script>";

            echo "<script>window.open('home.php?ver_marcas','_self')</script>";

        }

    }



    ?>



<?php } ?>