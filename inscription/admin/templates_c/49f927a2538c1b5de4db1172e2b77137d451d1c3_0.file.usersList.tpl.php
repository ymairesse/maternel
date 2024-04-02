<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-02 17:43:01
  from '/home/yves/www/maternel/inscription/admin/templates/modal/usersList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63b30995bcb651_95719911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '49f927a2538c1b5de4db1172e2b77137d451d1c3' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/modal/usersList.tpl',
      1 => 1670700378,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63b30995bcb651_95719911 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usersList']->value, 'unUser', false, 'userName');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['userName']->value => $_smarty_tpl->tpl_vars['unUser']->value) {
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
" data-nom="<?php echo $_smarty_tpl->tpl_vars['unUser']->value['nom'];?>
" data-prenom="<?php echo $_smarty_tpl->tpl_vars['unUser']->value['prenom'];?>
" data-mail="<?php echo $_smarty_tpl->tpl_vars['unUser']->value['mail'];?>
">
    <?php echo $_smarty_tpl->tpl_vars['unUser']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['unUser']->value['prenom'];?>

</option>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
