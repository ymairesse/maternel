<div class="col-xs-12" id="foot">
  <h1>
    Gestion des demandes d'inscription
    <span class="pull-right" id="nbDemandes"
      >[{$listeDemandes|@count} demandes]</span
    >
  </h1>
  <form id="listeInscriptions">
    <table
      class="table table-condensed table-striped"
      id="tableauAdmin"
      data-sortable
    >
      <thead>
        <tr>
          <th style="width: 2%">&nbsp;</th>
          <th style="width: 4%" class="sort_date">Date</th>
          <th style="width: 4%" class="sort_salutation">Mme/M</th>
          <th style="width: 10%" class="sort_nomParent">Nom parent</th>
          <th style="width: 10%" class="sort_prenomParent">Prénom parent</th>
          <th style="width: 10%" class="sort_mail">Mail</th>
          <th style="width: 10%" class="sort_telephone">Tél</th>
          <th style="width: 15%" class="sort_enfant">Enfant (Pr/N)</th>
          <th style="width: 5%" class="sort_sexe">Sexe</th>
          <th style="width: 10%" class="sort_dateNaissance">D. de naissance</th>
          <th style="width: 8%" class="sort_statut">Statut</th>
          <th style="width: 4%" title="Prioritaire" class="sort_prioritaire">
            <i class="fa fa-exclamation-circle"></i>
          </th>
          <th style="width: 4%" class="sort_texteStatut">&nbsp;</th>
          <th style="width: 4%" data-sortable="false">&nbsp;</th>
        </tr>
      </thead>

      <tbody>
        {include file="inc/allRowsTableauAdmin.tpl"}
      </tbody>
    </table>
  </form>
</div>

<div id="boiteModale">
  <div
    id="modalDetailsId"
    class="modal fade"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modalDetailsIdLabel"
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
          <h4 class="modal-title" id="modalDetailsIdLabel">Informations</h4>
        </div>
        <div class="modal-body">{* ici le formulaire de modification *}</div>
      </div>
    </div>
  </div>
</div>

<div id="modal"></div>

<script type="text/javascript">
  $(document).ready(function () {
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();

      $("#tableauAdmin").on("click", "tr", function () {
      $("#tableauAdmin tr").removeClass("cible");
      $(this).addClass("cible");
    });
  });
</script>
