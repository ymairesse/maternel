<div class="panel panel-default">

    <div class="panel-heading">
        <h1>ISND - MATERNEL Demande d'inscription</h1>
    </div>

    <div class="panel-body" style="background-color:#ccf">

        {if $statut == 'Attente de confirmation'}
            <p class="intro">Vous pouvez maintenant confirmer votre demande d'inscription. Veuillez vérifier que toutes les informations sont correctes avant de cliquer sur le bouton "Confirmer" au bas de la page.<br>
            <span style="color:red">Une demande d'inscription non confirmée est annulée 48h après la demande.</span></p>
            {else}
            <p class="intro">Voici les informations que vous nous avez fait parvenir.</p>
        {/if}

        <div class="col-lg-4 col-md-6 col-sm-12">

            <h2>Coordonnées des parents</h2>

            <div class="form-group">
                <label for="salut">Madame/Monsieur</label>
                <select class="form-control" name="salut">
                    <option value="">Choisir</option>
                    <option value="Madame" {if $record.salutation == 'Madame'}selected{/if}>Madame</option>
                    <option value="Monsieur" {if $record.salutation == 'Monsieur'}selected{/if}>Monsieur</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nom">Nom de famille</label>
                <input type="text" class="form-control" name="nom" value="{$record.nomParent}">
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" value="{$record.prenomParent}">
            </div>

            <div class="form-group">
                <label for="adresse">Adresse postale</label>
                <textarea name="adresse" id="adresse" class="form-control" placeholder="Adresse postale complète" rows="2" cols="80">{$record.adresse}</textarea>
            </div>

            <div class="form-group">
                <label for="mail">Adresse mail du responsable</label>
                <input type="email" class="form-control" name="mail" value="{$record.mail}">
                <p class="help-block">Important! Cette adresse mail doit être fonctionnelle.</p>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" class="form-control" name="telephone" value="{$record.telephone}">
            </div>

        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">

            <h2>Votre enfant</h2>

            <div class="form-group">
                <label for="nom">Nom de famille de l'enfant</label>
                <input type="text" class="form-control" name="nomEnfant" value="{$record.nomEnfant}">
            </div>

            <div class="form-group">
                <label for="prenom">Prénom de l'enfant</label>
                <input type="text" class="form-control" name="prenomEnfant" value="{$record.prenomEnfant}">
            </div>

            <div class="form-group">
                <label for="sexe">Sexe de l'enfant</label>
                <label class="radio-inline"><input type="radio" name="sexe" value="F"{if $record.sexe == 'F'} checked{/if}>F</label>
               <label class="radio-inline"><input type="radio" name="sexe" value="M"{if $record.sexe == 'M'} checked{/if}>M</label>
               <label class="radio-inline"><input type="radio" name="sexe" value="A"{if $record.sexe == 'A'} checked{/if}>Autre</label>
                <p class="help-block sr-only">Sexe de l'enfant</p>
            </div>

            <div class="form-group">
                <label for="dnais">Date de naissance</label>
                <input type="text" class="form-control" name="dateNais" value="{$record.dateNaissance}">
            </div>

            <div class="form-group">
                <label for="creche">Crèche de l'enfant</label>
                <textarea name="creche" id="creche" class="form-control">{$record.creche|default:''}</textarea>
            </div>

            <div class="form-group">
                <label for="ecole">École actuelle de l'enfant</label>
                <textarea name="creche" id="creche" class="form-control">{$record.ecole|default:''}</textarea>
            </div>

            <div class="form-group">
                <label for="ecole">Motif du changement d'école</label>
                <textarea name="creche" id="creche" class="form-control">{$record.raison|default:''}</textarea>
            </div>

        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">

            <h2>Autre enfant déjà à l'ISND</h2>

            <p>Laisser libre si pas d'autre enfant de la famille à l'ISND</p>

            <div class="form-group">

                <label for="section">En quelle section</label> <br>

                <label class="radio-inline">
                    <input type="radio" class="section" name="section" value="N" disabled{if $record.section==''} checked{/if}>Pas d'autre enfant
                </label>

                <label class="radio-inline">
                    <input type="radio" class="section" name="section" value="M" disabled{if $record.section=='M'} checked{/if}>
                    Maternel
                </label>

                <label class="radio-inline">
                    <input type="radio" class="section" name="section" value="P" disabled{if $record.section=='P'} checked{/if}>
                    Primaire
                </label>

                <label class="radio-inline">
                    <input type="radio" class="section" name="section" value="S" disabled{if $record.section=='S'} checked{/if}>
                    Secondaire
                </label>

            </div>

            <div class="form-group">
                <label for="nomPrenom">Nom et prénom de cet enfant</label>
                <input type="text" class="form-control" name="nomPrioritaire" id="nomPrioritaire" placeholder="Nom et prénom" autocomplete="off"  maxlength="40" value="{$record.nomPrioritaire|default:''}">
                <p class="help-block sr-only">Nom et prénom de cet enfant</p>
            </div>

            <div class="form-group">
                <label for="nomPrenom">Classe de cet enfant</label>
                <input type="text" class="form-control" name="classe" id="classe" placeholder="En quelle classe" autocomplete="off"  maxlength="6" value="{$record.classe}">
                <p class="help-block sr-only">En quelle classe est cet enfant</p>
            </div>

            <div class="form-group" style="background-color:red; color: white;">
                <label for="statut">Statut de votre demande</label>
                <input type="text" class="form-control" name="statut" id="statut" value="{$statut}">
            </div>

            <h2>Remarque libre</h2>

            <div class="form-group">
                <label for="remarque">Que voulez-vous ajouter?</label>
                <textarea name="remarque" class="form-control">{$record.remarque}</textarea>
            </div>

            {if $statut == 'Attente de confirmation'}
            <button type="button" class="btn btn-success btn-block" data-id="{$record.id}" id="confirmer">Confirmer</button>
            {/if}

        </div>

    </div>

</div>

</div>

</div>

<script type="text/javascript">
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
</script>
