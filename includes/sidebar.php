<div class="row">
    <section id="ladodireito" class="py-4 col-6 col-lg-12 col-md-12">
        <div class="card sidebar-menu">
            <div class="card-heading" style="background-image: linear-gradient(to bottom, #ff0000, #ff0706, #ff0d0d, #ff1312, #ff1717);">
                <h4 class="card-title font-weight-bold ml-3 pt-2">
                    Marcas
                </h4>
            </div>
            <div class="card-body">
                <ul class="nav flex-column">
                    <?php
                    global $db;
                    $sql = "select * from product_marcas";
                    $query  = mysqli_query($db,$sql);
                    while($row = mysqli_fetch_array($query)){
                        $marcas_id =$row['p_cat_id'];
                        $nome = $row['p_cat_title'];

                        echo "
             <li class='nav-item'>                 
             <a class='nav-link' href=\"?marca=$marcas_id\">
             $nome
             </a>
             </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </section>
    <section id="ladodireito2" class="py-4 col-6 col-lg-12 col-md-12">
        <div class="card sidebar-menu">
            <div class="card-heading" style="background-image: linear-gradient(to bottom, #ff0000, #ff0706, #ff0d0d, #ff1312, #ff1717);">
                <h4 class="card-title font-weight-bold ml-3 pt-2">
                    Categorias
                </h4>
            </div>
            <div class="card-body">
                <ul class="nav flex-xl-column">
                    <?php
                    global $db;
                    $sql = "select * from categoria";
                    $query  = mysqli_query($db,$sql);
                    while($row = mysqli_fetch_array($query)){
                        $id = $row['id'];
                        $nome = $row['categoria'];
                        echo "
             <li class='nav-item'>
             <a class='nav-link' href=\"?categoria=$id\">
             $nome
             </a>
             </li>  ";} ?>
                </ul>
            </div>
        </div>
    </section>
</div>