<div id="modalDelCanceled" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalDelCanceledLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalDelCanceledLabel">Effacement définitif des <strong>{$listCanceled|count}</strong> demandes annulées</h4>
            </div>
            <div class="modal-body" style="max-height:15em; overflow: auto;">
                <table class="table table-condensed">
                    <tr>
                        <th>&nbsp;</th>
                        <th>Enfant</th>
                        <th>Parent</th>
                        <th>Date demande</th>
                    </tr>
                    {foreach from=$listCanceled key=id item=annule name=annulation}
                        <tr>
                            <td>{$smarty.foreach.annulation.iteration}</td>
                            <td>{$annule.nomEnfant} {$annule.prenomEnfant}</td>
                            <td><a href='mailto:{$annule.mail}'>{$annule.nomParent} {$annule.prenomParent}</a></td>
                            <td>{$annule.date}</td>
                        </tr>
                    {/foreach}

                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" id="btn-modalConfirmDelCanceled">Effacement définitif</button>
            </div>
        </div>
    </div>
</div>