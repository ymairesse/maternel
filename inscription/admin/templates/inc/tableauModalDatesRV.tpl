<table class="table table-striped">
  <thead>
    <tr>
      <th style="width:2em"><span class="badge badge-primary">{$datesRV|@count}</span></th>
      <th>Date</th>
      <th>Heure</th>
      <th>Occupation</th>
      <th style="width:2em">&nbsp;</th>
      <th style="width:1em">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    {foreach from=$datesRV key=id item=data}
    <tr data-id="{$id}" data-daterv="{$data.date}" data-heure="{$data.heure}" data-nbplaces="{$data.nbPlaces}"
      data-nbrv="{$nbRV4date.$id.nb|default:0}">
      <td>
        <button type="button" class="btn btn-danger btn-xs btn-delRV" {if isset($datesAvecRV.$id)} disabled{/if}><i
            class="fa fa-times"></i></button>
      </td>
      <td>{$data.date}</td>
      <td>{$data.heure}</td>
      <td>{$nbRV4date.$id.nb|default:0} / {$data.nbPlaces}</td>
      <td>
        <div class="btn-group">
          <button type="button" class="btn btn-success btn-xs btn-editRV" title="Cliquer pour modifier">
            <i class="fa fa-check"></i>
          </button>
      </td>
      <td>
        <a type="button" class="btn btn-warning btn-xs btn-pdfParents"
          href="/maternel/inscription/admin/inc/listeParentsPDF.php?idRV={$id}" 
          {if !isset($datesAvecRV.$id)} disabled{/if}>
          <i class="fa fa-file-pdf-o"></i>
        </a>
      </td>
    </tr>
    {/foreach}
  </tbody>
</table>