<?php

/* Iniciando classe */
include "../classes/compra.class.php";
$classeCompra = new compra();

$idCliente = 1;

$classeCompra->idCliente = $idCliente;

?>

<thead>
    <tr>
    <th scope="col">Cód</th>
    <th scope="col">Data / Hora</th>
    <th scope="col">Status pagamento</th>
    <th scope="col">Status Entrega</th>
    <th scope="col"></th>
    <th scope="col"></th>
    </tr>
</thead>

<tbody>

<?php
                        
foreach($classeCompra->retorna_pedidos_por_cliente() as $arrPedido){

    $data = new DateTime($arrPedido["data_hora"]);
    $referencia = $arrPedido["id"];

?>

    <tr>
    <th class="align-middle" scope="row"><?php echo $arrPedido["id"] ?></th>
    <td class="align-middle"><?php echo $data->format('d/m/Y H:i');?></td>
    <td class="align-middle <?php
    
    if($classeCompra->organizar_status_pagseguro($classeCompra->retornar_status_compra_pagseguro($arrPedido["id"])) == "Paga"){

        echo "text-success";

    }else if($classeCompra->organizar_status_pagseguro($classeCompra->retornar_status_compra_pagseguro($arrPedido["id"])) == "Aguardando pagamento"){

        echo "text-info";

    }else if($classeCompra->organizar_status_pagseguro($classeCompra->retornar_status_compra_pagseguro($arrPedido["id"])) == "Não finalizada"){

        echo "text-black-50";

    }
    
    ?>"><?php
    
    /* echo $classeCompra->retornar_status_compra_pagseguro($arrPedido["id"]); */
    echo $classeCompra->organizar_status_pagseguro($classeCompra->retornar_status_compra_pagseguro($arrPedido["id"]));
    
    ?></td>
    <td class="align-middle"><?php echo $arrPedido["status_entrega"] ?></td>
    <td><?php
    
    if($classeCompra->organizar_status_pagseguro($classeCompra->retornar_status_compra_pagseguro($arrPedido["id"])) == "Não finalizada"){

    ?>

        <button onclick="window.location='php/apagarPedidoAoCancelar.php?idU=<?php echo $idCliente; ?>&referencia=<?php echo $referencia; ?>&ind=sim'" type="button" class="btn btn-danger btn-sm">Apagar</button>

    <?php

    }
    
    ?></td>
    <td><?php
    
    if($classeCompra->organizar_status_pagseguro($classeCompra->retornar_status_compra_pagseguro($arrPedido["id"])) == "Não finalizada"){

    ?>

        <button type="button" class="btn btn-primary btn-sm" disabled>Detalhes</button>

    <?php

    }else{

    ?>

        <button type="button" class="btn btn-primary btn-sm">Detalhes</button>

    <?php

    }
    
    ?></td>
    </tr>

<?php

}

?>

</tbody>