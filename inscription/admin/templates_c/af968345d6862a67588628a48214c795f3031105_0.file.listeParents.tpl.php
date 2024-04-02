<?php
/* Smarty version 3.1.32-dev-38, created on 2022-12-24 14:51:28
  from '/home/yves/www/maternel/inscription/admin/templates/inc/listeParents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63a703e0be1a83_38128074',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af968345d6862a67588628a48214c795f3031105' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/inc/listeParents.tpl',
      1 => 1671874161,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63a703e0be1a83_38128074 (Smarty_Internal_Template $_smarty_tpl) {
if (count($_smarty_tpl->tpl_vars['listeParents']->value) > 0) {?>
<select size="<?php echo count($_smarty_tpl->tpl_vars['listeParents']->value);?>
" id="selParents" name="selParents" style="width:100%; border: 2px solid rgb(0, 200, 0); padding-left:0.5em;">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeParents']->value, 'data', false, 'idInscription', 'parents', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['idInscription']->value => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_parents']->value['iteration']++;
?>

    <option value="<?php echo $_smarty_tpl->tpl_vars['idInscription']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['data']->value['nomEnfant'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['prenomEnfant'];?>
" data-toggle="popover">
        <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_parents']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_parents']->value['iteration'] : null);?>
. <?php if ($_smarty_tpl->tpl_vars['data']->value['salutation'] == 'Monsieur') {?>M. <?php } else { ?>Mme<?php }?> 
        <?php echo $_smarty_tpl->tpl_vars['data']->value['nomParent'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['prenomParent'];?>
 
        -> <?php echo $_smarty_tpl->tpl_vars['data']->value['nomEnfant'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['prenomEnfant'];?>

    </option>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select>
<?php } else { ?> 

<?php }?>

<?php }
}
