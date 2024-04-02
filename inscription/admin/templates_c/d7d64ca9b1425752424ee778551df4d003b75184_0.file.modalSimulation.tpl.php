<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-28 10:02:59
  from '/home/yves/www/maternel/inscription/admin/templates/modal/modalSimulation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63d4e4c37bf249_89380885',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd7d64ca9b1425752424ee778551df4d003b75184' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/modal/modalSimulation.tpl',
      1 => 1674896572,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d4e4c37bf249_89380885 (Smarty_Internal_Template $_smarty_tpl) {
?><div
  id="modalSimulation"
  class="modal fade"
  tabindex="-1"
  role="dialog"
  aria-labelledby="modalSimulationLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
        
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="modalSimulationLabel">
          Simulation d'envoi de <strong><?php echo count($_smarty_tpl->tpl_vars['listeReady']->value);?>
</strong> mail(s)
        </h4>
      </div>

      <div class="modal-body" style="height: 30em; overflow: auto">
        <?php if ($_smarty_tpl->tpl_vars['listeReady']->value == Null) {?>
        <p style="font-weight: bold; font-size: 24pt">
          Aucun mail prêt pour l'envoi
        </p>
        <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['texteMails']->value;?>
 <?php }?>
      </div>
    </div>
  </div>
</div>
<?php }
}
