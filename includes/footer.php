<div id="footer" class="text-center"><!-- footer Starts -->
    <div class="container"><!-- container Starts -->
        <div class="row pt-5">
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
                              <li class='nav-item my-2'><a href=\"./shopping/?categoria=$id\" class=\"text-white text-capitalize\">$categoria</a></li>";
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
                <p class="text-center"><!-- social Starts --->
                    <a href="https://www.facebook.com/jhonatan.stetcar" target="_blank"><i><img src="../images/social/facebook.png" alt="facebook"></i></a>
                    <a href="https://www.instagram.com/newcaps.oficial/" target="_blank"><i><img src="../images/social/instagram.png" alt="facebook"></i></a>
                    <a href="contato@newcapsoficial.com.br" target="_blank"><i><img src="../images/social/email.png" alt="email"></i></a>
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
</div><!-- footer Ends -->

<div id="copyright" style="background-color: transparent" ><!-- copyright Starts -->

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
<script type="text/javascript">
    $(window).on('load',function () {
        $('#status').fadeOut();
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({ 'overflow' : 'visible'})
    });
</script>
</body>
</html>