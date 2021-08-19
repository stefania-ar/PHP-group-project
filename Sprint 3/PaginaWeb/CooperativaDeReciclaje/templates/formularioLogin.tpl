{include file="header.tpl"}

<body class="fondo">
    <section class="overlay">
        <h2>Iniciar Sesión</h2>
        {include file="mensaje.tpl"}
        <form action="verificarUsuario" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="inputPassword">
            </div>
            <button type="submit" class="btn btn-success">Ingresar</button>
        </form>
    </section>
</body>

{include file="footer.tpl"}