<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-03 09:52:14
  from '/home/yves/www/maternel/inscription/admin/templates/modal/modalDetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63b3ecbe1c9515_19971764',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99a17e6abeba5aa1881b3f7f64fa78844453137f' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/modal/modalDetail.tpl',
      1 => 1672734243,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63b3ecbe1c9515_19971764 (Smarty_Internal_Template $_smarty_tpl) {
?><style media="screen">

#dateDemande.selected {
    background-color: #f00;
    color: white;
    }

</style>

<form id="formulaire">

    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#responsable">Responsable</a></li>
      <li><a data-toggle="tab" href="#enfant">Enfant</a></li>
      <li><a data-toggle="tab" href="#prioritaire">Prioritaire</a></li>
      <li><a data-toggle="tab" href="#remarque">Remarque libre</a></li>
      <li><a data-toggle="tab" href="#statut">Statut</a></li>
    </ul>

    <div class="tab-content">
       <div id="responsable" class="tab-pane fade in active">
           <div class="form-group">
               <label for="salut">Madame/Monsieur</label>
               <select class="form-control" name="salut">
                   <option value="">Choisir</option>
                   <option value="Madame" <?php if ($_smarty_tpl->tpl_vars['record']->value['salutation'] == 'Madame') {?>selected<?php }?>>Madame</option>
                   <option value="Monsieur" <?php if ($_smarty_tpl->tpl_vars['record']->value['salutation'] == 'Monsieur') {?>selected<?php }?>>Monsieur</option>
               </select>
           </div>

           <div class="row">
               <div class="col-xs-6">
                   <div class="form-group">
                       <label for="nom">Nom de famille</label>
                       <input type="text" class="form-control" name="nom" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['nomParent'];?>
">
                   </div>
               </div>
               <div class="col-xs-6">
                   <div class="form-group">
                       <label for="prenom">Prénom</label>
                       <input type="text" class="form-control" name="prenom" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['prenomParent'];?>
">
                   </div>
               </div>
           </div>

           <div class="form-group">
               <label for="adresse">Adresse postale</label>
               <textarea name="adresse" id="adresse" class="form-control" placeholder="Adresse postale complète" rows="2" cols="80"><?php echo $_smarty_tpl->tpl_vars['record']->value['adresse'];?>
</textarea>
           </div>

           <div class="row">
               <div class="col-xs-6">
                   <div class="form-group">
                       <label for="mail">Adresse mail du responsable</label>
                       <input type="email" class="form-control" name="mail" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['mail'];?>
">
                   </div>

               </div>
               <div class="col-xs-6">
                   <div class="form-group">
                       <label for="telephone">Téléphone</label>
                       <input type="text" class="form-control phone" name="telephone" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['telephone'];?>
">
                   </div>
               </div>
               </div>
           </div>


       <div id="enfant" class="tab-pane fade">

           <div class="row">
               <div class="col-xs-6">
                   <div class="form-group">
                       <label for="nom">Nom de famille de l'enfant</label>
                       <input type="text" class="form-control" name="nomEnfant" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['nomEnfant'];?>
">
                   </div>
               </div>
               <div class="col-xs-6">
                    <div class="form-group">
                        <label for="prenom">Prénom de l'enfant</label>
                        <input type="text" class="form-control" name="prenomEnfant" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['prenomEnfant'];?>
">
                    </div>
               </div>

               <div class="col-xs-6">
                    <label>Sexe de l'enfant</label>
                   <div class="form-group">
                       <label class="radio-inline"><input type="radio" id="sexe" name="sexe" value="F"<?php if ($_smarty_tpl->tpl_vars['record']->value['sexe'] == 'F') {?> checked<?php }?>>F</label>
                      <label class="radio-inline"><input type="radio" id="sexe" name="sexe" value="M"<?php if ($_smarty_tpl->tpl_vars['record']->value['sexe'] == 'M') {?> checked<?php }?>>M</label>
                      <label class="radio-inline"><input type="radio" id="sexe" name="sexe" value="A"<?php if ($_smarty_tpl->tpl_vars['record']->value['sexe'] == 'A') {?> checked<?php }?>>Autre</label>
                       <p class="help-block sr-only">Sexe de l'enfant</p>
                   </div>
               </div>
               <div class="col-xs-6">
                   <div class="form-group">
                       <label for="dnais">Date de naissance</label>
                       <input type="text" class="form-control datepicker" name="dateNais" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['dateNaissance'];?>
