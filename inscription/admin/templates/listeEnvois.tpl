<h4>{$listeEnvois|@count} mail(s) envoyé(s)</h4>

<ul>
{foreach from=$listeEnvois key=wtf item=data}
    <li>{$data}</li>
{/foreach}
</ul>

