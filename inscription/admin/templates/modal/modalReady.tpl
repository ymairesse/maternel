<div id="modalMailOK" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalMailOKLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="modalMailOKLabel">Liste des <strong>{$listeReady|@count}</strong> mail(s) de confirmation à envoyer</h4>
      </div>
      <div class="modal-body" style="max-height:25em; overflow: auto;">

          <form id="formModalReady">
              <table class="table table-condensed table-striped">
                  <thead>
                      <tr>
                          <th style="background-color: #aaa;"><input type="checkbox" id="checkUnCheck" checked title="cocher/décocher tout"></th>
                          <th>Nom du parent</th>
                          <th>Mail</th>
                          <th>Nom de l'enfant</th>
                          <th>Classe</th>
                          <th>RV</th>
                      </tr>
                  </thead>
                  <tbody>
                      {foreach from=$listeReady key=idInscription item=data}
                      <tr data-idinscription="{$idInscription}">
                          <td><input class="cbMail" type="checkbox" name="cb[]" value="{$idInscription}" checked></td>
                          <td>{$data.salutation} {$data.prenomParent} {$data.nomParent}</td>
                          <td><a href="mailto:{$data.mail}">{$data.mail}</a></td>
                          <td>{$data.prenomEnfant} {$data.nomEnfant}</td>
                          <td>{$data.nomClasse}</td>
                          {assign var=idRV value=$data.idRV}
                          <td data-idrv="{$idRV}">{$listeRV.$idRV.date} {$listeRV.$idRV.heure}</td>
                      </tr>
                      {/foreach}
                  </tbody>

              </table>

          </form>

      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="btn-sendMail">Envoyer les mails</button>
      </div>
    </div>
  </div>
</div>


<script>

  $('document').ready(function(){

    $('#checkUnCheck').change(function(){

      $('.cbMail').each(function(){
        var ceci = $(this);
        if ((ceci).is(':checked'))
          ceci.prop('checked', false)
          else ceci.prop('checked', true);
      });

    });

  })


</script>