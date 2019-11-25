<?php
session_start();
$sId = session_id();
include '../includes/db.php';
include "../functions/functions.php";
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Carrinho | New Caps oficial</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
<<<<<<< HEAD
    <link rel="stylesheet" href="../styles/estilo5.css">
    <link rel="stylesheet" href="../styles/bootstrap4.1.min.css">
    <link rel="stylesheet" href="../styles/jquery-confirm.min.css">
    <script src="../js/jquery-confirm.min.js"></script>
    <link rel="stylesheet" href="cart_responsive1.css">
    <link rel="stylesheet" href="table-basic.css">
=======
    <link rel="stylesheet" href="../styles/estilo3.css">
    <link rel="stylesheet" href="../styles/bootstrap4.1.min.css">
    <link rel="stylesheet" href="../styles/jquery-confirm.min.css">
    <script src="../js/jquery-confirm.min.js"></script>
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
</head>
<body class="bg-light">

<div id="preloader">
    <div id="status"></div>
</div>
<div id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-6"><!-- col-md-6 offer Starts -->

                <a href="" class="btn btn-default btn-md text-white"
                   style="background-color: black; border: none; font-weight: 700">
                    <?php

                    if (!isset($_SESSION['email'])){
                        echo "Bem Vindo Visitante";
                    }else{
                        echo "<span class='mr-2'>Bem Vindo:</span>".$_SESSION['email']. "";
                    }
                    ?>
                </a>


            </div>
            <div class="col-md-6"><!-- col-md-6 Starts -->
                <ul class="menu"><!-- menu Starts -->

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo "
                            <a href=\"../customer/customer_register.php\"> Registrar</a>
                            ";
                        }else{
                            echo "<a href=\"../customer/minha_conta.php?edit_account\"> Editar Conta</a>";
                        }
                        ?>
                    </li>

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo  "<a href='../shopping/' >Produtos</a>";
                        }else{
                            echo  "<a class='text-capitalize' href='../customer/minha_conta.php?meus_pedidos' >meus Pedidos</a>";
                        }
                        ?>
                    <li>

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo  "<a href=''>Carrinho</a>";
                        }else{
                            echo  "<a class='text-capitalize' href='../customer/minha_conta.php?meus_pedidos' >minha conta</a>";
                        }
                        ?>
                    </li>

                    <li>
                        <?php
                        if (!isset($_SESSION['email'])){
                            echo "<a href='../customer/login.php'> Login </a>";
                        }else {
                            echo "<a href='../customer/logout.php'> Sair </a>";
                        }
                        ?>
                    </li>

                </ul><!-- menu Ends -->

            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<<<<<<< HEAD
    <img src="../images/logo.png" alt="Logo new caps" class="d-block w-25 mr-5">
=======
    <img src="../admin_area/admin_images/logo.svg" alt="Logo new caps" class="img-fluid">
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <form class="form-inline mx-2 d-none d-sm-block">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <input type="text" class="form-control" placeholder="pesquisar" aria-label="" aria-describedby="basic-addon1">
                    </div>
                    <button class="btn btn-danger" type="button"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <li class="nav-item ml-2">
                <a class="nav-link" href="../index.php">Pagina Inicial</a>
            </li>
            <li class="nav-item ml-2">
                <a class="nav-link" href="../shopping">Produtos</a>
            </li>
            <li class="nav-item ml-2">
                <?php
                if (!isset($_SESSION['email'])){
                    echo  "<a class='text-capitalize nav-link' href='../customer/login.php' >Minha conta</a>";
                }else{
                    echo  "<a class='text-capitalize nav-link' href='../customer/minha_conta.php?meus_pedidos' >Pedidos</a>";
                }
                ?>
            <li>

            <li class="nav-item ml-2">
                <a class="nav-link" href="../contato">Contato</a>
            </li>
            <li class="nav-item">
                <a style="background-color: black;" class="btn btn-md nav-link text-white" href="../carrinho/"><!-- btn btn-primary navbar-btn right Starts -->

                    <i class="fa fa-shopping-cart"></i>

                    <span><?php echo itens(); ?> item(s) no carrinho </span>

                </a><!-- btn btn-primary navbar-btn right Ends -->

            </li>
        </ul>
    </div>
</nav>

