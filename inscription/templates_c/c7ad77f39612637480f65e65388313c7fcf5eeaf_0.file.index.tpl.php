<?php
/* Smarty version 3.1.32-dev-38, created on 2023-01-02 18:21:33
  from '/home/yves/www/maternel/inscription/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63b3129d0e81d3_81936141',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7ad77f39612637480f65e65388313c7fcf5eeaf' => 
    array (
      0 => '/home/yves/www/maternel/inscription/templates/index.tpl',
      1 => 1667812188,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63b3129d0e81d3_81936141 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ISND - MATERNEL Demande d'inscription</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    	<link rel="stylesheet" href="screen.css" type="text/css" media="screen">
    	<link rel="stylesheet" href="bootstrap/fa/css/font-awesome.min.css" type="text/css" media="screen, print">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">

    	<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
    	<?php echo '<script'; ?>
 type="text/javascript" src="bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/locales/bootstrap-datepicker.fr.min.js" charset="UTF-8"><?php echo '</script'; ?>
>

    	<?php echo '<script'; ?>
 type="text/javascript" src="js/bootbox.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.validate.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="js/jsCookie/src/js.cookie.js"><?php echo '</script'; ?>
>

        <style media="screen">
            #top {
                overflow: hidden;
                background-image: url("images/cropped-5.png");
                background-repeat: no-repeat;
                background-size: cover;
                height: 560px;
                resize: vertical;
            }
        </style>
    </head>
    <body>

        <div class="container-fluid">

            <div class="row">
                <div class="col-xs-12" id="top">
                    <button type="button" class="btn btn-success btn-xs" id="btn-ViewMinus"><i class="fa fa-arrow-up"></i></button>
                    <button type="button" class="btn btn-warning btn-xs" id="btn-ViewPlus"><i class="fa fa-arrow-down"></i></button>
                </div>

                <div id="corpsPage">
                    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['corpsPage']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                </div>
            </div>
        </div>

    </body>

<?php echo '<script'; ?>
 type="text/javascript">

    var topHeight = Cookies.get('topHeight');
    $('#top').height(topHeight);

    $(document).ready(function(){

        $('#btn-ViewMinus').click(function(){
            var top = document.getElementById("top");
            var height = top.offsetHeight - 20;
            if (height > 20) {
                $('#top').height(height);
                Cookies.set('topHeight', height, { sameSite: 'strict' } );
            }
        })

        $('#btn-ViewPlus').click(function(){
            var top = document.getElementById("top");
            var height = top.offsetHeight + 20;
            if (height < 520) {
                $('#top').height(height);
                Cookies.set('topHeight', height, { sameSite: 'strict' } );
            }
        })

    })

<?php echo '</script'; ?>
>

</html>
<?php }
}
