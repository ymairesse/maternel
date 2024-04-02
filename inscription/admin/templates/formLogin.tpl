<h1>Administration</h1>

<div class="row">

    <div class="col-md-6 col-xs-12">

        <form id="formLogin">

            <div class="form-group">
                <label for="mail">Votre adresse mail</label>
                <input type="mail" name="mail" id="mail" value="" class="form-control" placeholder="Adresse mail" autocomplete="on">
                <div class="helpBlock">Adresse mail de l'administrateur</div>
            </div>

            <div class="form-group">
                <label for="passwd">Mot de passe</label>
                <input type="password" name="passwd" id="passwd" value="" class="form-control" placeholder="Mot de passe" autocomplete="off">
                <div class="helpBlock">Le mot de passe de l'administrateur</div>
            </div>

            <button type="button" class="btn btn-primary pull-right" id="btnLogin">Entrer</button>

        </form>

    </div>

    <div class="col-md-6 col-xs-12" id="message">

    </div>

</div>

<script type="text/javascript">

    $(document).ready(function(){

        $('#formLogin').validate({
            rules: {
                mail: {
                    required: true,
                    email: true
                },
                passwd: {
                    required: true
                }
            }
        });

        $('#formLogin').on('keydown', 'input.error', function(){
            $(this).removeClass('error');
        })

        $('#btnLogin').click(function(){
            if ($('#formLogin').valid()) {
                var formulaire = $('#formLogin').serialize();
                $.post('inc/startSession.inc.php', {
                    formulaire: formulaire
                }, function(resultat){
                    $('#corpsPage').html(resultat);
                })
            }
        })
    })

</script>
