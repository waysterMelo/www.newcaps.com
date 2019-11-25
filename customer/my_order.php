<h3 align="center">
    Meus Pedidos
</h3>
<p class="text-muted text-center">
    tem alguma dúvida ? <a href="../contato/">entre em contato</a>
</p>
<hr>
<div class="table-responsive ">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>P.N</th>
                <th>Produto</th>
<<<<<<< HEAD
                <th>Imagem</th>
=======
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
                <th>Valor Total</th>
                <th>Fatura</th>
                <th>Quantidade</th>
                <th>Data do Pedido</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $cliente = $_SESSION['email'];
            $getCliente = "select * from clientes where email = '$cliente'";
            $query = mysqli_query($con,$getCliente);
            $rs = mysqli_fetch_array($query);
            $id = $rs['id'];
            $get_pedidos = "select * from pedidos where cliente_id ='$id'";
            $run = mysqli_query($con, $get_pedidos);
            $i = 0;
            while ($row = mysqli_fetch_array($run)){
                $pedido_id = $row['produto_id'];
                $sub_total = $row['due_amount'];
                $fatura = $row['pedido_number'];
                $qtd = $row['qtd'];
                $size = $row['size_p'];
                $data_pedido = date('d-m-Y', strtotime($row['pedido_data']));
                $status = $row['order_status'];
                $rastreio = $row['rastreio'];

                $getPro = "select * from products where id='$pedido_id'";
                $query = mysqli_query($con,$getPro);
                $rs1 = mysqli_fetch_array($query);
                $nome = $rs1['title'];
                $img = $rs1['img1'];

                $getFrete = "select frete from pedidos where pedido_number = '$fatura' limit 1 ";
                $query2 = mysqli_query($con,$getFrete);
                $rs2 = mysqli_fetch_array($query2);
                $frete = $rs2['frete'];
                $freteComPonto = str_replace(',', '.', $frete);
                $freteNew = substr($freteComPonto, 0, 5);

                $valor_total = $sub_total + $freteNew;


                $getFrete = "select frete from pedidos where pedido_number = '$fatura' limit 1 ";
                $query2 = mysqli_query($con,$getFrete);
                $rs2 = mysqli_fetch_array($query2);
                $frete = $rs2['frete'];
                $freteComPonto = str_replace(',', '.', $frete);

                $valor_total = $sub_total + $freteComPonto;


                $i++;


                ?>

                    <tr class="text-center">
                        <th class="text-center"><?php echo $i; ?></th>
                        <td class="text-center text-capitalize"><?php echo $nome ?></td>
<<<<<<< HEAD
                        <td><img src="../admin_area/product_images/<?php echo $img ?>" width="30px;" height="30px" alt="produto"></td>
=======
>>>>>>> 7ba390ffad33be5d42f726c3dada46d2239d34a9
                        <td class="text-center">R$ <?php echo number_format($valor_total,2,',','.'); ?></td>
                        <td class="text-center"><?php echo $fatura; ?></td>
                        <td class="text-center"><?php echo $qtd; ?></td>
                        <td style="font-size: 12px" class="font-weight-bold"><?php echo $data_pedido; ?></td>
                        <?php
                        if ($status == "Pendente"){
                            echo "<td class='text-center bg-danger font-weight-bold'>Não Pago</td>";
                        }
                        if ($status == "Cancelado"){
                            echo "<td class='text-center bg-danger font-weight-bold'>Cancelado</td>";
                        }
                        if ($status == "Rejeitado"){
                            echo "<td class='text-center bg-danger font-weight-bold'>Rejeitado</td>";
                        }
                        if ($status == "Aprovado"){
                            echo "<td class='text-center bg-success font-weight-bold'>Pago</td>";
                            echo "<td class='text-center bg-primary font-weight-bold'><a href='https://www2.correios.com.br/sistemas/rastreamento/' target='_blank'><span class='text-dark'>Rastreiar</span></a></td>";

                        }
                        ?>
                    </tr>
        <?php }  ?>
        </tbody>
    </table>
</div>