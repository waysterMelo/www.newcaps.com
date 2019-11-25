<?php
include '../includes/db.php';
if(!isset($_SESSION['admin_email']) && (!isset($_SESSION['admin_pass']))){
    echo "<script>window.open('index.php', '_self')</script>";
}else {

    ?>
    <?php

    if(isset($_GET['delete_p_cat'])){

        $delete_p_cat_id = $_GET['delete_p_cat'];

        $delete_p_cat = "delete from categoria where id='$delete_p_cat_id'";

        $run_delete = mysqli_query($con,$delete_p_cat);

        if($run_delete){

            echo "<script>alert('Genero Deletado')</script>";

            echo "<script>window.open('home.php?ver_categorias','_self')</script>";

        }

    }



    ?>



<?php } ?>