<div id="content"><!-- content Starts -->
    <div class="container-fluid"><!-- container Starts -->
        <div class="col-md-12" ><!--- col-md-12 Starts -->
            <ul class="breadcrumb" ><!-- breadcrumb Starts -->
                <li class="breadcrumb-item">
                    <a href="../index.php">Página Inicial</a>
                </li>
                <li class="breadcrumb-item">Carrinho</li>
            </ul><!-- breadcrumb Ends -->
        </div><!--- col-md-12 Ends -->
    </div><!-- container Ends -->
</div><!-- content Ends -->

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8" id="cart"><!-- col-md-9 Starts -->
            <div class="bg-white p-3"><!-- box Starts -->
                <form action="" method="post" enctype="multipart/form-data" ><!-- form Starts -->
                    <h2 class="card-title"> Carrinho </h2>
                    <?php
                    $ip = get_ip();
                    $selectcar = "select * from cart where session_id ='$sId' and dtremoved is NULL";
                    $run = mysqli_query($con, $selectcar);
<<<<<<< HEAD
                    $count = mysqli_num_rows($run)
                    ?>
                    <p class="card-text text-muted" > Voce tem <?php echo $count; ?> item(s) no carrinho </p>
                  <div class="bg-white">
                      <div class="table-responsive-lg col-lg-12">
                          <!--TABELA DOS PRODUTOS -->
                          <table class="table table-striped tableBasic">
                              <thead class="text-center">
                              <tr>
                                  <th scope="col">Imagem</th>
                                  <th scope="col">Produto</th>
                                  <th scope="col">Quantidade</th>
                                  <th scope="col">Preço un</th>
                                  <th scope="col">Tamanho</th>
                                  <th scope="col">Deletar</th>
                                  <th scope="col" colspan="">Total</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $total = 0;
                              while($row = mysqli_fetch_array($run)){
                                  $id = $row['id_pro'];
                                  $qty = $row['quantidade'];

                                  $products  = "select * from products where id='$id'";
                                  $runproducts = mysqli_query($con, $products);
                                  while($rowP = mysqli_fetch_array($runproducts)){

                                      $pro_id = $rowP['id'];
                                      $title = $rowP['title'];
                                      $img1 =  $rowP['img1'];
                                      $price = $rowP['price'];
                                      $sub_total = $rowP['price'] * $qty;
                                      $total += $sub_total;
                                      ?>

                                      <tr class="text-center">
                                          <td>
                                              <img src="../admin_area/product_images/<?php echo $img1; ?>"
                                                   alt="bone" class="img-fluid img-thumbnail" style="width: 50px">
                                          </td>
                                          <td>
                                              <a class="text-danger" href="../detalhes/?pro_id=<?php echo $pro_id?>"><?php echo $title; ?></a>
                                          </td>
                                          <td>
                                              <?php echo $qty; ?>
                                          </td>
                                          <td>
                                              <?php echo 'R$' . number_format($price, 2, ',', '.');?>
                                          <td>
                                              Único
                                          </td>
                                          <td>
                                              <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" >
                                          </td>
                                          <td class="text-center" colspan="5">
                                              <?php echo 'R$' . number_format($sub_total, 2, ',', '.');?>
                                          </td>
                                      </tr>
                                  <?php } } ?>
                              </tbody>
                          </table>
                          <!--end TABELA DOS PRODUTOS -->

                          <!--TABELA DOS BOTOES -->
                              <table class="table table-dark">
                                  <tbody>
                                  <tr>
                                      <th class="th_um">
                                          <a href="../shopping/" class="btn btn-success padding_xs">
                                              <i class="fa fa-chevron-left"></i> Continuar Comprando
                                          </a>
                                      </th>
                                      <th class="float-right th_dois">
                                          <button class="btn btn-light" type="submit" name="atualizar" value="">
                                              <i class="fa fa-refresh"></i> Atualizar Carrinho
                                          </button>
                                      </th>
                                  </tr>
                                  </tbody>
                              </table>
                          </div>
                          <!--end TABELA DOS BOTOES -->
                      </div>
