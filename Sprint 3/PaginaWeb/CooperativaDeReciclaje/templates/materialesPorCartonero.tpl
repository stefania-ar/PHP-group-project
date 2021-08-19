{include file="header.tpl"}

<body class="fondo">
    <section class="overlay">
        <br>
        <h2>Materiales acopiados</h2>
         <br><br>
        {if isset($mensaje)}
            {include file="mensaje.tpl"}
        {else}
        <div style="padding: 0vw 15vw 5vw 15vw">
            {foreach from=$cartoneros item=cartonero}
                <table class="table mb-3 table table-striped table-success table-hover table-borderless">
                <thead>
                    <tr>
                        <th>
                            Cartonero: {$cartonero->nombre_cartonero} {$cartonero->apellido_cartonero} - 
                            DNI: {$cartonero->DNI_cartonero}
                        </th>                 
                    </tr>
                    <tr>    
                        <th style= "text-align: center;">Material</th>
                        <th style= "text-align: center;">Total</th>
                    </tr>
                </thead>
                <tbody>
                {foreach from=$materiales item=material}
                    {if $material->DNI_cartonero eq $cartonero->DNI_cartonero}
                    <tr class="table">
                        <td style= "text-align: center;">{$material->material_recolectado}</td>
                        <td style= "text-align: center;">{$material->sumatoria}</td>
                    </tr>
                    {/if}
                {/foreach}
                </tbody>
                </table>
                <br><br>
            {/foreach}
            </div>
        {/if}
    </section>
</body>
{include file="footer.tpl"}