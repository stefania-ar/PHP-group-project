<?php
/* Smarty version 3.1.34-dev-7, created on 2021-05-26 00:48:44
  from 'C:\xampp\htdocs\TPE-IMDS\TPE-IMDS-grupo02\PaginaWeb\CooperativaDeReciclaje\templates\mensaje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60ad7ecc7ab891_05977741',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e0a60f86d481b859bf800fbb9477272b44656f5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE-IMDS\\TPE-IMDS-grupo02\\PaginaWeb\\CooperativaDeReciclaje\\templates\\mensaje.tpl',
      1 => 1621969970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60ad7ecc7ab891_05977741 (Smarty_Internal_Template $_smarty_tpl) {
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
