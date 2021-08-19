{include file="header.tpl"}
<body class="fondo">
    <section class="overlay">
        <h2>Listado de pedidos de retiro</h2>
        <table class="table mb-3">
            <thead>
                <tr>
                <th scope="col">Categoria</th>
                <th scope="col">Inicio del Horario de Retiro</th>
                <th scope="col">Finalización de Horario de Retiro</th>
                <!--<th scope="col">DNI del Cartonero</th>
                <th scope="col">Usuario</th>-->
                <th scope="col">Imagen</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$pedidos item=pedido}
                    <tr class="table">
                        {if $pedido->categoria=="a"}
                            <td>Entra en una caja</td>
                        {elseif $pedido->categoria=="b"}
                            <td>Entra en el baúl de un auto</td>
                        {elseif $pedido->categoria=="c"}
                            <td>Entra en la caja de una camioneta</td>   
                        {elseif $pedido->categoria=="d"} 
                            <td>Es necesario un camión</td>   
                        {/if}
                        <td>{$pedido->inicio_horario_retiro}</td>
                        <td>{$pedido->fin_horario_retiro}</td>
                        <!--<td>{$pedido->DNI_cartonero}</td>
                        <td>{$pedido->id_usuario}</td>-->
                        {if $pedido->foto!==null}
                        <td><img style="width: 200px; height: 200px;" src="{$pedido->foto}"></td>
                        {/if}
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </section>
</body>
{include file="footer.tpl"}