=======
                    $count = mysqli_num_rows($run);


                    if (isset($_POST['calcular_frete'])) {

                        $cep_origem = "35720000";     // Seu CEP , ou CEP da Loja
                        $cep_destino = $_POST['cep']; // CEP do cliente, que irá vim via POST
                        /* DADOS DO PRODUTO A SER ENVIADO */
                        $peso = .3;
                        $valor = "20,00";
                        $tipo_do_frete = '04510';
                        $altura = 20;
                        $largura = 20;
                        $comprimento = 20;
                        $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
                        $url .= "nCdEmpresa=";
                        $url .= "&sDsSenha=";
                        $url .= "&sCepOrigem=" . $cep_origem;
                        $url .= "&sCepDestino=" . $cep_destino;
                        $url .= "&nVlPeso=" . $peso;
                        $url .= "&nVlLargura=" . $largura;
                        $url .= "&nVlAltura=" . $altura;
                        $url .= "&nCdFormato=1";
                        $url .= "&nVlComprimento=" . $comprimento;
                        $url .= "&sCdMaoProria=n";
                        $url .= "&nVlValorDeclarado=" . $valor;
                        $url .= "&sCdAvisoRecebimento=n";
                        $url .= "&nCdServico=" . $tipo_do_frete;
                        $url .= "&nVlDiametro=0";
                        $url .= "&StrRetorno=xml";
                        $xml = simplexml_load_file($url);
                        $fretePac = $xml->cServico;
                        $valordofretePac = $fretePac->Valor;
                        $prazoPac = $fretePac->PrazoEntrega;

                        $cep_origem = "35720000";     // Seu CEP , ou CEP da Loja
                        $cep_destino = $_POST['cep']; // CEP do cliente, que irá vim via POST
                        /* DADOS DO PRODUTO A SER ENVIADO */
                        $peso = .3;
                        $valor = "20,00";
                        $tipo_do_frete = '04014';
                        $altura = 20;
                        $largura = 20;
                        $comprimento = 20;
                        $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
                        $url .= "nCdEmpresa=";
                        $url .= "&sDsSenha=";
                        $url .= "&sCepOrigem=" . $cep_origem;
                        $url .= "&sCepDestino=" . $cep_destino;
                        $url .= "&nVlPeso=" . $peso;
                        $url .= "&nVlLargura=" . $largura;
                        $url .= "&nVlAltura=" . $altura;
                        $url .= "&nCdFormato=1";
                        $url .= "&nVlComprimento=" . $comprimento;
                        $url .= "&sCdMaoProria=n";
                        $url .= "&nVlValorDeclarado=" . $valor;
                        $url .= "&sCdAvisoRecebimento=n";
                        $url .= "&nCdServico=" . $tipo_do_frete;
                        $url .= "&nVlDiametro=0";
                        $url .= "&StrRetorno=xml";
                        $xml = simplexml_load_file($url);
                        $freteSedex = $xml->cServico;
                        $valordofreteSedex = $freteSedex->Valor;
                        $prazoSedex = $freteSedex->PrazoEntrega;

                        $sedex = "sedex";
                        $pac = "pac";


                    }


                    ?>
                    <p class="card-text text-muted" > Voce tem <?php echo $count; ?> item(s) no carrinho </p>
                    <div class="table-responsive-lg">
                        <table class="table table-dark">
                            <thead class="text-center">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Produto</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Preço un</th>
                                <th scope="col">Tamanho</th>
                                <th scope="col">Deletar</th>
                                <th scope="col" colspan="">Total</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                            $total = 0;
                            while($row = mysqli_fetch_array($run)){
                            $id = $row['id_pro'];
                            $qty = $row['quantidade'];

                            $products  = "select * from products where id='$id'";
                            $runproducts = mysqli_query($con, $products);
                            while($rowP = mysqli_fetch_array($runproducts)){

                            $pro_id = $rowP['id'];
                            $title = $rowP['title'];
                            $img1 =  $rowP['img1'];
                            $price = $rowP['price'];
                            $sub_total = $rowP['price'] * $qty;
                            $total += $sub_total;
                            ?>

                            <tr>
                                <td>
                                    <img src="../admin_area/product_images/<?php echo $img1; ?>"
                                         alt="bone" class="img-fluid img-thumbnail" style="width: 50px">
                                </td>
                                <td>
                                    <a class="text-danger" href="../detalhes/?pro_id=<?php echo $pro_id?>"><?php echo $title; ?></a>
                                </td>
                                <td>
                                    <?php echo $qty; ?>
                                </td>
                                <td>
                                    <?php echo 'R$' . number_format($price, 2, ',', '.');?>
                                <td>
                                    Único
                                </td>
                                <td>
                                    <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" >
                                </td>
                                <td class="text-center" colspan="5">
                                    <?php echo 'R$' . number_format($sub_total, 2, ',', '.');?>
                                </td>
                            </tr>
                            <?php } } ?>
                            </tbody>
                        </table>
                        <table class="table table-dark">
                            <tbody>
                            <tr>
                                <th>
                                    <a href="../shopping/" class="btn btn-success">
                                        <i class="fa fa-chevron-left"></i> Continuar Comprando
                                    </a>
                                </th>
                                <th class="float-right">
                                    <button class="btn btn-light" type="submit" name="atualizar" value="">
                                        <i class="fa fa-refresh"></i> Atualizar Carrinho
                                    </button>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table">
                            <tbody>
                                <tr class="bg-light text-dark">
                                    <td colspan="3" class="text-center pl-4">
                                        <div class="form-group-sm col-md-12">
                                            <div class="input-group input-group-sm mb-3">
                                                <label class=" font-weight-bold text-center" style="font-size: 12px;">Calcular taxa de entrega
                                                    <div class="input-group-text">
                                                        <input name="cep" id="cep" type="text" class="text-center" placeholder="DIGITE O CEP">
                                                        <button type="submit"  name="calcular_frete"  class="btn btn-danger form-control"><i class="fa fa-search mx-2"></i></button>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                            <td colspan="5">
                                <div class="form-group row justify-content-center">
                                    <h6 class="text-right pt-4" id="retorno">
                                        <form action="" method="post" enctype="multipart/form-data">
                                         <div id="frete_div">
                                             <div class="text-dark pb-3 text-center">
                                                 <input type="checkbox" name="freteInput[]" class="form-check-input" value="<?php echo @$valordofretePac?>,<?= @$prazoPac?>,<?=@$pac?>">
                                                 <b>Pac:</b> R$ <span id="fretePac" class="py-5"><?php echo @$valordofretePac?></span>
                                                 <span id="prazoPac" class="py-5">Prazo: <?php echo @$prazoPac?> dia(s)</span>
                                             </div>
                                             <div class="text-dark text-center">
                                                 <input type="checkbox" name="freteInput[]" class="form-check-input" value="<?php echo @$valordofreteSedex?>,<?= @$prazoSedex?>,<?=@$sedex?>">
                                                 <span class="py-5 custom-checkbox"><b>Sedex:</b> R$ <?php echo @$valordofreteSedex ?>
                                            </span><span class="py-5">Prazo: <?php echo @$prazoSedex ?> dia(s)</span>
                                             </div>
                                             <div class="text-center">
                                                 <button type="submit" name="selecionar_frete" class="btn btn-danger mt-2">adicionar frete</button>
                                             </div>
                                         </div>
                                        </form>
                                        <?php
                                        if (isset($_POST['selecionar_frete'])){
                                            $campo = $_POST['freteInput'];
                                            foreach ($campo as $v){
                                                global $v;
                                                $sdf = substr(@$v,0,5);
                                                $sdf2 = str_replace(',', '.', $sdf);
                                            }
                                            echo "<script>
                                                     $.alert({
                                                     title: 'Caro Cliente',
                                                     content: 'seu frete foi adicionado !',
                                                     theme: 'dark'
                                                    });
                                                 </script>";
                                        }
                                        ?>
                                    </h6>
                                </div>
                            </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
                </form>
            </div>
            </div>
            <?php
            function update_cart(){
                        global $con;
                        $sId = session_id();
                        if (isset($_POST['atualizar'])){
                            foreach ($_POST['remove'] as $remove_id){
                                $delete_pro = "update cart set dtremoved = NOW() 
where session_id ='$sId' and id_pro = '$remove_id'";
                                $run = mysqli_query($con, $delete_pro);

                                if ($run){
                                    echo "<script>window.open('../carrinho', '_self')</script>";
                                }
                            }
                        }
                    }
                    echo @$up_cart = update_cart();
            ?>
        <div class="col-sm-12 col-md-12 col-lg-4"><!-- col-md-3 Starts -->
            <?php
                 @$email = $_SESSION['email'];
                $sql = "select * from clientes where email='$email'";
                $query = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($query);
                $id_cl = $row['id'];
            ?>
            <div class="card" id="order-summary"><!-- box Starts -->
                <div class="card-header" style="background-color: black; color: white;"><!-- box-header Starts -->
                    <h3 class="card-title text-center">Pedido Total</h3>
                </div><!-- box-header Ends -->
                <p class="text-center card-text p-4">
                    Valores correspondentes ao serviço PAC e SEDEX dos correios <br>
                    calcule o frete na proxima pagina.
                </p>
                <div class="table-responsive-lg"><!-- table-responsive Starts -->

                    <table class="table table-dark"><!-- table Starts -->

                        <tbody class="text-center"><!-- tbody Starts -->

                        <tr>
                            <td>Pedido</td>
                            <th class="text-center">
                                R$<?php echo number_format($total, 2, ',', '.');?>
                            </th>
                        </tr>

                        <tr>
