<?php
include '../includes/db.php';
if(!isset($_SESSION['admin_email']) && (!isset($_SESSION['admin_pass']))){
    echo "<script>window.open('index.php', '_self')</script>";
}else {

    ?>
    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li>

                    <i class="fa fa-dashboard"></i> Dashboard / Cadastrar Marcas

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->

    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading" ><!-- panel-heading Starts -->

                    <h3 class="panel-title" ><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw" ></i> Cadastrar Marcas

                    </h3><!-- panel-title Ends -->


                </div><!-- panel-heading Ends -->


                <div class="panel-body" ><!-- panel-body Starts -->

                    <form class="form-horizontal" action="" method="post" ><!-- form-horizontal Starts -->

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-3 control-label" >Marca</label>

                            <div class="col-md-6" >

                                <input type="text" name="title" class="form-control" >

                            </div>

                        </div><!-- form-group Ends -->


                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-3 control-label" ></label>

                            <div class="col-md-6" >

                                <input type="submit" name="submit" value="cadastrar" class="btn btn-primary form-control" >

                            </div>

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->


            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->

    <?php

    if(isset($_POST['submit'])){

        $p_cat_title = $_POST['title'];

        $insert_p_cat = "insert into product_marcas (p_cat_title) values ('$p_cat_title')";

        $run_p_cat = mysqli_query($con, $insert_p_cat);

        if($run_p_cat){

            echo "<script>alert('MARCA CADASTRADA')</script>";

            echo "<script>window.open('index.php?ver_marca','_self')</script>";

        }



    }



    ?>


<?php } ?>