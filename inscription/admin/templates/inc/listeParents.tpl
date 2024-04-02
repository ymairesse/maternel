{if $listeParents|count > 0}
<select size="{$listeParents|count}" id="selParents" name="selParents" style="width:100%; border: 2px solid rgb(0, 200, 0); padding-left:0.5em;">
{foreach from=$listeParents key=idInscription item=data name=parents}

    <option value="{$idInscription}" title="{$data.nomEnfant} {$data.prenomEnfant}" data-toggle="popover">
        {$smarty.foreach.parents.iteration}. {if $data.salutation == 'Monsieur'}M. {else}Mme{/if} 
        {$data.nomParent} {$data.prenomParent} 
        -> {$data.nomEnfant} {$data.prenomEnfant}
    </option>

{/foreach}
</select>
{else} 

{/if}