<<<<<<< HEAD
=======
                            <td>Entrega</td>
                            <th class="input-group-append ml-3">
                                <span class="input-group-text bg-light border-0"><i class="fa fa-money"></i></span>
                                <input style="width: 50%;" name="frete_valor" class="ml-2 input-group-append form-control bg-light border-0 text-center"
                                      disabled  type="text" value="<?php echo substr(@$v,0,5);?>" />
                            </th>
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
                        </tr>
                        </tbody><!-- tbody Ends -->
                        <tfoot>
                        <th class="text-left h2">
                            TOTAL
                        </th>

                        <th class="text-right h2">
                            <p id="total_carrinho">
                                <?php
<<<<<<< HEAD
                                $totalValor = number_format($total, 2, '.', ',');
                               echo number_format( $total,2,',','.');
=======
                                $totalValor = $total + @$sdf2;
                                echo number_format($totalValor,2,',','.');
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
                                ?>
                            </p>
                        </th>
                        </tfoot>
                    </table><!-- table Ends -->
                </div><!-- table-responsive Ends -->
                <div class="table-responsive">
                    <table class="table table-bordered border-0">
                        <tr>
                            <th class="text-center border-0">
                                    <a href="../carrinho/calcular-frete.php" class="btn btn-primary text-center font-weight-light">Concluir e calcular o frete</span></a>
                                    <img src="../images/correios.jpg" style="width: 200px; min-height: 80px;max-height: 80px;" alt="mercado pago" class="img-fluid">
                            </th>
                        </tr>
                    </table>
                </div>
            </div><!-- pedido total -->
        </div>
        </div>

