<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-14 20:25:56
  from '/home/yves/www/maternel/inscription/admin/templates/modal/modalConfig.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63c301c497b6b1_88022433',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a69980302e5922e4b0203b09afe0d1af8ad694c' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/modal/modalConfig.tpl',
      1 => 1673718664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63c301c497b6b1_88022433 (Smarty_Internal_Template $_smarty_tpl) {
?><div
  id="modalConfig"
  class="modal fade"
  tabindex="-1"
  role="dialog"
  aria-labelledby="modalConfigLabel"
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
        <h4 class="modal-title" id="modalConfigLabel">Mail <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h4>
        <p style="color: red; font-weight: bold">
          Ne JAMAIS introduire de copié/collé depuis Word dans le cadre
          ci-dessous.
        </p>
      </div>
      <div class="modal-body">
           
            <form id="formLettreType">
              <textarea name="texteType" id="texte"><?php echo $_smarty_tpl->tpl_vars['texteType']->value;?>
</textarea>

            </form>
            <p class="btn-primary">Cliquer pour introduire un insert à la position du curseur.</p>
            <div class="btn-group">

                <button type="button" class="btn btn-primary insert" title="Madame/Monsieur">
                  ##salutation##
                </button>

                <button
                  type="button" class="btn btn-primary insert" title="Nom de famille">
                  ##nomParent##
                </button>

                <button type="button" class="btn btn-primary insert" title="Prénom">
                  ##prenomParent##
                </button>

                <button
                  type="button" class="btn btn-primary insert" title="Date de naissance">
                  ##dateNaissance##
                </button>

                <button
                  type="button" class="btn btn-primary insert" title="Nom de famille">
                  ##nomEnfant##
                </button>

                <button type="button" class="btn btn-primary insert" title="Prénom">
                  ##prenomEnfant##
                </button>

                <button type="button" class="btn btn-primary insert" title="Future classe de l'enfant" <?php if ($_smarty_tpl->tpl_vars['textName']->value != 'invitation') {?>disabled<?php }?>>
                  ##nomClasse##
                </button>

                <button type="button" class="btn btn-primary insert" title="Date du RV" <?php if ($_smarty_tpl->tpl_vars['textName']->value != 'invitation') {?>disabled<?php }?>>
                  ##dateRV##
                </button>

                <button
                  type="button" class="btn btn-primary insert" title="lien à cliquer" <?php if ($_smarty_tpl->tpl_vars['textName']->value != 'confirmation') {?>disabled<?php }?>>
                  ##lien##
                </button>
              </div>

      </div>

      <div class="modal-footer">
        <input type="hidden" name="textName" id="textName" value="<?php echo $_smarty_tpl->tpl_vars['textName']->value;?>
">
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

    $(".insert").on("click", function () {
      var texte = $(this).text();
      $("#texte").summernote("editor.saveRange");

      $("#texte").summernote("editor.restoreRange");
      $("#texte").summernote("editor.focus");
      $("#texte").summernote("editor.insertText", texte);
    });
  });
<?php echo '</script'; ?>
>
<?php }
}
