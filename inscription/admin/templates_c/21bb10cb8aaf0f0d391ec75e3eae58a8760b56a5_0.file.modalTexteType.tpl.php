<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-27 18:24:21
  from '/home/yves/www/maternel/inscription/admin/templates/modal/modalTexteType.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63d408c5431157_29878082',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21bb10cb8aaf0f0d391ec75e3eae58a8760b56a5' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/modal/modalTexteType.tpl',
      1 => 1674836490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d408c5431157_29878082 (Smarty_Internal_Template $_smarty_tpl) {
?><div
  id="modalTexteType"
  class="modal fade"
  tabindex="-1"
  role="dialog"
  aria-labelledby="modalTexteTypeLabel"
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
        <h4 class="modal-title" id="modalTexteTypeLabel"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
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
            <?php if ($_smarty_tpl->tpl_vars['inserts']->value != array()) {?>
            <p style="background-color: #33f; color: #fff">Cliquer pour introduire un insert à la position du curseur.</p>

            <div class="btn-group">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['inserts']->value, 'data', false, 'wtf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['wtf']->value => $_smarty_tpl->tpl_vars['data']->value) {
?> 
              <button type="button" class="btn btn-primary insert" title="<?php echo $_smarty_tpl->tpl_vars['data']->value['titreInsert'];?>
">
                <?php echo $_smarty_tpl->tpl_vars['data']->value['texteInsert'];?>

              </button>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <?php }?>

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