<div class="container" style="background-color: transparent">
    <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
            <div class="section-title">
                <h1>Lançamentos da semana</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                <div class="single-related-product d-flex">
                    <a href="#">
                        <img src="../admin_area/product_images/bone1.jpg" class="img-fluid" style="height: 100px">
                    </a>
                    <div class="desc">
                        <a href="#" class="title">Bone Lacoste</a>
                        <div class="price">
                            <h6>$189.00</h6>
                            <h6 class="l-through">$210.00</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                <div class="single-related-product d-flex">
                    <a href="#">
                        <img src="../admin_area/product_images/bone2.jpg" class="img-fluid" style="height: 100px">
                    </a>
                    <div class="desc">
                        <a href="#" class="title">Bone Lacoste</a>
                        <div class="price">
                            <h6>$189.00</h6>
                            <h6 class="l-through">$210.00</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                <div class="single-related-product d-flex">
                    <a href="#">
                        <img src="../admin_area/product_images/bone1.jpg" class="img-fluid" style="height: 100px">
                    </a>
                    <div class="desc">
                        <a href="#" class="title">Bone Lacoste</a>
                        <div class="price">
                            <h6>$189.00</h6>
                            <h6 class="l-through">$210.00</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                <div class="single-related-product d-flex">
                    <a href="#">
                        <img src="../admin_area/product_images/bone2.jpg" class="img-fluid" style="height: 100px">
                    </a>
                    <div class="desc">
                        <a href="#" class="title">Bone Lacoste</a>
                        <div class="price">
                            <h6>$189.00</h6>
                            <h6 class="l-through">$210.00</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                <div class="single-related-product d-flex">
                    <a href="#">
                        <img src="../admin_area/product_images/bone2.jpg" class="img-fluid" style="height: 100px">
                    </a>
                    <div class="desc">
                        <a href="#" class="title">Bone Lacoste</a>
                        <div class="price">
                            <h6>$189.00</h6>
                            <h6 class="l-through">$210.00</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                <div class="single-related-product d-flex">
                    <a href="#">
                        <img src="../admin_area/product_images/bone1.jpg" class="img-fluid" style="height: 100px">
                    </a>
                    <div class="desc">
                        <a href="#" class="title">Bone Lacoste</a>
                        <div class="price">
                            <h6>$189.00</h6>
                            <h6 class="l-through">$210.00</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-4 col-sm-12 col-md-12">
        <div class="ctg-right">
            <a href="#" target="_blank">
                <img class="img-fluid d-block mx-auto" src="../images/foto1.jpg" class="img-fluid">
            </a>
        </div>
    </div>
