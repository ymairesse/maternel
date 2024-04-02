<div
  id="modalSimulation"
  class="modal fade"
  tabindex="-1"
  role="dialog"
  aria-labelledby="modalSimulationLabel"
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
        <h4 class="modal-title" id="modalSimulationLabel">
          Simulation d'envoi de <strong>{$listeReady|@count}</strong> mail(s)
        </h4>
      </div>

      <div class="modal-body" style="height: 30em; overflow: auto">
        {if $listeReady == Null}
        <p style="font-weight: bold; font-size: 24pt">
          Aucun mail prêt pour l'envoi
        </p>
        {else} {$texteMails} {/if}
      </div>
    </div>
  </div>
</div>
