<h4> Formulario de registro de kilaje: </h4>
<br>
<form action="recoleccion" method="post">
    <div class="mb-3">
        <label class="form-label">Nombre: {$cartonero->apellido_cartonero}  {$cartonero->nombre_cartonero}</label>
        <input type="hidden" class="form-control" name="input_recoleccion_dni_cartonero_fk"
            value="{$cartonero->DNI_cartonero}" placeholder="{$cartonero->DNI_cartonero}" required>
    </div>

    <label class="form-label">Material recolectado </label>
    <select name="input_recoleccion_material" id="materiales_s" required>
        <option value="" selected></option>
        {foreach from=$materiales item=material}
        <option value="{$material->nombre_mat}">{$material->nombre_mat}</option>
        {/foreach}
    </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Peso </label>
        <input type="number" class="form-control" name="input_recoleccion_peso"
            placeholder="Ingresar kilos del material" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha de recolección </label>
        <input type="date" class="form-control" name="input_recoleccion_fecha" required>
    </div>

    <div class="col text-center">
        <button type="submit" class=" btn btn-lg btn-success">Enviar</button>
    </div>
</form>