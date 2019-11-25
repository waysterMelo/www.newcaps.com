<?php
if(!isset($_SESSION['admin_email']) && (!isset($_SESSION['admin_pass']))){
    echo "<script>window.open(index.php, '_self')</script>";
}else {

?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#user" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Admin Painel</a>
        </div>

    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a id="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"><?php echo $admin_nome;?><b class="caret"></b></i>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="home.php?user_profile=<?php echo $id;?>">
                        <i class="fa fa-fw fa-user"></i>Perfil
                    </a>
                </li>
                <li>
                    <a href="home.php?ver_produtos">
                        <i class="fa fa-fw fa-envelope"></i>Produtos
                        <span class="badge"><?php echo $count_pro; ?></span>
                    </a>
                </li>
                <li>
                    <a href="home.php?ver_clientes">
                        <i class="fa fa-fw fa-gear"></i>Clientes
                        <span class="badge"><?php echo $count_clientes; ?></span>
                    </a>
                </li>
                <li>
                    <a href="home.php?ver_categorias">
                        <i class="fa fa-fw fa-gear"></i>Marcas
                        <span class="badge"><?php echo $count_marcas; ?></span>

                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"> Sair</i>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="collapse-navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="home.php?dashboard">
                    <i class="fa fa-fw fa-dashboard"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#produtos">
                    <i class="fa fa-fw fa-table"></i> Produtos
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="produtos" class="collapse">
                    <li>
                        <a href="home.php?inserir_produtos"> Cadastrar Produtos</a>
                    </li>
                    <li>
                        <a href="home.php?ver_produtos"> Ver produtos</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#categoria">
                    <i class="fa fa-fw fa-pencil"></i> Gêneros
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="categoria" class="collapse">
                    <li>
                        <a href="home.php?inserir_categorias"> Cadastrar</a>
                    </li>
                    <li>
                        <a href="home.php?ver_categorias"> Ver Gêneros</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#marcas">
                    <i class="fa fa-fw fa-star"></i> Marcas
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="marcas" class="collapse">
                    <li>
                        <a href="home.php?inserir_marcas"> Cadastrar Marcas</a>
                    </li>
                    <li>
                        <a href="home.php?ver_marcas"> Ver Marcas</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#slides">
                    <i class="fa fa-fw fa-image"></i> Slides
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="slides" class="collapse">
                    <li>
                        <a href="home.php?inserir_slides"> Cadastrar Slides</a>
                    </li>
                    <li>
                        <a href="home.php?ver_slides"> Ver Slides</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="home.php?ver_pedidos">
                    <i class="fa fa-fw fa-money"></i> Ver Pedidos
                </a>
            </li>
            <li>
                <a href="home.php?ver_clientes">
                    <i class="fa fa-fw fa-list"></i> Ver Clientes
                </a>
            </li>
            <li>
                <a href="home.php?tirar_pedidos">
                    <i class="fa fa-fw fa-money"></i> Tirar Pedido
                </a>
            </li>
            <li>
                <a href="home.php?codigo_rastreio">
                    <i class="fa fa-truck"></i> Rastreiamento
                </a>
            </li>
            <li>
                <a href="https://webmail1.hostinger.com.br/?_task=mail&_mbox=INBOX" target="_blank">
                    <i class="fa fa-fw fa-envelope"></i> Email
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Sair
                </a>
            </li>
        </ul>
    </div>

    </div>
</nav>
<?php } ?>
