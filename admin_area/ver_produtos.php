<?php
include '../includes/db.php';
if(!isset($_SESSION['admin_email']) && (!isset($_SESSION['admin_pass']))){
    echo "<script>window.open('index.php', '_self')</script>";
}else {
    ?>
    <div class="row"><!--  1 row Starts -->

        <div class="col-lg-12" ><!-- col-lg-12 Starts -->

            <ol class="breadcrumb" ><!-- breadcrumb Starts -->

                <li class="active" >

                    <i class="fa fa-dashboard"></i> Dashboard / Ver Produtos

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!--  1 row Ends -->

    <div class="row" ><!-- 2 row Starts -->

        <div class="col-lg-12" ><!-- col-lg-12 Starts -->

            <div class="panel panel-default" ><!-- panel panel-default Starts -->

                <div class="panel-heading" ><!-- panel-heading Starts -->

                    <h3 class="panel-title" ><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw" ></i> Ver Produtos

                    </h3><!-- panel-title Ends -->


                </div><!-- panel-heading Ends -->

                <div class="panel-body" ><!-- panel-body Starts -->

                    <div class="table-responsive" ><!-- table-responsive Starts -->

                        <table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

                            <thead>

                            <tr>
                                <th>Produto ID</th>
                                <th>Produto Nome</th>
                                <th>Produto Imagem</th>
                                <th>Produto Preço</th>
                                <th>Produto Keywords</th>
                                <th>Data do Cadastro</th>
                                <th>Deletar Produto</th>
                                <th>Editar Produto</th>



                            </tr>

                            </thead>

                            <tbody>

                            <?php

                            $i = 0;

                            $get_pro = "select * from products";

                            $run_pro = mysqli_query($con,$get_pro);

                            while($row_pro=mysqli_fetch_array($run_pro)){

                                $pro_id = $row_pro['id'];

                                $pro_title = $row_pro['title'];

                                $pro_image = $row_pro['img1'];

                                $pro_price = $row_pro['price'];

                                $pro_keywords = $row_pro['keywords'];

                                $pro_date = $row_pro['date'];

                                $i++;

                                ?>

                                <tr class="text-center">

                                    <td><?php echo $i; ?></td>

                                    <td><?php echo $pro_title; ?></td>

                                    <td><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"></td>

                                    <td>$ <?php echo $pro_price;?></td>

                                    <td> <?php echo $pro_keywords; ?> </td>

                                    <td><?php echo date("d/m/Y", strtotime($pro_date)); ?></td>

                                    <td>

<<<<<<< HEAD
                                        <a class="btn btn-danger py-3" href="home.php?delete_product=<?php echo $pro_id; ?>">
=======
                                        <a class="btn btn-danger py-3" href="index.php?delete_product=<?php echo $pro_id; ?>">
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9

                                            <i class="fa fa-trash-o"> </i> Deletar

                                        </a>

                                    </td>

                                    <td>

<<<<<<< HEAD
                                        <a class="btn btn-primary py-3" href="home.php?edit_product=<?php echo $pro_id; ?>">
=======
                                        <a class="btn btn-primary py-3" href="index.php?edit_product=<?php echo $pro_id; ?>">
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9

                                            <i class="fa fa-pencil"> </i> Editar

                                        </a>

                                    </td>

                                </tr>

                            <?php } ?>


                            </tbody>


                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->


<?php } ?>
