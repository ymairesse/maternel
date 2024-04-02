<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-28 10:03:30
  from '/home/yves/www/maternel/inscription/admin/templates/listeEnvois.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63d4e4e23305f2_17706917',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31902080a31227476231e9daa9883f8883b294a0' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/listeEnvois.tpl',
      1 => 1673634602,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d4e4e23305f2_17706917 (Smarty_Internal_Template $_smarty_tpl) {
?><h4><?php echo count($_smarty_tpl->tpl_vars['listeEnvois']->value);?>
 mail(s) envoyé(s)</h4>

<ul>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeEnvois']->value, 'data', false, 'wtf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['wtf']->value => $_smarty_tpl->tpl_vars['data']->value) {
?>
    <li><?php echo $_smarty_tpl->tpl_vars['data']->value;?>
</li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>

<?php }
}
