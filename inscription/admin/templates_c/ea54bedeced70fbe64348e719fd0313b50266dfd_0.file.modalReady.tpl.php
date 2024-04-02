<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-02 18:12:37
  from '/home/yves/www/maternel/inscription/admin/templates/modal/modalReady.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63b31085340842_64746889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea54bedeced70fbe64348e719fd0313b50266dfd' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/modal/modalReady.tpl',
      1 => 1672679553,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63b31085340842_64746889 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="modalMailOK" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalMailOKLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="modalMailOKLabel">Liste des <strong><?php echo count($_smarty_tpl->tpl_vars['listeReady']->value);?>
</strong> mail(s) de confirmation à envoyer</h4>
      </div>
      <div class="modal-body" style="max-height:25em; overflow: auto;">

          <form id="formModalReady">
              <table class="table table-condensed table-striped">
                  <thead>
                      <tr>
                          <th style="background-color: #aaa;"><input type="checkbox" id="checkUnCheck" checked title="cocher/décocher tout"></th>
                          <th>Nom du parent</th>
                          <th>Mail</th>
                          <th>Nom de l'enfant</th>
                          <th>Classe</th>
                          <th>RV</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeReady']->value, 'data', false, 'idInscription');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['idInscription']->value => $_smarty_tpl->tpl_vars['data']->value) {
?>
                      <tr data-idinscription="<?php echo $_smarty_tpl->tpl_vars['idInscription']->value;?>
">
                          <td><input class="cbMail" type="checkbox" name="cb[]" value="<?php echo $_smarty_tpl->tpl_vars['idInscription']->value;?>
" checked></td>
                          <td><?php echo $_smarty_tpl->tpl_vars['data']->value['salutation'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['prenomParent'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['nomParent'];?>
</td>
                          <td><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['data']->value['mail'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['mail'];?>
</a></td>
                          <td><?php echo $_smarty_tpl->tpl_vars['data']->value['prenomEnfant'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['nomEnfant'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['data']->value['nomClasse'];?>
</td>
                          <?php $_smarty_tpl->_assignInScope('idRV', $_smarty_tpl->tpl_vars['data']->value['idRV']);?>
                          <td data-idrv="<?php echo $_smarty_tpl->tpl_vars['idRV']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['listeRV']->value[$_smarty_tpl->tpl_vars['idRV']->value]['date'];?>
 <?php echo $_smarty_tpl->tpl_vars['listeRV']->value[$_smarty_tpl->tpl_vars['idRV']->value]['heure'];?>
</td>
                      </tr>
                      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </tbody>

              </table>

          </form>

      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="btn-sendMail">Envoyer les mails</button>
      </div>
    </div>
  </div>
</div>


<?php echo '<script'; ?>
>

  $('document').ready(function(){

    $('#checkUnCheck').change(function(){

      $('.cbMail').each(function(){
        var ceci = $(this);
        if ((ceci).is(':checked'))
          ceci.prop('checked', false)
          else ceci.prop('checked', true);
      });

    });

  })


<?php echo '</script'; ?>
><?php }
}
