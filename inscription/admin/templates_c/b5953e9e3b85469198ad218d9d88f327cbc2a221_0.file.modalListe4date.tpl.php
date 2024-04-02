<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-06 15:18:43
  from '/home/yves/www/maternel/inscription/admin/templates/modal/modalListe4date.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63b82dc3472267_81969470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5953e9e3b85469198ad218d9d88f327cbc2a221' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/modal/modalListe4date.tpl',
      1 => 1673014326,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63b82dc3472267_81969470 (Smarty_Internal_Template $_smarty_tpl) {
?><div
  class="modal fade"
  id="modalListe4date"
  tabindex="-1"
  role="dialog"
  aria-labelledby="modalListe4date"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modalListe4dateLabel">
          Annulation des demandes par dates
        </h4>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="max-height: 35em; overflow: auto">
        <div class="row">
          <div class="col-xs-5">
            <form id="formOk4date">
              <div class="helpblock">Sélectionner la date de naissance</div>
              <div class="input-group">
                <input
                  type="text"
                  class="form-control datepicker"
                  name="dateNais"
                  id="dateNais"
                />
                <span class="input-group-btn">
                  <button
                    class="btn btn-primary"
                    type="button"
                    id="btn-ok4date"
                  >
                    OK
                  </button>
                </span>
              </div>
            </form>
          </div>
          <div class="col-xs-7">
            <p>
              Sélection des inscriptions sur base de la date de naissance en vue
              d'annulation.
            </p>
            <p>
              Cette fonction ne fait que marquer les inscriptions annulées mais
              ne les supprime pas.
            </p>
          </div>
        </div>

        <div class="row">
          <div
            style="max-height: 20em; overflow: auto"
            id="liste4date"
            class="col-xs-12"
          ></div>

          <button
            type="button"
            class="btn btn-block btn-success"
            id="btn-annuler"
            disabled
          >
            Annuler les demandes
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php echo '<script'; ?>
>
  $(document).ready(function () {
    $(".datepicker").datepicker({
      clearBtn: true,
      language: "fr",
      autoclose: true,
      todayHighlight: true,
      format: "dd/mm/yyyy",
    });

  });

  
<?php echo '</script'; ?>
>
<?php }
}