">
                   </div>
               </div>

           </div>

           <div class="form-group">
               <label for="creche">Crèche de l'enfant</label>
               <textarea name="creche" id="creche" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['record']->value['creche'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
           </div>

           <div class="form-group">
               <label for="ecole">École actuelle de l'enfant</label>
               <textarea name="ecole" id="ecole" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['record']->value['ecole'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
           </div>

           <div class="form-group">
               <label for="raison">Motif du changement d'école</label>
               <textarea name="raison" id="raison" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['record']->value['raison'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
           </div>
       </div>

       <div id="remarque" class="tab-pane fade">

           <div class="form-group">
               <label for="remarque">Remarque libre</label>
               <textarea name="remarque" class="form-control"><?php echo $_smarty_tpl->tpl_vars['record']->value['remarque'];?>
</textarea>
           </div>

       </div>

       <div id="prioritaire" class="tab-pane fade">

           <label for="section">En quelles section</label>
           <div class="form-group">

               <label class="radio-inline"><input type="radio" name="section" class="section" value="M"<?php if ($_smarty_tpl->tpl_vars['record']->value['section'] == 'M') {?> checked<?php }?>>Maternel</label>
               <label class="radio-inline"><input type="radio" name="section" class="section" value="P"<?php if ($_smarty_tpl->tpl_vars['record']->value['section'] == 'P') {?> checked<?php }?>>Primaire</label>
               <label class="radio-inline"><input type="radio" name="section" class="section" value="S"<?php if ($_smarty_tpl->tpl_vars['record']->value['section'] == 'S') {?> checked<?php }?>>Secondaire</label>
               <button type="button" class="btn btn-danger pull-right btn-xs" id="btn-cancelPrior">Annuler la priorité</button>
               <p class="help-block sr-only">Section de cet enfant</p>


           </div>

           <div class="row">
               <div class="col-xs-8">
                   <div class="form-group">
                       <label for="nomPrenom">Nom et prénom de cet enfant</label>
                       <input type="text" class="form-control" name="nomPrioritaire" id="nomPrioritaire" placeholder="Nom et prénom" autocomplete="off"  maxlength="40" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['record']->value['nomPrioritaire'])===null||$tmp==='' ? '' : $tmp);?>
">
                       <p class="help-block sr-only">Nom et prénom de cet enfant</p>
                   </div>
               </div>
               <div class="col-xs-4">
                   <div class="form-group">
                       <label for="nomPrenom">Classe de cet enfant</label>
                       <input type="text" class="form-control" name="classe" id="classe" placeholder="En quelle classe" autocomplete="off"  maxlength="6" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['classe'];?>
">
                       <p class="help-block sr-only">En quelle classe est cet enfant</p>
                   </div>
               </div>
           </div>

       </div>


       <div id="statut" class="tab-pane fade">
           <label for="texteStatut">Notes sur cette demande</label>
           <textarea id="texteStatut" name="texteStatut" class="form-control summernote"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['record']->value['texteStatut'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>

           <div class="row">

               <div class="col-xs-4">

                   <label for="classeMat">Classe future</label>
                   <div class="form-group">
                       <select class="form-control" name="classeMat" id="classeMat">
                           <option value="">Classe future</option>
                           <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeClasses']->value, 'nomClasse', false, 'laClasse');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['laClasse']->value => $_smarty_tpl->tpl_vars['nomClasse']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['laClasse']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['laClasse']->value == $_smarty_tpl->tpl_vars['record']->value['classeMat']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['nomClasse']->value;?>
</option>
                           <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                       </select>

                   </div>

               </div>

               <div class="col-xs-4">
                   <label for="dateRV">Date de RV</label>
                   <div class="form-group">
                       <select class="form-control" name="dateRV" id="modalDateRV" disabled>
                           <option value="">Date non fixée</option>
                           <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeDatesRV']->value, 'data', false, 'idRV');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['idRV']->value => $_smarty_tpl->tpl_vars['data']->value) {
?>
                           <option value="<?php echo $_smarty_tpl->tpl_vars['idRV']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['idRV']->value == $_smarty_tpl->tpl_vars['record']->value['idRV']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['data']->value['date'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['heure'];?>
</option>
                           <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                       </select>
                   </div>

               </div>

               <div class="col-xs-4">
                <div class="form-group">
                    <label for="mailInvitation">Invitation envoyée le</label>
                    <input type="text" id="mailInvitation" class="form-control disabled" disabled name="mailInvitation" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['dateEnvoi'];?>
" disabled>
                </div>
               </div>

               <?php $_smarty_tpl->_assignInScope('dateDemande', substr($_smarty_tpl->tpl_vars['record']->value['date'],0,10));?>
               <?php $_smarty_tpl->_assignInScope('heureDemande', substr($_smarty_tpl->tpl_vars['record']->value['date'],11));?>
               <div class="col-xs-4">
                   <label for="dateDemande">Date de la demande</label>
                   <!-- <div class="input-group"> -->
                       <input type="text" id="dateDemande" class="form-control datepicker disabled" name="dateDemande" value="<?php echo $_smarty_tpl->tpl_vars['dateDemande']->value;?>
" disabled>
                       <!-- <a href="javascript:void(0)"
                            title="Cliquer pour modifier la date"
                            type="button"
                            class="btn btn-success input-group-addon"
                            id="freeDate">
                            <i class="fa fa-calendar"></i>
                        </a> -->
                   <!-- </div> -->
               </div>

               <div class="col-xs-4">
                   <label for="heureDemande">Heure de la demande</label>
                   <input type="text"
                        id="heureDemande"
                        class="form-control"
                        name="heureDemande"
                        value="<?php echo $_smarty_tpl->tpl_vars['heureDemande']->value;?>
"
                        title="non modifiable"
                        disabled>
                </div>

                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="Statut">Statut</label>
                        <select class="form-control" name="statut" id="modalStatut">
                            <option value="">Statut de la demande</option>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeStatuts']->value, 'statutFr', false, 'statut');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['statut']->value => $_smarty_tpl->tpl_vars['statutFr']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['statut']->value;?>
"
                             <?php if ($_smarty_tpl->tpl_vars['record']->value['statut'] == $_smarty_tpl->tpl_vars['statut']->value) {?>selected<?php }?>
                             <?php if (($_smarty_tpl->tpl_vars['statut']->value == 'rvInscription')) {?> disabled<?php }?>
                             <?php if (($_smarty_tpl->tpl_vars['statut']->value == 'confEnvoye')) {?> disabled<?php }?>
                             ><?php echo $_smarty_tpl->tpl_vars['statutFr']->value;?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                </div>

            </div>

       </div>
     </div>

     <div class="btn-group pull-right">
         <button type="reset" class="btn btn-default">Annuler</button>
         <button type="button" class="btn btn-primary" id="envoyer">Enregistrer</button>
         <input type="hidden" name="id" id="id" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
">
     </div>

     <div class="clearfix"></div>

</form>

<?php echo '<script'; ?>
 type="text/javascript">

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

    $(document).ready(function(){

        $(phoneFormatter);

        $('#modalStatut').change(function(){
            var idRV = $('#modalDateRV').val();
            var newStatut = $('#modalStatut').val();
            if (idRV != ''){
                bootbox.confirm({
                    title: 'Attention',
                    message: 'Vous allez supprimer le RV.',
                    callback: function(result){
                        if (result == true){
                            var idInscription = $('#id').val();
                            $.post('inc/delRV.inc.php', {
                                idInscription: idInscription,
                                idRV: idRV,
                                newStatut: newStatut
                            }, function(resultat){
                                $('#modalDateRV').val('');
                            })
                        }

                    }
                })
            }

        })

        $('#freeDate').click(function(){
            $('#dateDemande').prop('disabled', false).addClass('selected');
        })

        $('#setHeure').click(function(){
            var today = new Date();
            var time = today.getHours() + ":" + today.getMinutes();
            $('#heureRV').timepicker('setTime', time);
        })

        $('#delHeure').click(function(){
            $('#heureRV').timepicker('setTime', '');
        })

        $('#delDate').click(function(){
            $(this).next('input').datepicker('update', '');
        })

        $('#btn-cancelPrior').click(function(){
            $('.section').prop('checked', false);
            $('#nomPrioritaire').val('');
            $('#classe').val('');
        })

        $('.summernote').summernote({
    		lang: 'fr-FR', // default: 'en-US'
    		height: null, // set editor height
    		minHeight: 150, // set minimum height of editor
    		focus: true, // set focus to editable area after initializing summernote
    		toolbar: [
    		  ['style', ['style']],
    		  ['font', ['bold', 'underline', 'clear']],
    		  ['font', ['strikethrough', 'superscript', 'subscript']],
    		  ['color', ['color']],
    		  ['para', ['ul', 'ol', 'paragraph']],
    		  ['table', ['table']],
    		  ['insert', ['link', 'picture', 'video']],
    		  ['view', ['fullscreen', 'codeview', 'help']],
    		],
    		maximumImageFileSize: 2097152,
    		dialogsInBody: true,
    		callbacks: {
    			onImageUpload: function(files, editor, welEditable) {
    				for (var i = files.length - 1; i >= 0; i--) {
    					sendFile(files[i], this);
    				}
    			},
    			onMediaDelete : function(target) {
    				deleteFile(target[0].src);
    			}
    		}
    	});

        $('.datepicker').datepicker({
            clearBtn: true,
            language: "fr",
            autoclose: true,
            todayHighlight: true,
            format: 'dd/mm/yyyy',
        })

        $('.datepickerFutur').datepicker({
            clearBtn: true,
            language: "fr",
            autoclose: true,
            todayHighlight: true,
            format: 'dd/mm/yyyy',
            startDate: '+1d',
        })

         $('.timepicker').timepicker({
             showMeridian: false,
             minuteStep: 5,
             showInputs: true,
         });

        $('#formulaire').validate({
            rules: {
                nom: 'required',
                prenom: 'required',
                adresse: 'required',
                mail: 'required',
                telephone: 'required',
                nomEnfant: 'required',
                prenomEnfant: 'required',
                sexe: 'required',
                dateNais: 'required',
            }
        });
    })

<?php echo '</script'; ?>
>
<?php }
}
