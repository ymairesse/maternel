{foreach from=$usersList key=userName item=unUser}
<option value="{$userName}" data-nom="{$unUser.nom}" data-prenom="{$unUser.prenom}" data-mail="{$unUser.mail}">
    {$unUser.nom} {$unUser.prenom}
</option>
{/foreach}