<?php
/* Smarty version 3.1.34-dev-7, created on 2021-05-26 01:38:53
  from 'C:\xampp\htdocs\TPE_IMDS\TPE-IMDS-grupo02\PaginaWeb\CooperativaDeReciclaje\templates\mensaje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60ad8a8deef6e9_59922116',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a3cb515c23747f91541080a6506483b7d6b24f3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_IMDS\\TPE-IMDS-grupo02\\PaginaWeb\\CooperativaDeReciclaje\\templates\\mensaje.tpl',
      1 => 1621984186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60ad8a8deef6e9_59922116 (Smarty_Internal_Template $_smarty_tpl) {
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
