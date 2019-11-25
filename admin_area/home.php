<?php
session_start();
include '../includes/db.php';
if(!isset($_SESSION['admin_email']) && (!isset($_SESSION['admin_pass']))){
    echo "<script>window.open('index.php','_self')</script>";
}else {

?>
    <?php
        $admin_session = $_SESSION['admin_email'];
        $get_admin = "select * from admins where admin_email='$admin_session'";
        $query = mysqli_query($con, $get_admin);
        $row_admin = mysqli_fetch_array($query);
        $id = $row_admin['id'];
        $admin_nome = $row_admin['admin_nome'];
        $admin_cargo = $row_admin['admin_cargo'];
        $admin_email = $row_admin['admin_email'];
        $admin_contato = $row_admin['admin_contato'];
        $admin_pais = $row_admin['admin_pais'];
        $admin_sobre = $row_admin['admin_sobre'];

        $get_produtos = "select * from products";
        $run_products = mysqli_query($con,$get_produtos);
        $count_pro = mysqli_num_rows($run_products);

    $get_clientes = "select * from clientes";
    $run_clientes = mysqli_query($con,$get_clientes);
    $count_clientes = mysqli_num_rows($run_clientes);

    $get_marcas = "select * from product_marcas";
    $run_marcas = mysqli_query($con,$get_marcas);
    $count_marcas = mysqli_num_rows($run_marcas);

    $get_pedidos = "select * from pedidos";
    $run_pedidos = mysqli_query($con,$get_pedidos);
    $count_pedidos = mysqli_num_rows($run_pedidos);

    ?>
<!DOCTYPE html>
    <html lang="pt">
    <head>
        <title>Dashboard | New Caps Oficial</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" >
        <script src="../js/jquery.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="../styles/jquery-confirm.min.css">
        <script src="../js/html2pdf.bundle.min.js"></script>

    </head>

    <body>
    <div id="wrapper" class="col-lg-12">
       <div class="col-lg-3">
           <?php include("includes/sidebar.php"); ?>
       </div>

        <div id="page-wrapper">

            <div class="container-fluid">

                <?php
                if(isset($_GET['dashboard'])){
                    include("dashboard.php");}

                if (isset($_GET['inserir_produtos'])){
                   include 'insert_product.php';}

                if (isset($_GET['ver_produtos'])){
                    include "ver_produtos.php";}

                if (isset($_GET['delete_product'])){
                    include "deletar_produto.php";}

                if (isset($_GET['edit_product'])){
                    include "editar_produtos.php";}

                if (isset($_GET['inserir_categorias'])){
                    include "generos.php";}

                if (isset($_GET['ver_categorias'])){
                    include 'ver_generos.php';}

                if (isset($_GET['delete_p_cat'])){
                    include 'delete_p_cat.php';
                }
                if (isset($_GET['edit_p_cat'])){
                    include 'edit_p_cat.php';}

                if(isset($_GET['inserir_marcas'])){
                    include 'inserir_marcas.php';}

                if (isset($_GET['ver_marcas'])){
                    include 'ver_marca.php';}

                if (isset($_GET['editar_marcas'])){
                    include 'editar_marcas.php';}

                if (isset($_GET['delete_marcas'])){
                    include 'delete_marcas.php';}

                if (isset($_GET['inserir_slides'])){
                    include 'inserir_slides.php';}

                if (isset($_GET['ver_slides'])){
                    include "ver_slides.php";}

                if (isset($_GET['edit_slide'])){
                    include 'edit_slide.php';}

                if (isset($_GET['ver_clientes'])) {
                  include 'ver_clientes.php';}

                  if (isset($_GET['customer_delete'])) {
                    include 'customer_delete.php';}

                    if (isset($_GET['ver_pedidos'])) {
                      include 'ver_pedidos.php';}

                      if (isset($_GET['order_delete'])) {
                        include 'order_delete.php';}

                        if (isset($_GET['tirar_pedidos'])) {
                          include 'tirar_pedidos.php';}

                        if (isset($_GET['codigo_rastreio'])){
                            include 'rastreio.php';
                        }
                        if (isset($_GET['inserir_rastreio'])){
                            include 'inserir_rastreio.php';
                        }

                ?>

            </div>

        </div>

    </div>
     <script src="js/bootstrap.min.js"></script>
    <script src="../js/jquery-confirm.min.js"></script>
    <script>
        let fatura = document.getElementById('fatura_detalhes').innerHTML;
       if (fatura == ''){
           $('#detalhes_tabela').html('');
           $('#result_tabela').html('');
           $('#produto').html('');
           $('#tirarpedido_button').html('');
       }
        function generatePDF() {
            // Choose the element that our invoice is rendered in.
            const element = $('#dados').html();
            // Choose the element and save the PDF for our user.
            html2pdf().from(element).save();
        }
    </script>
    </body>
</html>
<?php } ?>
