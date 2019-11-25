<?php
include '../includes/db.php';
if(!isset($_SESSION['admin_email']) && (!isset($_SESSION['admin_pass']))){
    echo "<script>window.open('index.php', '_self')</script>";
}else {

    ?>

    <?php

    if(isset($_GET['delete_slide'])){


        $delete_id = $_GET['delete_slide'];

        $delete_slide = "delete from slider where slider_id='$delete_id'";


        $run_delete = mysqli_query($con,$delete_slide);

        if($run_delete){

            echo "<script>alert('Slider Deletado')</script>";

            echo "<script>window.open('hone.php?ver_slides','_self')</script>";

        }


    }




    ?>



<?php } ?>
