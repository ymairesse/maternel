<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-06 16:54:28
  from '/home/yves/www/maternel/inscription/admin/templates/inc/allRowsTableauAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63b84434c77407_60589919',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4e6027888421b639398642b76a059180b3d6c46' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/inc/allRowsTableauAdmin.tpl',
      1 => 1673019777,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63b84434c77407_60589919 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeDemandes']->value, 'data', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['data']->value) {
?>
    <?php $_smarty_tpl->_assignInScope('statut', (($tmp = @$_smarty_tpl->tpl_vars['data']->value['statut'])===null||$tmp==='' ? Null : $tmp));?>
    <tr data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['statut']->value;?>
">
        <td><input type="checkbox" name="selection[]" class="selection" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['statut'] == 'rvInscription') {?>disabled<?php }?>></td>
        <td data-value="<?php echo $_smarty_tpl->tpl_vars['data']->value['dateSQL'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['date'];?>
</td>
        <td><?php if (($_smarty_tpl->tpl_vars['data']->value['salutation'] == 'Madame')) {?>Mme<?php } else { ?>M.<?php }?></td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['nomParent'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['prenomParent'];?>
</td>
        <td><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['data']->value['mail'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['mail'];?>
</a></td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['telephone'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['prenomEnfant'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['nomEnfant'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['sexe'];?>
</td>
        <td data-value="<?php echo $_smarty_tpl->tpl_vars['data']->value['dateNaissanceSQL'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['dateNaissance'];?>
</td>
        <td data-value="<?php echo $_smarty_tpl->tpl_vars['data']->value['phrase'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['phrase'];?>
</td>
        <td>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['nomPrioritaire'] != '') {?>
                <button type="button"
                    class="btn btn-danger btn-xs"
                    data-toggle="popover"
                    data-title="Inscription prioritaire"
                    data-content="<?php echo $_smarty_tpl->tpl_vars['data']->value['nomPrioritaire'];?>
"
                    data-placement="left"
                    data-trigger="hover"
                    data-html="true">
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['section'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['classe'];?>

                </button>
            <?php } else { ?>
            -
        <?php }?>
        <td data-value="<?php echo $_smarty_tpl->tpl_vars['data']->value['texteStatut'];?>
">
            <button type="button"
                class="btn btn-xs btn-block btn-infoRecord <?php if ($_smarty_tpl->tpl_vars['data']->value['texteStatut'] != '') {?>btn-success<?php } else { ?>btn-default<?php }?>"
                class="btn btn-xs btn-block btn-infoRecord"
                data-html="true"
                data-toggle="popover"
                 <?php if ($_smarty_tpl->tpl_vars['data']->value['texteStatut'] != '') {?>
                    data-title="Notes"
                    data-content="<?php echo $_smarty_tpl->tpl_vars['data']->value['texteStatut'];?>
"
                 <?php }?>
                data-placement="left"
                data-trigger="hover"
                data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                <i class="fa fa-info"></i>
            </button>
        </td>
        <td>
            <button type="button"
                class="btn btn-danger btn-xs btn-del"
                data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
                data-toggle="tooltip"
                <?php if ($_smarty_tpl->tpl_vars['statut']->value != 'annule') {?> disabled title="Seules les demandes annulées peuvent être supprimées"
                    <?php } else { ?>
                    title="Supprimer cette demande annulée"
                <?php }?>>
                <i class="fa fa-times"></i>
            </button>
        </td>
    </tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
