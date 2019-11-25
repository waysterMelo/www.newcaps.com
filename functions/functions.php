<?php
$db  = mysqli_connect("localhost", "root", "", "ecom_db");
//$db = mysqli_connect("localhost", "u156072488_root", "newcaps", "u156072488_ecom");

function get_ip(){
    switch (true){
        case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default: return $_SERVER['REMOTE_ADDR'];
    }
};
function marcas_consulta(){
    global $db;
    if (isset($_GET['marca'])){
        $id = $_GET['marca'];
        $sql = "select * from product_marcas where p_cat_id = '$id'";
        $rs = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($rs);
        $title = $row['p_cat_title'];

        $getProdutos = "select * from products where marcas_id= '$id'";
        $runProdutos = mysqli_query($db, $getProdutos);
        $count = mysqli_num_rows($runProdutos);

        if ($count === 0 ){
            echo "<div class='card'>
         <div class='card-header'>
         <h1>Não há produtos nessa marca</h1>
            </div>   
            </div>";
        }else{
            echo "
              <div class='col-lg-12 py-3'>
              <div class='row'>
                <div class='card' style='width: 100%'>
                <h1 class='text-center'>$title</h1>
                </div>
                </div>
                </div>               
              ";
        }
        while($rowP = mysqli_fetch_array($runProdutos)){
            $title = $rowP['title'];
            $img1 = $rowP['img1'];
            $img2 = $rowP['img2'];
            $price = $rowP['price'];
            $newPrice = number_format($price,2,',','.');
            $url = $rowP['url'];
            echo "
                 <div class='col-md-6 col-lg-4 d-flex flex-row justify-content-center col-4'>
                   <div class=\"product-grid4\">
                    <div class=\"product-image4\">
                        <a href=\"$url\">
                            <img src=\"../admin_area/product_images/$img1\" class=\"img-fluid pic-1\">
                            <img src=\"../admin_area/product_images/$img2\" class=\"img-fluid pic-2\">
                        </a>
                        <ul class=\"social\">
                            <li><a href=\"$url\" data-trip=\"Ver\"><i class=\"fa fa-eye\"></i></a></li>
                        </ul>
                        <span class=\"product-new-label\">Lançamento</span>
                    </div>
                    <div class=\"product-content\">
                        <h3 class=\"title\"><a href=\$url\">$title</a></h3>
                        <div class=\"price\">
                            R$ $newPrice
                        </div>
                        <a href=\"$url\" class=\"add-to-cart\">Detalhes</a>
                    </div>
                </div>
            </div>
        ";
        }
    }
}
function categoria_consulta(){
    global $db;

    if (isset($_GET['categoria'])){

        $id = $_GET['categoria'];

        $sql = "select * from categoria where id='$id'";
        $rs = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($rs);
        $title = $row['categoria'];

        $getProdutos = "select * from products where cat_id= '$id'";
        $runProdutos = mysqli_query($db, $getProdutos);
        $count = mysqli_num_rows($runProdutos);

        if ($count === 0 ){
            echo "<div class='card'>
         <div class='card-header'>
         <h1>Não há produtos nessa categoria</h1>
            </div>   
            </div>";
        }else{
            echo "
                <div class='col-lg-12 mb-5'>
                <div class='row justify-content-center'>
                <div class='card' style='width: 100%'>
                <div class='card-header bg-light'>
                <h1 class='text-center'>$title</h1>
                </div>            
                </div>
                </div>
                </div>  
               ";
        }

        while($rowP = mysqli_fetch_array($runProdutos)){
            $id = $rowP['id'];
            $title = $rowP['title'];
            $img1 = $rowP['img1'];
            $img2 = $rowP['img2'];
            $price = $rowP['price'];
            $newPrice = number_format($price,2,',','.');
            $url = $rowP['url'];
            echo "
                 <div class='col-md-6 col-lg-4 d-flex flex-row col-4'>
                   <div class=\"product-grid4\">
                    <div class=\"product-image4\">
                        <a href=\"$url\">
                            <img src=\"../admin_area/product_images/$img1\" class=\"img-fluid pic-1\">
                            <img src=\"../admin_area/product_images/$img2\" class=\"img-fluid pic-2\">
                        </a>
                        <ul class=\"social\">
                            <li><a href=\"$url\" data-trip=\"Ver\"><i class=\"fa fa-eye\"></i></a></li>
                        </ul>
                        <span class=\"product-new-label\">Lançamento</span>
                    </div>
                    <div class=\"product-content\">
                        <h3 class=\"title\"><a href=\"$url\">$title</a></h3>
                        <div class=\"price\">
                            R$ $newPrice
                        </div>
                        <a href=\"$url\" class=\"add-to-cart\">Ver Detalhes</a>
                    </div>
                </div>
            </div>
        ";
        }

    }
}
function addCart(){
    global $db;
    $sId = session_id();
    if (isset($_GET['add_cart'])){
        $p_id = $_GET['add_cart'];
        $qtd = $_POST['qtd'];
        $tamanho = $_POST['p_size'];

        $sql = "select * from products where id = '$p_id'";
        $checarSql = mysqli_query($db,$sql);
        $rsSql = mysqli_fetch_array($checarSql);
        $preco = $rsSql['price'];
        $total = $preco * $qtd;
        $chek_p = "select * from cart where session_id='$sId' AND id_pro ='$p_id' and dtremoved = NOTNULL";
        $rs = mysqli_query($db, $chek_p);
        if (mysqli_num_rows($rs) > 0){
            echo "<script>alert('Esse produto já esta no carrinho')</script>";
            echo "<script>window.open('?produto=$p_id','_self')</script>";
            exit();
        }else {
            $insert = "insert into cart (id_pro, quantidade, p_size, valor,session_id)
 values('$p_id','$qtd','$tamanho','$total','$sId')";
            $query = mysqli_query($db, $insert);
            if ($query){
                echo "<script>window.open('../carrinho','_self')</script>";
            }else{
                echo "Erro";
            }

        }
    }
}
function itens(){
    global $db;
    $sId = session_id();
    $ip = get_ip();
    $get_items = "select * from cart where session_id ='$sId' and dtremoved is NULL";
    $rs = mysqli_query($db, $get_items);
    $itens = mysqli_num_rows($rs);
    echo  $itens;
}