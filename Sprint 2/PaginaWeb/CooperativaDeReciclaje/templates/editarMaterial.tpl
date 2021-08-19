{include file="header.tpl"}

<body class="fondo">
    <section class="overlay">
   
        <h2>Editar Material</h2>
        {include file="mensaje.tpl"}
        <table class="table mb-3">
            <tbody>
            <tr class="table-warning">
                <th scope="row">{$material->nombre_mat}</th>
                <td>{$material->detalle}</td>
                <td>{$material->forma_entrega}</td>
                <td>{$material->no_aceptado}</td>
                <td><img style="max-width: 200px; max-height: 200px;" src="{$material->imagen_material}"></td>
            </tr>
            </tbody>
        </table>

        <h2>Nuevos Datos</h2>
        <form action="modificar_material" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre material</label>
                <input type="text" class="form-control" name="material_nombre" value="{$material->nombre_mat}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Detalle</label>
                <textarea type="text" class="form-control" name="material_detalle" rows="3" required>{$material->detalle}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Forma de entrega</label>
                <textarea type="text" class="form-control" name="material_formaEntrega" rows="3" required>{$material->forma_entrega}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Como no se acepta</label>
                <textarea type="text" class="form-control" name="material_noAceptado" rows="3" required>{$material->no_aceptado}</textarea>
            </div>
            <div class="mb-3">
                <img style="max-width: 200px; max-height: 200px;" src="{$material->imagen_material}">
                <input type="file" name="material_imagen" id="imageToUpload">
            </div>
            <div class="col text-center">
                <button value="{$material->id_especificacion}" name="material_id" type="submit" class="btn btn-lg btn-success">Editar</button>
            </div>
        </form>
    </section>
</body>
{include file="footer.tpl"}