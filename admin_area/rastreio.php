<?php
    if (isset($_POST['searchOrder'])){
    $pedido = $_POST['pedido'];
    $sql = "SELECT * from clientes b INNER JOIN pedidos a on b.id 
= a.cliente_id where a.pedido_number ='$pedido'";
    $run = mysqli_query($con,$sql);
    $rs = mysqli_fetch_array($run);
    $nome = $rs['nome'];
    $email = $rs['email'];
    $pedido = $rs['pedido_number'];
    $data = $rs['pedido_data'];

    $sql2 = "select sum(due_amount) as total from pedidos where pedido_number = '$pedido'";
    $run2 = mysqli_query($con,$sql2);
    $rs2 = mysqli_fetch_array($run2);
    $total = $rs2['total'];
}
?>
<div class="panel">
    <div class="panel-heading">
        <span>Inserir codigo de rastreio </span><i class="fa fa-truck"></i>
    </div>
    <?php
    ?>
    <div class="panel-body">
        <form action="" class="form-inline" method="post">
            <div class="form-group" style="margin-bottom: 30px">
                <label for="pedido">digite o pedido</label>
                <input name="pedido" type="text" class="form-control" id="pedido">
                <button type="submit" name="searchOrder" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
        </form>
        <div class="table-responsive">
                <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center">pedido</th>
                        <th class="text-center">email</th>
                        <th class="text-center">cliente</th>
                        <th class="text-center">data</th>
                        <th class="text-center">valor total</th>
                        <th class="text-center">inserir codigo rastreio</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?=@$pedido?></td>
                    <td><?=@$email?></td>
                    <td><?=@$nome?></td>
                    <td><?=@$data?></td>
                    <td>R$ <?=@$total?></td>
                   <td class="text-center"><a href="home.php?inserir_rastreio&pedido=<?=$pedido?>" class="btn btn-primary"><i class="fa fa-sticky-note"></i></a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>