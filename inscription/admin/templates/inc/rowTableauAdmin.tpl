    <td><input type="checkbox" name="selection[]" class="selection" value="{$id}" {if $data.statut =='rvInscription'}disabled{/if}></td>
    <td>{$record.date}</td>
    <td>{if $record.salutation == 'Madame'}Mme{else}M.{/if}</td>
    <td>{$record.nomParent}</td>
    <td>{$record.prenomParent}</td>
    <td><a href="mailto:{$record.mail}">{$record.mail}</a></td>
    <td>{$record.telephone}</td>
    <td>{$record.prenomEnfant} {$record.nomEnfant}</td>
    <td>{$record.sexe}</td>
    <td>{$record.dateNaissance}</td>

    <td data-value="{$record.phrase}">{$record.phrase|default:'aaaaaahNoooon'}</td>
    <td>
        {if $record.nomPrioritaire != ''}
                <button type="button"
                    class="btn btn-danger btn-xs"
                    data-toggle="popover"
                    data-title="Inscription prioritaire"
                    data-content="{$record.nomPrioritaire}"
                    data-placement="left"
                    data-trigger="hover"
                    data-html="true">
                    {$record.section} {$record.classe}
                </button>
            {else}
            -
        {/if}
    </td>
    <td>
        <button type="button"
            class="btn btn-xs btn-block btn-infoRecord {if $record.texteStatut != ''}btn-success{else}btn-default{/if}"
            class="btn btn-xs btn-block btn-infoRecord"
            data-html="true"
            data-toggle="popover"
             {if $record.texteStatut != ''}
                data-title="Notes"
                data-content="{$record.texteStatut}"
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
            {if $statut != 'annule'} disabled title="Seules les demandes annulées peuvent être supprimées"{/if}>
            <i class="fa fa-times"></i>
        </button>
    </td>

<script type="text/javascript">

    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    })

</script>
