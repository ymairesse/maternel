<div
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
        <h4 class="modal-title" id="modalTexteTypeLabel">{$title}</h4>
        <p style="color: red; font-weight: bold">
          Ne JAMAIS introduire de copié/collé depuis Word dans le cadre
          ci-dessous.
        </p>
      </div>
      <div class="modal-body">
           
            <form id="formLettreType">
              <textarea name="texteType" id="texte">{$texteType}</textarea>

            </form>
            {if $inserts != []}
            <p style="background-color: #33f; color: #fff">Cliquer pour introduire un insert à la position du curseur.</p>

            <div class="btn-group">
              {foreach from=$inserts key=wtf item=data} 
              <button type="button" class="btn btn-primary insert" title="{$data.titreInsert}">
                {$data.texteInsert}
              </button>
              {/foreach}
            </div>
            {/if}

      </div>

      <div class="modal-footer">
        <input type="hidden" name="textName" id="textName" value="{$textName}">
        <button type="button" class="btn btn-primary" id="btn-saveTexteType">
          Enregistrer
        </button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
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
</script>
