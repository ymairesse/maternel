<style>
    table {
        border-collapse: collapse;
    }

    th.parent,
    td.parent {
        background-color: #eee;

    }

    th {
        text-align: center;
    }

    p {
        margin: 0.5em;
        padding: 0.5em;

    }

    td,
    th {
        border: 1px solid grey;
    }
</style>

<page backtop="7mm" backbottom="7mm" backleft="10mm" backright="20mm">

    <page_header> 
        <img src="../../images/logoEcoleBlanc.png" alt="test" style="float:right;">
    </page_header>

    <h2>Réunion des parents du {$dateHeure.date} à {$dateHeure.heure}</h2>

    <table>
        <thead>
            <tr>
                <th style="width:3%">&nbsp;</th>
                <th class="parent" style="width:5%">M/Mme</th>
                <th class="parent" style="width:15%">Nom Parent</th>
                <th class="parent" style="width:15%">Prénom</th>
                <th style="width:15%">Nom Enfant</th>
                <th style="width:15%">Prénom</th>
                <th style="width:11%">Téléphone</th>
                <th style="width:21%">Mail</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$listeParents key=wtf item=data name=parents}
            <tr>
                <td style="text-align:center">
                    <p>{$smarty.foreach.parents.iteration}</p>
                </td>
                <td>
                    <p>{if $data.salutation == 'Monsieur'}M. {else}Mme{/if}</p>
                </td>
                <td class="parent">
                    <p>{$data.nomParent}</p>
                </td>
                <td class="parent">
                    <p>{$data.prenomParent}</p>
                </td>
                <td>
                    <p>{$data.nomEnfant}</p>
                </td>
                <td>
                    <p>{$data.prenomEnfant}</p>
                </td>
                <td>
                    <p>{$data.telephone}</p>
                </td>
                <td>
                    <p>{$data.mail}</p>
                </td>
            </tr>
            {/foreach}
        </tbody>
    </table>

    <hr style="height: 1px;">
    <p>Liste générée le {$dateGeneration} à {$heureGeneration}</p>

</page>