<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-14 12:08:45
  from '/home/yves/www/maternel/inscription/admin/templates/modal/modalMailConfirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63c28d3d9582b5_34937373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '364b2ff1851545b1a159dfde0ed44402d013a9c8' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/modal/modalMailConfirm.tpl',
      1 => 1673694488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63c28d3d9582b5_34937373 (Smarty_Internal_Template $_smarty_tpl) {
?><div
  id="modalMailConfirm"
  class="modal fade"
  tabindex="-1"
  role="dialog"
  aria-labelledby="modalMailConfirmLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="modalMailConfirmLabel">Configuration du mail de confirmation de demande</h4>
        <p>
          <strong style="color: red"
            >Ne JAMAIS introduire de copié/collé depuis Word dans le cadre ci-dessous.</strong
          >
        </p>
      </div>
      <div class="modal-body">
        <form id="formLettreType">
          <div class="form-group">
            <label for="texte">Texte type</label>
            <textarea name="texteType" id="texte"><?php echo $_smarty_tpl->tpl_vars['texteType']->value;?>
</textarea
            >
          </div>
        </form>
        <h4 style="display: inline">Inserts possibles</h4>
        <span class="insert" title="Madame/Monsieur">##salutation##</span>
        <span class="insert" title="Nom de famille du parent">##nom##</span>
        <span class="insert" title="Prénom du parent">##prenom##</span>
        <span class="insert" title="Lien à cliquer pour la confirmation">##lien##</span>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn-saveTexteType">
          Enregistrer
        </button>
      </div>
    </div>
  </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
  $(document).ready(function () {
    $("#texte").summernote({
      lang: "fr-FR", // default: 'en-US'
      height: 250, // set editor height
      minHeight: 150, // set minimum height of editor
      focus: true, // set focus to editable area after initializing summernote
      toolbar: [
        ["style", ["style"]],
        ["font", ["bold", "underline", "clear"]],
        ["font", ["strikethrough", "superscript", "subscript"]],
        ["color", ["color"]],
        ["para", ["ul", "ol", "paragraph"]],
        ["table", ["table"]],
        ["insert", ["link", "picture", "video"]],
        ["view", ["fullscreen", "codeview", "help"]],
      ],
      maximumImageFileSize: 2097152,
      dialogsInBody: true,
    });
  });
<?php echo '</script'; ?>
>
<?php }
}