</div>
</div>


<div id="footer"><!-- footer Starts -->
    <div class="container"><!-- container Starts -->
        <div class="row pt-3">
            <div class="col-md-3 col-sm-6">
                <h4 style="color:red;">Categorias</h4>
                <ul class="navbar-nav" >
                    <?php
                    $sql = "select * from categoria";
                    $query = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($query)){
                        $id = $row['id'];
                        $categoria = $row['categoria'];

                        echo "
                    <li class='nav-item my-2'><a href=\"./shopping/?categoria=$id\" class=\"text-white text-capitalize\">$categoria</a></li>
                    ";
                    }
                    ?>

                </ul><!-- ul Ends -->

                <hr class="hidden-md hidden-lg">

            </div><!-- col-md-3 col-sm-6 Ends -->
            <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

                <h4 style="color: red;">Nosso Endereço</h4>

                <p style="color: white;"><!-- p Starts -->
                    <strong>New Caps Oficial</strong>
                    <br>Matozinhos
                    <br>Minas Gerais
                    <br>CEP:35720-000
                    <br>contato@newcapsoficial.com.br
                </p><!-- p Ends -->

                <a href="../contato/" class="text-capitalize">Va para Pagina de contatos</a>

                <hr class="hidden-md hidden-lg">

            </div><!-- col-md-3 col-sm-6 Ends -->
            <div class="col-md-3">
                <h4 style="color: red;"> Redes Sociais </h4>
                <p class=""><!-- social Starts --->
                    <a href="#"><i><img src="../images/social/facebook.png" alt="facebook"></i></a>
                    <a href="#"><i><img src="../images/social/instagram.png" alt="facebook"></i></a>
                    <a href="#"><i><img src="../images/social/google+.png" alt="facebook"></i></a>
                    <a href="#"><i><img src="../images/social/email.png" alt="facebook"></i></a>
                </p><!-- social Ends --->
            </div>
            <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->
                <h4 class="text-capitalize" style="color: red;">Formas de pagamento</h4>
                <img src="../images/mercado_pago.png" alt="pagamento"
                     class="img-fluid" style="width: 100%"><br>
                <img src="../images/pagseguro.png" alt="pagamento"
                     class="img-fluid" style="width: 100%"><br>
                <hr>
            </div><!-- col-md-3 col-sm-6 Ends -->
        </div><!-- row Ends -->
    </div><!-- container Ends -->
</div>
<div id="copyright" style="background-image: linear-gradient(to right top, #ff0000, #ff0706, #ff0d0d, #ff1312, #ff1717);" ><!-- copyright Starts -->

    <div class="container" ><!-- container Starts -->

        <div class="col-md-6" ><!-- col-md-6 Starts -->

            <p class="pull-left text-capitalize"> &copy; <?php echo date("Y"); ?>
                todos os direitos reservados New Caps Oficial
            </p>

        </div><!-- col-md-6 Ends -->

        <div class="col-md-6 ml-auto" ><!-- col-md-6 Starts -->
            <p class="text-right" >
                Desenvolvido por:<a class="text-dark mx-2" target="_blank" href="https://www.linkedin.com/in/wayster-de-melo-b32278105/" >Wayster H. De Melo</a>
            </p>

        </div><!-- col-md-6 Ends -->

    </div><!-- container Ends -->

</div>

<script src="../js/bootstrap4.1.min.js"></script>
<script src="basic-table.min.js"></script>
<script type="text/javascript">
    $(window).on('load',function () {
        $('#status').fadeOut();
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({ 'overflow' : 'visible'})

        let campo_frete = document.getElementById("fretevalor").value;
        if (campo_frete == ''){
            $('#mp').attr('disabled','disabled');
            $('#pg').attr('disabled','disabled');
        }else {

        }
    });

let frete = document.getElementById("fretePac").innerHTML;
if (frete == '') {
    $('#frete_div').html('');
}else{
}
<<<<<<< HEAD

$('.tableBasic').basictable();
=======
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
</script>
</body>
</html>