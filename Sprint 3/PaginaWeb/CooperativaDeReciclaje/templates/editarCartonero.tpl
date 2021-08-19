{include file="header.tpl"}

<body class="fondo">
    <section class="overlay">
        <h2>Editar cartonero</h2>
        <br>
        {include file="mensaje.tpl"}
        <table class="table mb-3 table table-striped table-success table-hover table-borderless">
            <thead>
                <tr>
                    <th style="text-align: center;">DNI</th>
                    <th style="text-align: center;">Nombre</th>
                    <th style="text-align: center;">Apellido</th>
                    <th style="text-align: center;">Dirección</th>
                    <th style="text-align: center;">Fecha de nacimiento</th>
                    <th style="text-align: center;">Vehículo</th>
                    <th style="text-align: center;">Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="text-align: center;">{$cartonero->DNI_cartonero}</th>
                    <td style="text-align: center;">{$cartonero->nombre_cartonero}</td>
                    <td style="text-align: center;">{$cartonero->apellido_cartonero}</td>
                    <td style="text-align: center;">{$cartonero->direccion_cartonero}</td>
                    <td style="text-align: center;">{$cartonero->fecha_nac_cartonero}</td>
                    {if $cartonero->categoria=="a"}
                        <td style="text-align: center;"> - </td>
                    {elseif $cartonero->categoria=="b"}
                        <td style="text-align: center;">Auto</td>
                    {elseif $cartonero->categoria=="c"}
                        <td style="text-align: center;">Camioneta</td>
                    {elseif $cartonero->categoria=="d"}
                        <td style="text-align: center;">Camión</td>
                    {/if}
                    {if $cartonero->borrado==0}
                        <td style="text-align: center;"> Activo </td>
                    {else}
                        <td style="text-align: center;"> Inactivo </td>
                    {/if}
                </tr>
            </tbody>
        </table>
        <br>
        <h2>Nuevos Datos</h2>
        <br>
        <form action="modificar_cartonero" method="post" enctype="multipart/form-data">
            <div class="ocultar">
                <label class="form-label">DNI cartonero</label>
                <input type="number" class="form-control" name="cartonero_DNI" value="{$cartonero->DNI_cartonero}"
                    required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre cartonero</label>
                <input type="text" class="form-control" name="cartonero_nombre" value="{$cartonero->nombre_cartonero}"
                    required>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido cartonero</label>
                <input type="text" class="form-control" name="cartonero_apellido"
                    value="{$cartonero->apellido_cartonero}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Direccion cartonero</label>
                <input type="text" class="form-control" name="cartonero_direccion"
                    value="{$cartonero->direccion_cartonero}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento cartonero</label>
                <input type="date" class="form-control" name="cartonero_fecha_nac"
                    value="{$cartonero->fecha_nac_cartonero}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Vehículo</label>
                <select name="cartonero_categoria">
                    {if $cartonero->categoria eq "a"}
                        <option value="a" selected> - </option>
                        <option value="b">Auto</option>
                        <option value="c">Camioneta</option>
                        <option value="d">Camión</option>
                    {else if $cartonero->categoria eq "b"}
                        <option value="a"> - </option>
                        <option value="b" selected>Auto</option>
                        <option value="c">Camioneta</option>
                        <option value="d">Camión</option>
                    {else if $cartonero->categoria eq "c"}
                        <option value="a"> - </option>
                        <option value="b">Auto</option>
                        <option value="c" selected>Camioneta</option>
                        <option value="d">Camión</option>
                    {else}
                        <option value="a"> - </option>
                        <option value="b">Auto</option>
                        <option value="c">Camioneta</option>
                        <option value="d" selected>Camión</option>
                    {/if}
                </select>
            </div>
            {if $cartonero->borrado==1}
                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <select name="cartonero_borrado">
                    {if $cartonero->borrado==0}
                        <option value=0 selected>Activo</option>
                        <option value=1>Inactivo</option>
                    {else}
                        <option value=0>Activo</option>
                        <option value=1 selected>Inactivo</option>
                    {/if}
                    </select>
                </div>
            {else}
                <div class="ocultar">
                    <label class="form-label">Borrado</label>
                    <select name="cartonero_borrado">
                        <option value="{$cartonero->borrado}">No</option>
                    </select>
                </div>
            {/if}
            <div class="col text-center">
                <button type="submit" class="btn btn-lg btn-success">Editar</button>
            </div>
        </form>
    </section>
</body>
{include file="footer.tpl"}