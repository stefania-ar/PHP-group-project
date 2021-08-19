<?php
/* Smarty version 3.1.34-dev-7, created on 2021-05-25 21:19:11
  from 'C:\xampp\htdocs\TPE-IMDS\TPE-IMDS-grupo02\Pagina Web\CoperativaDeReciclaje\templates\mensaje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60ad4daf50d947_73654742',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '437178ba37a0b8ed2cbdc94c55bea73fac8fe6b0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE-IMDS\\TPE-IMDS-grupo02\\Pagina Web\\CoperativaDeReciclaje\\templates\\mensaje.tpl',
      1 => 1621969970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60ad4daf50d947_73654742 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['mensaje']->value)) && (isset($_smarty_tpl->tpl_vars['tipoAlerta']->value))) {?>
    <?php if ($_smarty_tpl->tpl_vars['tipoAlerta']->value == "danger") {?>
        <div class="alert alert-danger" role="alert">
    <?php } elseif ($_smarty_tpl->tpl_vars['tipoAlerta']->value == "success") {?>
        <div class="alert alert-success" role="alert">
    <?php }?>
            <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

        </div>
<?php }
}
}
