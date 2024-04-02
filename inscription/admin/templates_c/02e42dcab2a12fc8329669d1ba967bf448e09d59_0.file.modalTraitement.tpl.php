<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-09 18:04:47
  from '/home/yves/www/maternel/inscription/admin/templates/modal/modalTraitement.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63bc492f91ac42_12205591',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02e42dcab2a12fc8329669d1ba967bf448e09d59' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/modal/modalTraitement.tpl',
      1 => 1673278975,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63bc492f91ac42_12205591 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="modalTraitement" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTraitementLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalTraitementLabel">Acceptations d'inscription</h4>
            </div>
            <div class="modal-body">
                <form id="formModalOK">
                    <div class="col-xs-7">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Inscriptions sélectionnées <span class="badge badge-primary"><?php echo count($_smarty_tpl->tpl_vars['listeSelection']->value);?>
</span>
                            </div>
                            <div class="panel-body">
                                <table class="table table-condensed table-striped">
                                    <thead>
                                        <tr>
                                            <th>Parent</th>
                                            <th>Enfant</th>
                                        </tr>
                                    </thead>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeSelection']->value, 'data', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['data']->value) {
?>
                                    <tr>
                                        <td class="<?php echo $_smarty_tpl->tpl_vars['data']->value['sexe'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['salutation'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['nomParent'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['prenomParent'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['prenomEnfant'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['nomEnfant'];?>

                                            <input type="hidden" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"> </td>
                                    </tr>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </table>
                            </div>

                        </div>

                    </div>

                    <div class="col-xs-5">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Sélection d'une date
                            </div>
                            <div class="panel-body" style="max-height:15em; overflow: auto;">

                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>Places</th>
                                            <th style="width:2em">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['datesRV']->value, 'data', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['data']->value) {
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['date'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['heure'];?>
</td>
                                            <?php $_smarty_tpl->_assignInScope('RVreste', $_smarty_tpl->tpl_vars['data']->value['nbPlaces']-$_smarty_tpl->tpl_vars['listeRVpris']->value[$_smarty_tpl->tpl_vars['id']->value]['nb']);?>
                                            <td><?php echo $_smarty_tpl->tpl_vars['RVreste']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['data']->value['nbPlaces'];?>
</td>
                                            <td>
                                                <input type="radio"
                                                    name="idRV"
                                                    class="dateRV"
                                                    value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
                                                    <?php if (($_smarty_tpl->tpl_vars['RVreste']->value) < (count($_smarty_tpl->tpl_vars['listeSelection']->value))) {?> 
                                                    disabled
                                                    title="Nombre de places insuffisant"
                                                    <?php }?>>
                                            </td>
                                        </tr>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                <div class="clearfix"></div>
                </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btn-saveAcceptation">Confirmer ce(s) RV</button>
            </div>

        </div>

    </div>
</div>
<?php }
}
