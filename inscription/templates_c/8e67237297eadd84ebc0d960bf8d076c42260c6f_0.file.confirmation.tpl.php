<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-28 10:39:27
  from '/home/yves/www/maternel/inscription/templates/confirmation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63d4ed4f0e5510_11076272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e67237297eadd84ebc0d960bf8d076c42260c6f' => 
    array (
      0 => '/home/yves/www/maternel/inscription/templates/confirmation.tpl',
      1 => 1599984849,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d4ed4f0e5510_11076272 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel panel-default">

    <div class="panel-heading">
        <h1>ISND - MATERNEL Demande d'inscription</h1>
    </div>

    <div class="panel-body" style="background-color:#ccf">

        <?php if ($_smarty_tpl->tpl_vars['statut']->value == 'Attente de confirmation') {?>
            <p class="intro">Vous pouvez maintenant confirmer votre demande d'inscription. Veuillez vérifier que toutes les informations sont correctes avant de cliquer sur le bouton "Confirmer" au bas de la page.<br>
            <span style="color:red">Une demande d'inscription non confirmée est annulée 48h après la demande.</span></p>
            <?php } else { ?>
            <p class="intro">Voici les informations que vous nous avez fait parvenir.</p>
        <?php }?>

        <div class="col-lg-4 col-md-6 col-sm-12">

            <h2>Coordonnées des parents</h2>

            <div class="form-group">
                <label for="salut">Madame/Monsieur</label>
                <select class="form-control" name="salut">
                    <option value="">Choisir</option>
                    <option value="Madame" <?php if ($_smarty_tpl->tpl_vars['record']->value['salutation'] == 'Madame') {?>selected<?php }?>>Madame</option>
                    <option value="Monsieur" <?php if ($_smarty_tpl->tpl_vars['record']->value['salutation'] == 'Monsieur') {?>selected<?php }?>>Monsieur</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nom">Nom de famille</label>
                <input type="text" class="form-control" name="nom" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['nomParent'];?>
">
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['prenomParent'];?>
">
            </div>

            <div class="form-group">
                <label for="adresse">Adresse postale</label>
                <textarea name="adresse" id="adresse" class="form-control" placeholder="Adresse postale complète" rows="2" cols="80"><?php echo $_smarty_tpl->tpl_vars['record']->value['adresse'];?>
</textarea>
            </div>

            <div class="form-group">
                <label for="mail">Adresse mail du responsable</label>
                <input type="email" class="form-control" name="mail" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['mail'];?>
">
                <p class="help-block">Important! Cette adresse mail doit être fonctionnelle.</p>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" class="form-control" name="telephone" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['telephone'];?>
">
            </div>

        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">

            <h2>Votre enfant</h2>

            <div class="form-group">
                <label for="nom">Nom de famille de l'enfant</label>
                <input type="text" class="form-control" name="nomEnfant" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['nomEnfant'];?>
">
            </div>

            <div class="form-group">
                <label for="prenom">Prénom de l'enfant</label>
                <input type="text" class="form-control" name="prenomEnfant" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['prenomEnfant'];?>
">
            </div>

            <div class="form-group">
                <label for="sexe">Sexe de l'enfant</label>
                <label class="radio-inline"><input type="radio" name="sexe" value="F"<?php if ($_smarty_tpl->tpl_vars['record']->value['sexe'] == 'F') {?> checked<?php }?>>F</label>
               <label class="radio-inline"><input type="radio" name="sexe" value="M"<?php if ($_smarty_tpl->tpl_vars['record']->value['sexe'] == 'M') {?> checked<?php }?>>M</label>
               <label class="radio-inline"><input type="radio" name="sexe" value="A"<?php if ($_smarty_tpl->tpl_vars['record']->value['sexe'] == 'A') {?> checked<?php }?>>Autre</label>
                <p class="help-block sr-only">Sexe de l'enfant</p>
            </div>

            <div class="form-group">
                <label for="dnais">Date de naissance</label>
                <input type="text" class="form-control" name="dateNais" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['dateNaissance'];?>
">
            </div>

            <div class="form-group">
                <label for="creche">Crèche de l'enfant</label>
                <textarea name="creche" id="creche" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['record']->value['creche'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
            </div>

            <div class="form-group">
                <label for="ecole">École actuelle de l'enfant</label>
                <textarea name="creche" id="creche" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['record']->value['ecole'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
            </div>

            <div class="form-group">
                <label for="ecole">Motif du changement d'école</label>
                <textarea name="creche" id="creche" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['record']->value['raison'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
            </div>

        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">

            <h2>Autre enfant déjà à l'ISND</h2>

            <p>Laisser libre si pas d'autre enfant de la famille à l'ISND</p>

            <div class="form-group">

                <label for="section">En quelle section</label> <br>

                <label class="radio-inline">
                    <input type="radio" class="section" name="section" value="N" disabled<?php if ($_smarty_tpl->tpl_vars['record']->value['section'] == '') {?> checked<?php }?>>Pas d'autre enfant
                </label>

                <label class="radio-inline">
                    <input type="radio" class="section" name="section" value="M" disabled<?php if ($_smarty_tpl->tpl_vars['record']->value['section'] == 'M') {?> checked<?php }?>>
                    Maternel
                </label>

                <label class="radio-inline">
                    <input type="radio" class="section" name="section" value="P" disabled<?php if ($_smarty_tpl->tpl_vars['record']->value['section'] == 'P') {?> checked<?php }?>>
                    Primaire
                </label>

                <label class="radio-inline">
                    <input type="radio" class="section" name="section" value="S" disabled<?php if ($_smarty_tpl->tpl_vars['record']->value['section'] == 'S') {?> checked<?php }?>>
                    Secondaire
                </label>

            </div>

            <div class="form-group">
                <label for="nomPrenom">Nom et prénom de cet enfant</label>
                <input type="text" class="form-control" name="nomPrioritaire" id="nomPrioritaire" placeholder="Nom et prénom" autocomplete="off"  maxlength="40" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['record']->value['nomPrioritaire'])===null||$tmp==='' ? '' : $tmp);?>
">
                <p class="help-block sr-only">Nom et prénom de cet enfant</p>
            </div>

            <div class="form-group">
                <label for="nomPrenom">Classe de cet enfant</label>
                <input type="text" class="form-control" name="classe" id="classe" placeholder="En quelle classe" autocomplete="off"  maxlength="6" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['classe'];?>
">
                <p class="help-block sr-only">En quelle classe est cet enfant</p>
            </div>

            <div class="form-group" style="background-color:red; color: white;">
                <label for="statut">Statut de votre demande</label>
                <input type="text" class="form-control" name="statut" id="statut" value="<?php echo $_smarty_tpl->tpl_vars['statut']->value;?>
">
            </div>

            <h2>Remarque libre</h2>

            <div class="form-group">
                <label for="remarque">Que voulez-vous ajouter?</label>
                <textarea name="remarque" class="form-control"><?php echo $_smarty_tpl->tpl_vars['record']->value['remarque'];?>
</textarea>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['statut']->value == 'Attente de confirmation') {?>
            <button type="button" class="btn btn-success btn-block" data-id="<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
" id="confirmer">Confirmer</button>
            <?php }?>

        </div>

    </div>

</div>

</div>

</div>

<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function() {

        $('input, textarea').attr('readonly', true);

        $('#confirmer').click(function(){
            var id = $(this).data('id');
            $.post('inc/confirmerDemande.inc.php', {
                id: id
            }, function(resultat){
                if (resultat > 0) {
                    $('#statut').val('Demande confirmée');
                    $('#confirmer').remove();
                    bootbox.alert({
                        title: 'Information',
                        message: 'Votre demande a été confirmée. Dès qu\'une place sera disponible pour votre enfant, nous vous contacterons pour fixer un rendez-vous d\'inscription.'
                    })
                }
            })
        })


    })
<?php echo '</script'; ?>
>
<?php }
}
