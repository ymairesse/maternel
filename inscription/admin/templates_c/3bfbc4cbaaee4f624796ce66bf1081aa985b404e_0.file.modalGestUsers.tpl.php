<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-02 20:17:14
  from '/home/yves/www/maternel/inscription/admin/templates/modal/modalGestUsers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63b32dba0ed059_25677489',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3bfbc4cbaaee4f624796ce66bf1081aa985b404e' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/modal/modalGestUsers.tpl',
      1 => 1672687025,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:modal/usersList.tpl' => 1,
  ),
),false)) {
function content_63b32dba0ed059_25677489 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="modalGestUsers" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalGestUsersLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="modalGestUsersLabel">Gestion des utilisateurs</h4>
      </div>
      <div class="modal-body" style="min-height:10em; overflow: auto;">

        <div class="row">

          <div class="col-xs-4">
            <div class="form-group">
              <label for="userSelect">Sélection</label>
              <select size="4" class="form-control" id="userSelect" name="userSelect">
                <?php $_smarty_tpl->_subTemplateRender("file:modal/usersList.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
              </select>
            </div>

            <button type="button" class="btn btn-danger btn-block" id="btn-delUser" disabled>Supprimer un
              utilisateur
            </button>
            <button class="btn btn-warning btn-block" id="btn-addUser">Ajouter un utilisateur</button>
          </div>

          <div class="col-xs-8">

            <form id="formUser">

              <div class="row">

                <div class="col-xs-6">
                  <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" value="" name="nom" disabled>
                  </div>
                </div>

                <div class="col-xs-6">
                  <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" value="" name="prenom" disabled>
                  </div>
                </div>

              </div>

              <div class="row">

                <div class="col-xs-6">
                  <div class="form-group">
                    <label for="mail">Adresse mail</label>
                    <input type="email" class="form-control" id="mail" value="" name="mail" disabled>
                  </div>
                </div>

                <div class="col-xs-6">
                  <div class="form-group">
                    <label for="acronyme">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="acronyme" value="" disabled name="acronyme"
                      maxlength="40">
                  </div>
                </div>
                <input type="hidden" name="adminUser" value="<?php echo $_smarty_tpl->tpl_vars['identite']->value['userName'];?>
" id="adminUser">
                <input type="hidden" name="isNewUser" id="isNewUser" value="">
                <input type="hidden" name="userName" value="" id="userName">

              </div>

              <div class="row">
                <div class="col-xs-8">

                  <div class="input-group">
                    <input type="password" class="form-control" name="passwd" id="passwd" required="true"
                      placeholder="Mot de passe" value="" disabled>
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-success" id="btn-show">
                        <i class="fa fa-eye"></i>
                      </button>
                    </div>
                  </div>
                  <p class="help-block">Laisser vide pour ne pas modifier le mot de passe</p>
                </div>

                <div class="col-xs-4">
                  <button type="button" class="btn btn-success btn-block" id="btn-saveUser">Enregistrer</button>
                </div>

              </div>

            </form>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<?php echo '<script'; ?>
>

  $(document).ready(function () {

    $('#btn-show').click(function () {
      if ($('#passwd').prop('type') == "password")
        $('#passwd').prop('type', "text")
      else $('#passwd').prop('type', "password")
    })

    $('#formUser').validate({
      rules: {
        nom: {
          required: true
        },
        prenom: {
          required: true
        },
        mail: {
          required: true,
          email: true
        },
        acronyme: {
          required: true,
          maxlength: 7
        }
      }
    })

  })

<?php echo '</script'; ?>
><?php }
}
