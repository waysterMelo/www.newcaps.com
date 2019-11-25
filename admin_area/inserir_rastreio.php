<div style="padding-top: 10%">
    <?php
        @$pedido = $_GET['pedido'];
        $sql = "select * from pedidos a inner join clientes b on a.cliente_id = b.id where pedido_number = '$pedido'";
        $run = mysqli_query($con,$sql);
        $rs = mysqli_fetch_array($run);
        $cliente = $rs['nome'];
        $email  = $rs['email'];
        $data = $rs['pedido_data'];

        $sql2 = "select sum(due_amount) as total from pedidos where pedido_number = '$pedido'";
        $run2 = mysqli_query($con,$sql2);
        $rs2 = mysqli_fetch_array($run2);
        $total = $rs2['total'];
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span>Pedido</span>
        </div>
        <div class="panel-body panel-primary">
            <form action="" class="form-horizontal" method="post">
                <div class="col-lg-4">
                    <h4>Cliente</h4>
                    <span class="label label-danger">Nome</span> <b><?=$cliente?></b><br>
                    <span class="label label-info">Email</span> <b><?=$email?></b><br>
                </div>

                <div class="col-lg-4">
                    <h4>Pedido</h4>
                    <span class="label label-primary">Numero</span> <b><?=$pedido?></b><br>
                    <span class="label label-success">Valor Total</span> <b>R$<?=$total?></b><br>
                    <span class="label label-warning">Data</span> <b><?=$data?></b><br>
                </div>

                <div class="col-lg-4 text-center">
                    <h4>Inserir código de rastreio</h4>
                    <div class="form-group text-center">
                        <label class="label label-success">Codigo</label>
                        <input name="code" type="text" class="form-control" style="margin-top: 5px">
                        <button style="margin-top: 6px" type="submit" name="inserir" class="btn btn-info"><i class="fa fa-plus"></i> inserir</button>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_POST['inserir'])){
                $code = $_POST['code'];
                $sql  = "update pedidos set rastreio = '$code' where pedido_number = '$pedido'";
                $run= mysqli_query($con,$sql);
                if ($run){
                    echo "
                <script>alert('Codigo inserido com sucesso')</script>";}
                echo "<script>window.open('home.php?dashboard','_self')</script>";
            }
            ?>
        </div>
    </div>
</div>