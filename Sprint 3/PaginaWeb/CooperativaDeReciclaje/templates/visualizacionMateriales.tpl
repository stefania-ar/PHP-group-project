{include file="header.tpl"}

<body class="fondo">
    <section class="overlay">
   
        <h2>¿Qué podemos reciclar?</h2>
        {include file="mensaje.tpl"}
        
        <table class="table mb-3">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Forma de entrega</th>
                    <th scope="col">No aceptamos</th>
                    <th scope="col">Imagen</th>
                    {if $logged}
                    <th scope="col"> </th>
                    <th scope="col"> </th>
                    {/if}
                </tr>
            </thead>
            {foreach from=$materiales item=material}
            <tbody>
            <tr class="table-warning">
                <th scope="row">{$material->nombre_mat}</th>
                <td>{$material->detalle}</td>
                <td>{$material->forma_entrega}</td>
                <td>{$material->no_aceptado}</td>
                <td><img style="max-width: 200px; max-height: 200px;" src="{$material->imagen_material}"></td>
                {if $logged}
                <td><a type="button" href="editar_material/{$material->id_especificacion}" class="btn btn-light"><i class="far fa-edit"></i></a></td>
                <td><a type="button" href="borrar_material/{$material->id_especificacion}" class="btn btn-light"><i class="fas fa-trash-alt"></i></a></td>
                {/if}
            </tr>
            </tbody>
            {/foreach}
        </table>
        {if $logged}
        <form action="material_aceptado" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre material</label>
                <input type="text" class="form-control" name="material_nombre" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Detalle</label>
                <textarea type="text" class="form-control" name="material_detalle" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Forma de entrega</label>
                <textarea type="text" class="form-control" name="material_formaEntrega" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Como no se acepta</label>
                <textarea type="text" class="form-control" name="material_noAceptado" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                    <input type="file" name="material_imagen" id="imageToUpload">
                </div>
            <div class="col text-center">
                <button type="submit" class=" btn btn-lg btn-success">Agregar</button>
            </div>
        </form>
        {/if}

    </section>
</body>
{include file="footer.tpl"}