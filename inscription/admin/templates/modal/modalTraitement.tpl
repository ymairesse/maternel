<div id="modalTraitement" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTraitementLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalTraitementLabel">Acceptations d'inscription</h4>
            </div>
            <div class="modal-body">
                <form id="formModalOK">
                    <div class="col-xs-7">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Inscriptions sélectionnées <span class="badge badge-primary">{$listeSelection|@count}</span>
                            </div>
                            <div class="panel-body">
                                <table class="table table-condensed table-striped">
                                    <thead>
                                        <tr>
                                            <th>Parent</th>
                                            <th>Enfant</th>
                                        </tr>
                                    </thead>
                                    {foreach from=$listeSelection key=id item=data}
                                    <tr>
                                        <td class="{$data.sexe}">{$data.salutation} {$data.nomParent} {$data.prenomParent}</td>
                                        <td>{$data.prenomEnfant} {$data.nomEnfant}
                                            <input type="hidden" name="id[]" value="{$id}"> </td>
                                    </tr>
                                    {/foreach}
                                </table>
                            </div>

                        </div>

                    </div>

                    <div class="col-xs-5">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Sélection d'une date
                            </div>
                            <div class="panel-body" style="max-height:15em; overflow: auto;">

                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>Places</th>
                                            <th style="width:2em">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach from=$datesRV key=id item=data}
                                        <tr>
                                            <td>{$data.date}</td>
                                            <td>{$data.heure}</td>
                                            {assign var=RVreste value=$data.nbPlaces - $listeRVpris.$id.nb}
                                            <td>{$RVreste} / {$data.nbPlaces}</td>
                                            <td>
                                                <input type="radio"
                                                    name="idRV"
                                                    class="dateRV"
                                                    value="{$id}"
                                                    {if ($RVreste) < ($listeSelection|@count)} 
                                                    disabled
                                                    title="Nombre de places insuffisant"
                                                    {/if}>
                                            </td>
                                        </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                <div class="clearfix"></div>
                </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btn-saveAcceptation">Confirmer ce(s) RV</button>
            </div>

        </div>

    </div>
</div>
