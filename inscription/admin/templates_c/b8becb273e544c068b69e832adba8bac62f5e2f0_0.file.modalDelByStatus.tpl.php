<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-03 12:51:07
  from '/home/yves/www/maternel/inscription/admin/templates/modal/modalDelByStatus.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63b416aba099a0_18584225',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8becb273e544c068b69e832adba8bac62f5e2f0' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/modal/modalDelByStatus.tpl',
      1 => 1667817850,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63b416aba099a0_18584225 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="modalShowToDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalShowToDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalShowToDeleteLabel">Effacement définitif des <strong><?php echo count($_smarty_tpl->tpl_vars['listToDelete']->value);?>
</strong> 
                <?php if ($_smarty_tpl->tpl_vars['status']->value == 'annule') {?>
                    "Annulé(s)"
                <?php } elseif ($_smarty_tpl->tpl_vars['status']->value == 'sansReponse') {?>
                    "Sans réponse"
                <?php } elseif ($_smarty_tpl->tpl_vars['status']->value == 'inscription') {?>
                    "Inscription finalisée"
                <?php }?>
                </h4>
            </div>
            <div class="modal-body" style="max-height:15em; overflow: auto;">
                <table class="table table-condensed">
                    <tr>
                        <th>&nbsp;</th>
                        <th>Enfant</th>
                        <th>Parent</th>
                        <th>Date demande</th>
                    </tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listToDelete']->value, 'annule', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['annule']->value) {
?>
                        <tr>
                            <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_annulation']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_annulation']->value['iteration'] : null);?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['annule']->value['nomEnfant'];?>
 <?php echo $_smarty_tpl->tpl_vars['annule']->value['prenomEnfant'];?>
</td>
                            <td><a href='mailto:<?php echo $_smarty_tpl->tpl_vars['annule']->value['mail'];?>
'><?php echo $_smarty_tpl->tpl_vars['annule']->value['nomParent'];?>
 <?php echo $_smarty_tpl->tpl_vars['annule']->value['prenomParent'];?>
</a></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['annule']->value['date'];?>
</td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" data-status="<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" id="btn-modalConfirmDel">Effacement définitif</button>
            </div>
        </div>
    </div>
</div><?php }
}
