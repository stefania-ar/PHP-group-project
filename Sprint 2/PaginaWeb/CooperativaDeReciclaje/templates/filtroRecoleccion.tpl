{include file="header.tpl"}

<body class="fondo">
        <section class="overlay">
            <h2>Recolección de materiales</h2>

            {include file="mensaje.tpl"}
            
        <div class="mb-3">
            <form action="buscarRecoleccionPorDNI" method="post" class="centrado">
                <div class="mb-3">
                    <label class="form-label">Buscar por DNI del cartonero sus materiales </label>
                </div>

                <div class="mb-3">
                    <label class="form-label">DNI</label>
                    <input class="form-control" type="text" name="buscarPorDNI" required>
                </div>

                <div class="col text-center">
                    <button type="submit" class=" btn btn-lg btn-success">Buscar</button>
                </div>
            </form>

            <table class="table mb-3 table-hover table-borderless">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Peso Material</th>
                            <th>Fecha</th>
                            <th>Nombre Material</th>
                        </tr>
                    </thead>
                <tbody>
                    {foreach $filas as $fila} 
                            <tr>
                                <td>{$fila->DNI_cartonero}</td>
                                <td>{$fila->peso_material_recolectado}</td>
                                <td>{$fila->fecha_recoleccion}</td>
                                <td>{$fila->id_especificacion_material}</td>
                            </tr>
                    {/foreach}
                    </tbody>    
            </table>
        </section>
</body>
{include file="footer.tpl"}