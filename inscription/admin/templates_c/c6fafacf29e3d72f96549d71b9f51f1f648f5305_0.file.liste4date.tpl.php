<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-06 15:24:24
  from '/home/yves/www/maternel/inscription/admin/templates/inc/liste4date.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63b82f18050332_27574357',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6fafacf29e3d72f96549d71b9f51f1f648f5305' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/inc/liste4date.tpl',
      1 => 1673015052,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63b82f18050332_27574357 (Smarty_Internal_Template $_smarty_tpl) {
?><form id="formList2cancel">
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Nom du parent</th>
        <th>Nom de l'enfant</th>
        <th>Date de naissance</th>
        <th><input type="checkbox" id="cbAllDate" title="cocher/décocher tout"></th>
      </tr>
    </thead>
    <tbody>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['liste4date']->value, 'data', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['data']->value) {
?>
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['prenomParent'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['nomParent'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['prenomEnfant'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['nomEnfant'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['dateNaissance'];?>
</td>
        <td><input type="checkbox" name="cbDate[]" class="cbDate" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" checked="true"></td>
      </tr>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
  </table>
</form>
<?php }
}
