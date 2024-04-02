<div id="modalDatesRV" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalDatesRVLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="modalDatesRVLabel">Gestion des dates de RV</h4>
      </div>
      <div class="modal-body">

          <div class="col-xs-6" style="max-height: 25em; overflow: auto;" id="listeDatesRV">

              {include file="inc/tableauModalDatesRV.tpl"}

          </div>
          <div class="col-xs-6">

                <div id="listeParents" style="max-height: 10em; overflow: auto; background-color: mistyrose;"></div>

              <form id="formEditRV">
                  <div class="row">

                        <p id="warningRV" class="hidden" style="background-color: red; color: white; padding: 2px"><i class="fa fa-exclamation-circle"></i> Un ou plusieurs RV déjà fixés</p>

                      <div class="col-xs-7">
                          <div class="form-group">
                              <label for="dateRV">Date de RV</label>
                              <input type="text" class="form-control datepicker" id="dateRV" name="dateRV" value="" placeholder="Choix de date">
                          </div>

                      </div>
                      <div class="col-xs-5">
                          <div class="form-group">
                              <label for="heureRV">Heure de RV</label>
                              <input type="text" class="form-control timepicker" id="heureRV" name="heureRV" value="" placeholder="Heure">
                          </div>

                      </div>
                    </div>

                    <div class="row">

                      <div class="col-xs-5">
                          <div class="form-group">
                              <input type="text" class="form-control" id="nbPlaces" name="nbPlaces" value="" placeholder="Occupation">
                              <span class="helpblock">Nombre de places disponibles</span>
                          </div>
                      </div>
                      <div class="col-xs-7">
                          <button 
                            type="button" 
                            class="btn btn-success btn-block" 
                            id="btn-saveDate">
                            <i class="fa fa-save"></i> Enregistrer
                        </button>
                      </div>

                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                        <button type="button" class="btn btn-warning btn-block" id="btn-addDate">Ajouter une date</button>

                    </div>

                  </div>
                  <input type="hidden" name="id" id="id" value="">
                  <input type="hidden" name="nbMin" id="nbMin" value="">
              </form>
          </div>

      </div>

      <div class="clearfix"></div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Terminer</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){

        $('#formEditRV').validate({
            rules: {
                dateRV: 'required',
                heureRV: 'required',
                nbPlaces: {
                    required: true,
                    number: true,
                }
            }
        })

        $('.datepicker').datepicker({
            clearBtn: true,
            language: "fr",
            autoclose: true,
            todayHighlight: true,
            format: 'dd/mm/yyyy',
            }
        );

        $('.timepicker').timepicker({
            showMeridian: false,
            minuteStep: 5,
            showInputs: true,
            defaultTime: null
        });
    })

</script>
