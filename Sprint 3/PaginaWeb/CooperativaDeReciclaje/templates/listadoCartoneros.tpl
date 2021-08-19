{include file="header.tpl"}

<body class="fondo">
    <section class="overlay">
        <br>
        <h2>Listado de cartoneros</h2>
         <br><br>
        {if isset($tipoAlerta) && $tipoAlerta eq "info"}
            {include file="mensaje.tpl"}
        {else}
            <table class="table mb-3 table table-striped table-success table-hover table-borderless">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center;">DNI</th>
                        <th scope="col" style="text-align: center;">Nombre</th>
                        <th scope="col" style="text-align: center;">Apellido</th>
                        <th scope="col" style="text-align: center;">Dirección</th>
                        <th scope="col" style="text-align: center;">Fecha de nacimiento</th>
                        <th scope="col" style="text-align: center;">Vehículo</th>
                        <th scope="col" style="text-align: center;">Estado</th>
                        <th scope="col"> </th>
                        <th scope="col"> </th>
                    </tr>
                </thead>
                {foreach from=$cartoneros item=cartonero}
                <tbody>
                <tr class="table">
                    <th scope="row" style="text-align: center;">{$cartonero->DNI_cartonero}</th>
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
                    {if $cartonero->borrado == 0}
                        <td style="text-align: center;"> Activo </td>
                    {else}
                        <td style="text-align: center;"> Inactivo </td>
                    {/if}
                    <td style="text-align: center;"><a type="button" href="editar_cartonero/{$cartonero->DNI_cartonero}" class="btn btn-light"><i class="far fa-edit"></i></a></td>
                    <td style="text-align: center;"><a type="button" href="borrar_cartonero/{$cartonero->DNI_cartonero}" class="btn btn-light"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                </tbody>
                {/foreach}
            </table>
            {include file="mensaje.tpl"}
        {/if}
        {include file="formularioCartoneros.tpl"}
    </section>
</body>
{include file="footer.tpl"}