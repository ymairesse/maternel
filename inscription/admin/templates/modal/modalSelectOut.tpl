<div id="modalSelectOut" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalSelectOutLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="modalSelectOutLabel">Sélection pour annulation</h4>
      </div>
      <div class="modal-body">

          <div class="col-xs-5">
              <div class="form-group">
                  <label for="dnais">Date de naissance</label>
                  <input type="text" class="form-control datepicker" name="dateNais" id="dateNais" value="{$record.dateNaissance|default:''}">
                  <div class="helpblock">Veuillez sélectionner la date limite</div>
              </div>
          </div>
          <div class="col-xs-7">
              <p>Sélection des inscriptions sur base de la date de naissance en vue d'annulation.</p>
              <p>Cette fonction ne fait que marquer les inscriptions annulées mais ne les supprime pas.</p>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="modalSelectDate" name="button">Sélectionner</button>
      </div>
    </div>
  </div>
</div>

<script>

  $(document).ready(function(){

    $('.datepicker').datepicker({
        clearBtn: true,
        language: "fr",
        autoclose: true,
        todayHighlight: true,
        format: 'dd/mm/yyyy',
    })

  })

</script>
