<?php
/* Smarty version 3.1.34-dev-7, created on 2021-05-26 00:48:44
  from 'C:\xampp\htdocs\TPE-IMDS\TPE-IMDS-grupo02\PaginaWeb\CooperativaDeReciclaje\templates\formularioRetiro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60ad7ecc51a263_16939250',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8fb0efaacfa9e8358ecb3f5cc90641799ea2e23' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE-IMDS\\TPE-IMDS-grupo02\\PaginaWeb\\CooperativaDeReciclaje\\templates\\formularioRetiro.tpl',
      1 => 1621982357,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:mensaje.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_60ad7ecc51a263_16939250 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body class="fondo">
        <section class="overlay">
            <h2>Retiro de materiales</h2>

            <?php $_smarty_tpl->_subTemplateRender("file:mensaje.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            
            <form action="retiro" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="input_retiro_nombre_fk" placeholder="Nombre" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Apellido</label>
                    <input type="text" class="form-control" name="input_retiro_apellido_fk" placeholder="Apellido"  required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="input_retiro_direccion_fk" placeholder="Dirección" required>
                </div>
                <img src="./img/direccion_cooperativa.jpg">
                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" name="input_retiro_telefono_fk" placeholder="Teléfono" required>
                </div>
                <div class="mb-3">
                    <label for="title">Categoria de volumen</label>
                    <select name="input_retiro_categoria">
                        <option value="a">Entra en una caja</option>
                        <option value="b">Entra en el baúl de un auto</option>
                        <option value="c">Entra en la caja de una camioneta</option>
                        <option value="d">Se necesita un camión</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="title">Franja horaria de retiro</label>
                    <select name="input_franja_horaria" id="">
                        <option value="09:00:00-12:00:00">9:00-12:00</option>
                        <option value="13:00:00-17:00:00">13:00-17:00</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="file" name="imageToUpload" id="imageToUpload">
                </div>
                <div class="col text-center">
                    <button type="submit" class=" btn btn-lg btn-success">Enviar</button>
                </div>
            </form>
        </section>
</body>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
