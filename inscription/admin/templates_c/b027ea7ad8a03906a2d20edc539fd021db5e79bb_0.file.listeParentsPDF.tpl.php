<?php
/* Smarty version 3.1.32-dev-38, created on 2022-12-24 15:00:51
  from '/home/yves/www/maternel/inscription/admin/templates/listeParentsPDF.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63a706131e7630_29405940',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b027ea7ad8a03906a2d20edc539fd021db5e79bb' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/listeParentsPDF.tpl',
      1 => 1671890443,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63a706131e7630_29405940 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
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

    <h2>Réunion des parents du <?php echo $_smarty_tpl->tpl_vars['dateHeure']->value['date'];?>
 à <?php echo $_smarty_tpl->tpl_vars['dateHeure']->value['heure'];?>
</h2>

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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeParents']->value, 'data', false, 'wtf', 'parents', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['wtf']->value => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_parents']->value['iteration']++;
?>
            <tr>
                <td style="text-align:center">
                    <p><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_parents']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_parents']->value['iteration'] : null);?>
</p>
                </td>
                <td>
                    <p><?php if ($_smarty_tpl->tpl_vars['data']->value['salutation'] == 'Monsieur') {?>M. <?php } else { ?>Mme<?php }?></p>
                </td>
                <td class="parent">
                    <p><?php echo $_smarty_tpl->tpl_vars['data']->value['nomParent'];?>
</p>
                </td>
                <td class="parent">
                    <p><?php echo $_smarty_tpl->tpl_vars['data']->value['prenomParent'];?>
</p>
                </td>
                <td>
                    <p><?php echo $_smarty_tpl->tpl_vars['data']->value['nomEnfant'];?>
</p>
                </td>
                <td>
                    <p><?php echo $_smarty_tpl->tpl_vars['data']->value['prenomEnfant'];?>
</p>
                </td>
                <td>
                    <p><?php echo $_smarty_tpl->tpl_vars['data']->value['telephone'];?>
</p>
                </td>
                <td>
                    <p><?php echo $_smarty_tpl->tpl_vars['data']->value['mail'];?>
</p>
                </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>

    <hr style="height: 1px;">
    <p>Liste générée le <?php echo $_smarty_tpl->tpl_vars['dateGeneration']->value;?>
 à <?php echo $_smarty_tpl->tpl_vars['heureGeneration']->value;?>
</p>

</page><?php }
}
