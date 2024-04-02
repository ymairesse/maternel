<?php
/* Smarty version 3.1.32-dev-38, created on 2022-12-24 13:18:17
  from '/home/yves/www/maternel/inscription/admin/templates/inc/tableauModalDatesRV.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63a6ee09c3add7_16708123',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf88959cb082eb3daed7e94fd6dfa2afa81f2eb5' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/inc/tableauModalDatesRV.tpl',
      1 => 1671876015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63a6ee09c3add7_16708123 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table table-striped">
  <thead>
    <tr>
      <th style="width:2em"><span class="badge badge-primary"><?php echo count($_smarty_tpl->tpl_vars['datesRV']->value);?>
</span></th>
      <th>Date</th>
      <th>Heure</th>
      <th>Occupation</th>
      <th style="width:2em">&nbsp;</th>
      <th style="width:1em">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['datesRV']->value, 'data', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['data']->value) {
?>
    <tr data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-daterv="<?php echo $_smarty_tpl->tpl_vars['data']->value['date'];?>
" data-heure="<?php echo $_smarty_tpl->tpl_vars['data']->value['heure'];?>
" data-nbplaces="<?php echo $_smarty_tpl->tpl_vars['data']->value['nbPlaces'];?>
"
      data-nbrv="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['nbRV4date']->value[$_smarty_tpl->tpl_vars['id']->value]['nb'])===null||$tmp==='' ? 0 : $tmp);?>
">
      <td>
        <button type="button" class="btn btn-danger btn-xs btn-delRV" <?php if (isset($_smarty_tpl->tpl_vars['datesAvecRV']->value[$_smarty_tpl->tpl_vars['id']->value])) {?> disabled<?php }?>><i
            class="fa fa-times"></i></button>
      </td>
      <td><?php echo $_smarty_tpl->tpl_vars['data']->value['date'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['data']->value['heure'];?>
</td>
      <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['nbRV4date']->value[$_smarty_tpl->tpl_vars['id']->value]['nb'])===null||$tmp==='' ? 0 : $tmp);?>
 / <?php echo $_smarty_tpl->tpl_vars['data']->value['nbPlaces'];?>
</td>
      <td>
        <div class="btn-group">
          <button type="button" class="btn btn-success btn-xs btn-editRV" title="Cliquer pour modifier">
            <i class="fa fa-check"></i>
          </button>
      </td>
      <td>
        <a type="button" class="btn btn-warning btn-xs btn-pdfParents"
          href="/maternel/inscription/admin/inc/listeParentsPDF.php?idRV=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" 
          <?php if (!isset($_smarty_tpl->tpl_vars['datesAvecRV']->value[$_smarty_tpl->tpl_vars['id']->value])) {?> disabled<?php }?>>
          <i class="fa fa-file-pdf-o"></i>
        </a>
      </td>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </tbody>
</table><?php }
}
