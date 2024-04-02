<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-03 13:14:02
  from '/home/yves/www/maternel/inscription/admin/templates/inc/rowTableauAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63b41c0a877cd2_49330453',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66561fbb5f306c266a107ca7e8f6c7a06d4baaaa' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/inc/rowTableauAdmin.tpl',
      1 => 1603617589,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63b41c0a877cd2_49330453 (Smarty_Internal_Template $_smarty_tpl) {
?>    <td><input type="checkbox" name="selection[]" class="selection" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['statut'] == 'rvInscription') {?>disabled<?php }?>></td>
    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['date'];?>
</td>
    <td><?php if ($_smarty_tpl->tpl_vars['record']->value['salutation'] == 'Madame') {?>Mme<?php } else { ?>M.<?php }?></td>
    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['nomParent'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['prenomParent'];?>
</td>
    <td><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['record']->value['mail'];?>
"><?php echo $_smarty_tpl->tpl_vars['record']->value['mail'];?>
</a></td>
    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['telephone'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['prenomEnfant'];?>
 <?php echo $_smarty_tpl->tpl_vars['record']->value['nomEnfant'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['sexe'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['dateNaissance'];?>
</td>

    <td data-value="<?php echo $_smarty_tpl->tpl_vars['record']->value['phrase'];?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['record']->value['phrase'])===null||$tmp==='' ? 'aaaaaahNoooon' : $tmp);?>
</td>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['record']->value['nomPrioritaire'] != '') {?>
                <button type="button"
                    class="btn btn-danger btn-xs"
                    data-toggle="popover"
                    data-title="Inscription prioritaire"
                    data-content="<?php echo $_smarty_tpl->tpl_vars['record']->value['nomPrioritaire'];?>
"
                    data-placement="left"
                    data-trigger="hover"
                    data-html="true">
                    <?php echo $_smarty_tpl->tpl_vars['record']->value['section'];?>
 <?php echo $_smarty_tpl->tpl_vars['record']->value['classe'];?>

                </button>
            <?php } else { ?>
            -
        <?php }?>
    </td>
    <td>
        <button type="button"
            class="btn btn-xs btn-block btn-infoRecord <?php if ($_smarty_tpl->tpl_vars['record']->value['texteStatut'] != '') {?>btn-success<?php } else { ?>btn-default<?php }?>"
            class="btn btn-xs btn-block btn-infoRecord"
            data-html="true"
            data-toggle="popover"
             <?php if ($_smarty_tpl->tpl_vars['record']->value['texteStatut'] != '') {?>
                data-title="Notes"
                data-content="<?php echo $_smarty_tpl->tpl_vars['record']->value['texteStatut'];?>
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
            <?php if ($_smarty_tpl->tpl_vars['statut']->value != 'annule') {?> disabled title="Seules les demandes annulées peuvent être supprimées"<?php }?>>
            <i class="fa fa-times"></i>
        </button>
    </td>

<?php echo '<script'; ?>
 type="text/javascript">

    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    })

<?php echo '</script'; ?>
>
<?php }
}
