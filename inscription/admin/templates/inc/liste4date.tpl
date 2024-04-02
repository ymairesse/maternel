<form id="formList2cancel">
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Nom du parent</th>
        <th>Nom de l'enfant</th>
        <th>Date de naissance</th>
        <th><input type="checkbox" id="cbAllDate" title="cocher/décocher tout"></th>
      </tr>
    </thead>
    <tbody>
      {foreach from=$liste4date key=id item=data}
      <tr>
        <td>{$data.prenomParent} {$data.nomParent}</td>
        <td>{$data.prenomEnfant} {$data.nomEnfant}</td>
        <td>{$data.dateNaissance}</td>
        <td><input type="checkbox" name="cbDate[]" class="cbDate" value="{$id}" checked="true"></td>
      </tr>
      {/foreach}
    </tbody>
  </table>
</form>
