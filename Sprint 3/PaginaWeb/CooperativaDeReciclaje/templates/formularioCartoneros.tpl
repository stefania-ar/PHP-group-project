
        <section class="overlay">
            <br>
            <h2>Añadir cartonero</h2>
            <br>
            <form action="cartonero" method="post">
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="cartonero_nombre" placeholder="Nombre" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Apellido</label>
                    <input type="text" class="form-control" name="cartonero_apellido" placeholder="Apellido"  required>
                </div>
                <div class="mb-3">
                    <label class="form-label">DNI</label>
                    <input type="number" class="form-control" name="cartonero_dni" placeholder="DNI" required>
                </div>
                <div class="mb-3">
                    <label for="title">Dirección</label>
                    <input type="text" class="form-control" name="cartonero_direccion" placeholder="Dirección" required>
                </div>
                <div class="mb-3">
                    <label for="title">Fecha nacimiento</label>
                    <input type="date" class="form-control" name="cartonero_fecha" required>
                </div>
                
                <div class="mb-3">
                <label for="title">Vehículo</label>
                    <select name="cartonero_select">
                        <option value="a"> - </option>
                        <option value="b">Auto</option>
                        <option value="c">Camioneta</option>
                        <option value="d">Camión</option>
                    </select>
                </div>
                <div class="col text-center">
                    <button type="submit" class=" btn btn-lg btn-success">Enviar</button>
                </div>
            </form>
        </section>
