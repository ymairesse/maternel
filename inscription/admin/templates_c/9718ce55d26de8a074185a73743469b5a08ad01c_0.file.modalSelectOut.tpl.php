<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-03 17:33:43
  from '/home/yves/www/maternel/inscription/admin/templates/modal/modalSelectOut.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63b458e7cea8d4_39289376',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9718ce55d26de8a074185a73743469b5a08ad01c' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/modal/modalSelectOut.tpl',
      1 => 1672763614,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63b458e7cea8d4_39289376 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="modalSelectOut" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalSelectOutLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="modalSelectOutLabel">Sélection pour annulation</h4>
      </div>
      <div class="modal-body">

          <div class="col-xs-5">
              <div class="form-group">
                  <label for="dnais">Date de naissance</label>
                  <input type="text" class="form-control datepicker" name="dateNais" id="dateNais" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['record']->value['dateNaissance'])===null||$tmp==='' ? '' : $tmp);?>
">
                  <div class="helpblock">Veuillez sélectionner la date limite</div>
              </div>
          </div>
          <div class="col-xs-7">
              <p>Sélection des inscriptions sur base de la date de naissance en vue d'annulation.</p>
              <p>Cette fonction ne fait que marquer les inscriptions annulées mais ne les supprime pas.</p>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="modalSelectDate" name="button">Sélectionner</button>
      </div>
    </div>
  </div>
</div>

<?php echo '<script'; ?>
>

  $(document).ready(function(){

    $('.datepicker').datepicker({
        clearBtn: true,
        language: "fr",
        autoclose: true,
        todayHighlight: true,
        format: 'dd/mm/yyyy',
    })

  })

<?php echo '</script'; ?>
>
<?php }
}
