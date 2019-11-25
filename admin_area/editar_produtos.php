<?php
include '../includes/db.php';
if(!isset($_SESSION['admin_email']) && (!isset($_SESSION['admin_pass']))){
    echo "<script>window.open('index.php', '_self')</script>";
}else {

    ?>
    <?php

    if(isset($_GET['edit_product'])){

        $edit_id = $_GET['edit_product'];

        $get_p = "select * from products where id='$edit_id'";

        $run_edit = mysqli_query($con,$get_p);

        $row_edit = mysqli_fetch_array($run_edit);

        $p_id = $row_edit['id'];

        $p_title = $row_edit['title'];

        $marcas_id = $row_edit['marcas_id'];

        $cat = $row_edit['cat_id'];

        $p_image1 = $row_edit['img1'];

        $p_image2 = $row_edit['img2'];

        $p_image3 = $row_edit['img3'];

        $p_price = $row_edit['price'];

        $p_desc = $row_edit['pro_desc'];

        $p_keywords = $row_edit['keywords'];

    }

    $get_p_cat = "select * from categoria where id='$cat'";

    $run_p_cat = mysqli_query($con,$get_p_cat);

    $row_p_cat = mysqli_fetch_array($run_p_cat);

    $p_cat_title = $row_p_cat['categoria'];
    $p_cat = $row_p_cat['id'];

    $get_marcas = "select * from product_marcas where p_cat_id='$marcas_id'";

    $run_cat = mysqli_query($con,$get_marcas);

    $row_cat = mysqli_fetch_array($run_cat);

    $cat_title = $row_cat['p_cat_title'];

    ?>


    <!DOCTYPE html>

    <html>

    <head>

        <title> Edit Products </title>


        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>

    </head>

    <body>

    <div class="row"><!-- row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"> </i> Dashboard / Editar Produtos

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title">

                        <i class="fa fa-money fa-fw"></i> Editar Produtos

                    </h3>

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-3 control-label" >Titulo</label>

                            <div class="col-md-6" >

                                <input type="text" name="product_title" class="form-control" required value="<?php echo $p_title; ?>">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-3 control-label" >Gênero </label>

                            <div class="col-md-6" >

                                <select name="product_cat" class="form-control">

                                    <option value="<?php echo $p_cat ; ?>" > <?php echo $p_cat_title; ?> </option>

                                    <?php

                                    $get_p_cats = "select * from categoria";

                                    $run_p_cats = mysqli_query($con,$get_p_cats);

                                    while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {

                                        $p_cat_id = $row_p_cats['id'];

                                        $p_cat_title = $row_p_cats['categoria'];

                                        echo "<option value='$p_cat_id' >$p_cat_title</option>";

                                    }
                                    ?>


                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-3 control-label" >Marcas</label>

                            <div class="col-md-6" >


                                <select name="cat" class="form-control" >

                                    <option value="<?php echo $cat; ?>" > <?php echo $cat_title; ?> </option>

                                    <?php

                                    $get_cat = "select * from product_marcas ";

                                    $run_cat = mysqli_query($con,$get_cat);

                                    while ($row_cat=mysqli_fetch_array($run_cat)) {

                                        $cat_id = $row_cat['p_cat_id'];

                                        $cat_title = $row_cat['p_cat_title'];

                                        echo "<option value='$cat_id'>$cat_title</option>";

                                    }

                                    ?>


                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-3 control-label" >Imagem Produto</label>

                            <div class="col-md-6" >

                                <input type="file" name="product_img1" class="form-control" value="<?php echo $p_image1; ?>">
                                <br><img src="product_images/<?php echo $p_image1; ?>" width="70" height="70" >

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-3 control-label" >Imagem Produto</label>

                            <div class="col-md-6" >

                                <input type="file" name="product_img2" class="form-control">
                                <br><img src="product_images/<?php echo $p_image2; ?>" width="70" height="70" >

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-3 control-label" >Imagem Produto</label>

                            <div class="col-md-6" >

                                <input type="file" name="product_img3" class="form-control">
                                <br><img src="product_images/<?php echo $p_image3; ?>" width="70" height="70" >

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-3 control-label" >Preço</label>

                            <div class="col-md-6" >

                                <input type="text" name="product_price" class="form-control" required value="<?php echo $p_price; ?>" >

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-3 control-label" >Palavras Chaves</label>

                            <div class="col-md-6" >

                                <input type="text" name="product_keywords" class="form-control" required value="<?php echo $p_keywords; ?>" >

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-3 control-label" >Descrição</label>

                            <div class="col-md-6" >

<textarea name="product_desc" class="form-control" rows="6" cols="19" >
<?php echo nl2br($p_desc); ?>
</textarea>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-3 control-label" ></label>

                            <div class="col-md-6" >

                                <input type="submit" name="update" value="Atualizar produto" class="btn btn-primary form-control" >

                            </div>

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->




    </body>

    </html>

    <?php

    if(isset($_POST['update'])){

        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $cat = $_POST['cat'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];

        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];

        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];

        move_uploaded_file($temp_name1,"product_images/$product_img1");
        move_uploaded_file($temp_name2,"product_images/$product_img2");
        move_uploaded_file($temp_name3,"product_images/$product_img3");

        $update_product = "update products set cat_id='$product_cat',marcas_id='$cat',date=NOW(),title='$product_title',img1='$product_img1', img2='$product_img2',img3='$product_img3',price='$product_price',pro_desc='$product_desc',keywords='$product_keywords' where id='$p_id'";

        $run_product = mysqli_query($con,$update_product);

        if($run_product){

            echo "<script> alert('Produto Alterado')</script>";

            echo "<script>window.open(home.php,'_self')</script>";

        }

    }

    ?>

<?php } ?>
