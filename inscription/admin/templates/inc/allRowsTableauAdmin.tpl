{foreach from=$listeDemandes key=id item=data}
    {assign var=statut value=$data.statut|default:Null}
    <tr data-id="{$id}" class="{$statut}">
        <td><input type="checkbox" name="selection[]" class="selection" value="{$id}" {if $data.statut =='rvInscription'}disabled{/if}></td>
        <td data-value="{$data.dateSQL}">{$data.date}</td>
        <td>{if ($data.salutation == 'Madame')}Mme{else}M.{/if}</td>
        <td>{$data.nomParent}</td>
        <td>{$data.prenomParent}</td>
        <td><a href="mailto:{$data.mail}">{$data.mail}</a></td>
        <td>{$data.telephone}</td>
        <td>{$data.prenomEnfant} {$data.nomEnfant}</td>
        <td>{$data.sexe}</td>
        <td data-value="{$data.dateNaissanceSQL}">{$data.dateNaissance}</td>
        <td data-value="{$data.phrase}">{$data.phrase}</td>
        <td>
        {if $data.nomPrioritaire != ''}
                <button type="button"
                    class="btn btn-danger btn-xs"
                    data-toggle="popover"
                    data-title="Inscription prioritaire"
                    data-content="{$data.nomPrioritaire}"
                    data-placement="left"
                    data-trigger="hover"
                    data-html="true">
                    {$data.section} {$data.classe}
                </button>
            {else}
            -
        {/if}
        <td data-value="{$data.texteStatut}">
            <button type="button"
                class="btn btn-xs btn-block btn-infoRecord {if $data.texteStatut != ''}btn-success{else}btn-default{/if}"
                class="btn btn-xs btn-block btn-infoRecord"
                data-html="true"
                data-toggle="popover"
                 {if $data.texteStatut != ''}
                    data-title="Notes"
                    data-content="{$data.texteStatut}"
                 {/if}
                data-placement="left"
                data-trigger="hover"
                data-id="{$id}">
                <i class="fa fa-info"></i>
            </button>
        </td>
        <td>
            <button type="button"
                class="btn btn-danger btn-xs btn-del"
                data-id="{$id}"
                data-toggle="tooltip"
                {if $statut != 'annule'} disabled title="Seules les demandes annulées peuvent être supprimées"
                    {else}
                    title="Supprimer cette demande annulée"
                {/if}>
                <i class="fa fa-times"></i>
            </button>
        </td>
    </tr>
{/foreach}