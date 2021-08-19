{include file="header.tpl"}

<body class="fondo">
        <section class="overlay">
            <h2>Recolección de materiales</h2>

            {include file="mensaje.tpl"}
            
        <div class="mb-3">
            <form action="buscarRecoleccionPorDNI" method="post" class="centrado">
                <div class="mb-3">
                    <label class="form-label">Ingresar cartonero a registrar recolección </label>
                </div>

                <div class="mb-3">
                    <label class="form-label">DNI</label>
                    <input class="form-control" type="text" name="buscarPorDNI" required>
                </div>

                <div class="col text-center">
                    <button type="submit" class=" btn btn-lg btn-success">Seleccionar</button>
                </div>
            </form>

            <table class="table mb-3 table-hover table-borderless">
                    <thead>
                        <tr>
                            <th style="text-align: center;">DNI</th>
                            <th style="text-align: center;">Nombre</th>
                            <th style="text-align: center;">Apellido</th>
                            <th style="text-align: center;">Dirección</th>
                            <th style="text-align: center;">Vehículo</th>
                        </tr>
                    </thead>
                <tbody>
                    {foreach $filas as $fila} 
                    {if $fila->borrado eq 0}
                            <tr>
                                <td style="text-align: center;">{$fila->DNI_cartonero}</td>
                                <td style="text-align: center;">{$fila->nombre_cartonero}</td>
                                <td style="text-align: center;">{$fila->apellido_cartonero}</td>
                                <td style="text-align: center;">{$fila->direccion_cartonero}</td>
                                {if $fila->categoria=="a"}
                                    <td style="text-align: center;"> - </td>
                                {elseif $fila->categoria=="b"}
                                    <td style="text-align: center;">Auto</td>
                                {elseif $fila->categoria=="c"}
                                    <td style="text-align: center;">Camioneta</td>   
                                {elseif $fila->categoria=="d"} 
                                    <td style="text-align: center;">Camión</td>   
                                {/if}
                            </tr>
                    {/if}
                    {/foreach}
                    </tbody>    
            </table>
        </section>
</body>
{include file="footer.tpl"}