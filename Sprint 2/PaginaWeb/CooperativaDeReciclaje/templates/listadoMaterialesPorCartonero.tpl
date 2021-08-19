{include file="header.tpl"}
<body class="fondo">
<section class="overlay">
    <h2>Recolección de materiales</h2>

    {include file="mensaje.tpl"}
    <br><br>
    <h4>Datos personales:</h4>

    <br>
    <table class="table table-striped table-success table-hover table-borderless">
        <thead>
               <tr>
                   <th style="text-align: center;">DNI</th>
                   <th style="text-align: center;">Nombre</th>
                   <th style="text-align: center;">Apellido</th>
                   <th style="text-align: center;">Dirección</th>
                   <th style="text-align: center;">Fecha de nacimiento</th>
               </tr>
        </thead>
        <tbody>
                <tr>
                    <th style="text-align: center;">{$cartonero->DNI_cartonero}</th>
                    <th style="text-align: center;">{$cartonero->nombre_cartonero}</th>
                    <th style="text-align: center;">{$cartonero->apellido_cartonero}</th>
                    <th style="text-align: center;">{$cartonero->direccion_cartonero}</th>
                    <th style="text-align: center;">{$cartonero->fecha_nac_cartonero}</th>
                </tr>
        </tbody>  
    </table>

    <br><br>
    <h4>Información sobre recolecciones:</h4>
    <br>
    <table class="table mb-3 table-hover table-borderless">
           <thead>
               <tr>
                   <th>Fecha de recolección</th>
                   <th>Nombre Material</th>
                   <th>Peso Material</th>
               </tr>
           </thead>
       <tbody>
        {foreach $filas as $fila} 
                <tr>
                    <td>{$fila->fecha_recoleccion}</td>
                    <td>{$fila->id_especificacion_material}</td>
                    <td>{$fila->peso_material_recolectado}</td>
                </tr>
        {/foreach}
        </tbody>    
    </table>
    <br><br>
    {include file="formularioRecoleccion.tpl"}
    <br>
           
</section>
</body>
{include file="footer.tpl"}   