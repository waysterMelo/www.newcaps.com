<?php
include '../includes/db.php';
if(!isset($_SESSION['admin_email']) && (!isset($_SESSION['admin_pass']))){
    echo "<script>window.open('index.php', '_self')</script>";
}else {

    ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>Dashboard / Cadastrar Produtos
                </li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-heading">
                    <h3 class="card-title">
                        <i class="fa fa-product-hunt"></i>Inserir Produtos
                    </h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Nome do Produto</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="titulo_p" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" >Imagem do Produto 1</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="image1" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Imagem do Produto 2</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="image2" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Imagem do Produto 2</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="image3" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Preço</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Quantidade</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="qtd" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Selecione a Categoria</label>
                            <div class="col-md-6">
                                <select name="categoria" class="form-control">
                                    <option value="">Selecione a categoria do produto</option>
                                    <?php
                                    $sql = "select * from categoria";
                                    $query = mysqli_query($con, $sql);
                                    while ($row=mysqli_fetch_array($query)){
                                        $id = $row['id'];
                                        $categoria = $row['categoria'];

                                        echo "<option value='$id'>$categoria</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Selecione a Carca</label>
                            <div class="col-md-6">
                                <select name="marca" class="form-control">
                                    <option>Selecione a marca do produto</option>
                                    <?php
                                    $sql = "select * from product_marcas";
                                    $query = mysqli_query($con, $sql);
                                    while ($row=mysqli_fetch_array($query)){
                                        $id = $row['p_cat_id'];
                                        $title = $row['p_cat_title'];
                                        $desc = $row['p_cat_desc'];

                                        echo "<option value='$id'>$title</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Palavras Chaves</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="keys">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Descrição do Produto</label>
                            <div class="col-md-6">
                                <textarea type="text" class="form-control trumbowyg-active" name="descricao" id="trumbowyg-demo"></textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                           <center><button type="submit" name="enviar" class="btn btn-success btn-md mx-auto">Cadastrar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

if (isset($_POST['enviar'])){
    $title = $_POST['titulo_p'];
    $marca = $_POST['marca'];
    $cate = $_POST['categoria'];
    $price = $_POST['price'];
    $qtd = $_POST['qtd'];
    $descricao = $_POST['descricao'];
    $keys = $_POST['keys'];

    $image1 = $_FILES['image1']['name'];
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];


    $temp_name1 = $_FILES['image1']['tmp_name'];
    $temp_name2 = $_FILES['image2']['tmp_name'];
    $temp_name3 = $_FILES['image3']['tmp_name'];


    move_uploaded_file($temp_name1,"product_images/$image1");
    move_uploaded_file($temp_name2,"product_images/$image2");
    move_uploaded_file($temp_name3,"product_images/$image3");


    $insert = "insert into products (marcas_id, cat_id ,date, title,img1,img2,img3,price, qtd, pro_desc,keywords)
            values ('$marca','$cate', NOW(),'$title','$image1','$image2','$image3','$price','$qtd','$descricao','$keys')";

$query = mysqli_query($con, $insert);

if ($query){
    echo "<script>alert('Produto cadastrado com sucesso')</script>";
    echo "<script>window.open('index.php?ver_produtos', '_self')</script>";
    }
}

?>

<?php } ?>
