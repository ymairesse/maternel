<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-02 18:21:33
  from '/home/yves/www/maternel/inscription/templates/inscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63b3129d0f2c14_67975244',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b3b2be041d94f6749e2e80f823abea479c100bd' => 
    array (
      0 => '/home/yves/www/maternel/inscription/templates/inscription.tpl',
      1 => 1599985511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63b3129d0f2c14_67975244 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel panel-default">

    <div class="panel-heading">
        <h1>ISND - MATERNEL Demande d'inscription</h1>
    </div>

    <div class="panel-body">

        <form id="formulaire">

            <p class="info">Pour introduire une demande d'inscription en section maternelle, veuillez remplir et nous envoyer le formulaire suivant. Votre enfant sera ainsi inscrit sur notre liste d'attente. Nous vous contacterons dès que nous avons une place à lui attribuer.</p>
<p class="info">Les informations que vous fournirez resteront strictement confidentielles et ne seront partagées avec aucun tiers.</p>
<p class="info">En cas de difficulté pour compléter le formulaire, appelez-nous au 02/523.29.47</p>

            <div class="col-lg-4 col-md-6 col-sm-12">

                <h2>Coordonnées des parents</h2>

                <div class="form-group">
                    <label for="salut">Madame/Monsieur</label>
                    <select class="form-control" name="salut">
                        <option value="">Choisir</option>
                        <option value="Madame">Madame</option>
                        <option value="Monsieur">Monsieur</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nom">Nom de famille</label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom de famille" autocomplete="off" maxlength="40" value="">
                    <p class="help-block sr-only">Votre nom de famille</p>
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom" autocomplete="off" maxlength="40" value="">
                    <p class="help-block sr-only">Votre prénom</p>
                </div>

                <div class="form-group">
                    <label for="adresse">Adresse postale</label>
                    <textarea name="adresse" id="adresse" class="form-control" placeholder="Adresse postale complète" rows="2" cols="80" maxlength="100"></textarea>
                    <p class="help-block sr-only">Adresse postale complète</p>
                </div>

                <div class="form-group">
                    <label for="mail">Adresse mail du responsable</label>
                    <input type="email" class="form-control" name="mail" id="mail" placeholder="Adresse mail" autocomplete="off" maxlength="80" value="">
                    <p class="help-block sr-only">Important! Cette adresse mail doit être fonctionnelle.</p>
                </div>

                <div class="form-group">
                    <label for="telephone">Téléphone (joignable en journée)</label>
                    <input type="text" class="form-control phone" name="telephone" id="telephone" placeholder="N° de téléphone" value="" autocomplete="off" maxlength="20" value="">
                    <p class="help-block sr-only">Numéro où l'on peut vous joindre dans la journée</p>
                </div>

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">

                <h2>Votre enfant</h2>

                <div class="form-group">
                    <label for="nom">Nom de famille de l'enfant</label>
                    <input type="text" class="form-control" name="nomEnfant" id="nomEnfant" placeholder="Nom de famille" autocomplete="off"  maxlength="40" value="">
                    <p class="help-block sr-only">Nom de famille de l'enfant</p>
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom de l'enfant</label>
                    <input type="text" class="form-control" name="prenomEnfant" id="prenomEnfant" placeholder="Prénom" autocomplete="off"  maxlength="40" value="">
                    <p class="help-block sr-only">Prénom de l'enfant</p>
                </div>

                <div class="form-group">
                    <label for="sexe">Sexe de l'enfant</label>
                    <label class="radio-inline"><input type="radio" name="sexe" value="F">F</label>
                   <label class="radio-inline"><input type="radio" name="sexe" value="M">M</label>
                   <label class="radio-inline"><input type="radio" name="sexe" value="A">Autre</label>
                    <p class="help-block sr-only">Sexe de l'enfant</p>
                </div>

                <div class="form-group">
                    <label for="dnais">Date de naissance</label>
                    <input type="text" class="form-control datepicker" name="dateNais" id="dateNais" value="" placeholder="Date de naissance" autocomplete="off" maxlength="10">
                    <p class="help-block sr-only">Date de naissance de l'enfant</p>
                </div>

                <div class="form-group">
                    <label for="creche">Crèche de l'enfant</label>
                    <textarea name="creche" id="creche" class="form-control" placeholder="Nom et adresse de la crèche fréquentée par l'enfant" rows="2" cols="80" maxlength="200"></textarea>
                    <p class="help-block sr-only">Nom et adresse de la crèche fréquentée par l'enfant</p>
                </div>

                <div class="form-group">
                    <label for="ecole">École actuelle de l'enfant</label>
                    <textarea name="ecole" id="ecole" class="form-control" placeholder="Nom et adresse de l'école fréquentée par l'enfant" rows="2" cols="80" maxlength="200"></textarea>
                    <p class="help-block sr-only">Nom et adresse de l'école fréquentée actuellement par l'enfant</p>
                </div>

                <div class="form-group">
                    <label for="raison">Motif du changement d'école</label>
                    <textarea name="raison" id="raison" class="form-control" placeholder="Motif du changement d'école de votre enfant" rows="2" cols="80" maxlength="200"></textarea>
                    <p class="help-block sr-only">Motif éventuel du changement d'école de votre enfant</p>
                </div>

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">

                <h2>Demande prioritaire</h2>
                <p class="info">J'ai un autre enfant déjà inscrit à l'ISND</p>

                <div class="form-group">

                    <label for="section">En quelle section</label><br>

                    <label class="radio-inline">
                        <input type="radio" class="section" name="section" value="M">
                        Maternel
                    </label>

                    <label class="radio-inline">
                        <input type="radio" class="section" name="section" value="P">
                        Primaire
                    </label>

                    <label class="radio-inline">
                        <input type="radio" class="section" name="section" value="S">
                        Secondaire
                    </label>

                    <button type="button" class="btn btn-success btn-xs pull-right" id="btn-cancelSection">Annuler le choix de section</button>

                    <p class="help-block sr-only">Section de cet enfant</p>

                </div>

                <div class="form-group">
                    <label for="nomPrenom">Nom et prénom de cet enfant</label>
                    <input type="text" class="form-control prioritaire" name="nomPrioritaire" id="nomPrioritaire" placeholder="Nom et prénom" autocomplete="off"  maxlength="40" readonly>
                    <p class="help-block sr-only">Nom et prénom de cet enfant</p>
                </div>

                <div class="form-group">
                    <label for="nomPrenom">Classe de cet enfant</label>
                    <input type="text" class="form-control prioritaire" name="classe" id="classe" placeholder="En quelle classe" autocomplete="off"  maxlength="6" readonly>
                    <p class="help-block sr-only">En quelle classe est cet enfant</p>
                </div>

                <p class="info">Nous pourrons répondre favorablement à votre demande d'inscription prioritaire seulement si nous disposons d'une place libre à attribuer. </p>

                <div class="form-group">
                    <label for="remarque">Remarque libre</label>
                    <textarea name="remarque" class="form-control" placeholder="Remarque libre" rows="4" cols="80" maxlength="200"></textarea>
                    <p class="help-block sr-only">Information complémentaire que vous souhaitez ajouter</p>
                </div>

                <div class="col-xs-7">
                    <div class="form-group">
                        <label for="captcha">Question de sécurité: veuillez recopier le contenu de l'image ci-contre</label>
                        <input type="text"  style="text-transform: uppercase;" class="form-control" name="captcha" placeholder="En majuscules" id="captcha" value="" autocomplete="off"  maxlength="6" >
                        <p class="help-block">Êtes-vous humain?</p>
                    </div>
                </div>
                <div class="col-xs-5">
                    <img src="inc/captcha.php?nbchar=6&amp;rand=<?php echo '<?php ';?>echo rand(); <?php echo '?>';?>" id="captcha_image" class="img-responsive">
                    <button type="button" class="btn btn-success btn-block btn-xs" id="recaptcha">Un autre</button>
                </div>


                <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                        <button type="reset" class="btn btn-default">Annuler</button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" id="envoyer">Envoyer</button>
                    </div>
                </div>

            </div>

        <div class="clearfix"></div>

        </form>

    </div>

</div>


<?php echo '<script'; ?>
 type="text/javascript">

function refreshCaptcha(){
    var image = $('#captcha_image');
    var source = image.attr('src');
    $('#captcha_image').attr('src', source.substring(0, source.lastIndexOf("?")) + "?rand=" + Math.random()*1000);
}

    $(document).ready(function() {

        $('#recaptcha').click(function(){
            refreshCaptcha();
        })

        function phoneFormatter() {
          $('.phone').on('input', function() {
            var number = $(this).val().replace(/[^\d]/g, '')
            if (number.length == 9) {
                var pfx = number.substr(0,2);
                var no = number.substr(2,)
                number = pfx + " " + no;
            } else if (number.length == 10) {
                var pfx = number.substr(0,4);
                var no = number.substr(4,)
                number = pfx + " " + no;
            }
            $(this).val(number)
          });
        };

        $(phoneFormatter);

        $('.datepicker').datepicker({
            clearBtn: true,
            language: "fr",
            autoclose: true,
            todayHighlight: true,
            format: 'dd/mm/yyyy',
        })

        $('#formulaire').validate({
            rules: {
                salut: 'required',
                nom: 'required',
                prenom: 'required',
                adresse: 'required',
                mail: 'required',
                telephone: {
                    required: true,
                    minlength: 9
                },
                nomEnfant: 'required',
                prenomEnfant: 'required',
                sexe: 'required',
                dateNais: 'required',
                captcha: 'required',
            }
        });

        $('#envoyer').click(function(){
            var formulaire = $('#formulaire').serialize();
            if ($('#formulaire').valid()) {
                $.post('inc/saveDemande.inc.php', {
                    formulaire: formulaire
                }, function(resultat){
                    var resultatJSON = JSON.parse(resultat);
                    if (resultatJSON.erreur == true) {
                        titre = 'ATTENTION!!! Votre demande n\'est pas envoyée!!!';
                        }
                        else {
                            titre = 'Information';
                            $('#formulaire :input').prop('disabled', true);
                            }
                    bootbox.alert({
                        title: titre,
                        message: resultatJSON.message,
                    });
                })
            }
        })

        $('#btn-cancelSection').click(function(){
                $('.prioritaire').prop('readonly', true).val('');
                $('.section').prop('checked', false);
            })
        $('.section').click(function(){
            $('.prioritaire').prop('readonly', false);
            $('#nomPrioritaire').focus();
        })

    })
<?php echo '</script'; ?>
>
<?php }
}
