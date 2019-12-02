<?php
session_start();
$sId = session_id();
$email = $_SESSION['email'];
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
    <link rel="stylesheet" href="../styles/estilo7.css">
    <link rel="stylesheet" href="../styles/bootstrap4.1.min.css">
    <link rel="stylesheet" href="../styles/jquery-confirm.min.css">
    <script src="../js/jquery-confirm.min.js"></script>
    <link rel="stylesheet" href="cart_responsive1.css">
    <link rel="stylesheet" href="table-basic.css">
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
    <img src="../images/logo.png" alt="Logo new caps" class="d-block w-25 mr-5">
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

<div class="container my-3" style="background-color: black">
    <div class="row">
       <div class="col-md-12">
           <div class="py-5 text-center">
               <h1 class="text-white">Calcule o valor do seu frete <i class="fa fa-truck text-primary ml-5"></i></h1>
               <hr color="white">
           </div>
       </div>
    </div>
    <div class="row justify-content-center">
        <div class="">
          <div class="card py-5 bg-light mb-5" style="width: 24rem">
              <form action="" class="form-inline mb-3" method="post">
                  <div class="form-group text-left text-capitalize">
                      <label for="cep" class="mx-2">digite seu cep</label>
                      <input class="form-control mx-auto border-secondary" type="text" id="cep" name="cep">
                      <button type="submit" name="calcular_frete" class="btn btn-danger"><i class="fa fa-search"></i></button>
                  </div>
              </form>
              <?php
              if (isset($_POST['calcular_frete'])) {

                  $cep_origem = "35720000";     // Seu CEP , ou CEP da Loja
                  $cep_destino = $_POST['cep']; // CEP do cliente, que irá vim via POST
                  /* DADOS DO PRODUTO A SER ENVIADO */
                  $peso = .2;
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
              <div class="cad-footer">
                  <div class="">
                      <div class="form-group row justify-content-center frete_show">
                              <form action="" class="" method="post" enctype="multipart/form-data">
                                  <div class="text-center" style="font-size: 18px; width: auto">
                                      <div class="text-dark pb-3">
                                          <input type="checkbox" name="freteInput[]" class="form-check-input" value="<?php echo @$valordofretePac?>,<?= @$prazoPac?>,<?=@$pac?>">
                                          <b class="text-danger">Pac:</b> R$ <span id="fretePac" class="py-5"><?php echo @$valordofretePac?></span>
                                          <span id="prazoPac" class="py-5">Prazo: <?php echo @$prazoPac?> dia(s)</span>
                                      </div>
                                      <div class="text-dark">
                                          <input type="checkbox" name="freteInput[]" class="form-check-input" value="<?php echo @$valordofreteSedex?>,<?= @$prazoSedex?>,<?=@$sedex?>">
                                          <span class="py-5 custom-checkbox"><b class="text-primary">Sedex:</b> R$ <?php echo @$valordofreteSedex ?></span>
                                          <span class="py-5">Prazo: <?php echo @$prazoSedex ?> dia(s)</span>
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
                                      echo "
                                    <script>window.open('../pedido.php?frete_valor=$v&email=$email','_self')</script>
                                  ";
                                  }
                              }
                              ?>
                      </div>

                  </div>
              </div>
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

    $('.tableBasic').basictable();
</script>
</body>
</html>