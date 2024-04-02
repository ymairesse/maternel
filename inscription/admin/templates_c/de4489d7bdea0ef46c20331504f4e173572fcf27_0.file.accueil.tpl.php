<?php
/* Smarty version 3.1.32-dev-38, created on 2022-12-26 11:53:30
  from '/home/yves/www/maternel/inscription/admin/templates/accueil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_63a97d2aba8334_16656725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de4489d7bdea0ef46c20331504f4e173572fcf27' => 
    array (
      0 => '/home/yves/www/maternel/inscription/admin/templates/accueil.tpl',
      1 => 1668795331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63a97d2aba8334_16656725 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>ISND - MATERNEL Demande d'inscription</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="../screen.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../bootstrap/fa/css/font-awesome.min.css" type="text/css" media="screen, print">
	<link rel="stylesheet" href="admin.css" type="text/css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css" media="screen">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" media="screen">

	<?php echo '<script'; ?>
 type="text/javascript" src="../js/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="../bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.fr.min.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 src="https://unpkg.com/bootstrap-timepicker@0.5.2/js/bootstrap-timepicker.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 type="text/javascript" src="../js/bootbox.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="../js/jquery.validate.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 type="text/javascript" src="../js/jsCookie/src/js.cookie.js"><?php echo '</script'; ?>
>

	<style media="screen">
		#top {
			overflow: hidden;
			background-image: url("../images/cropped-5.png");
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

		<?php if ((isset($_smarty_tpl->tpl_vars['message']->value) && ($_smarty_tpl->tpl_vars['message']->value == 'logout'))) {?>
		<div class="alert alert-dismissible alert-success auto-fadeOut">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p>Votre session est terminée. Veuillez vous reconnecter pour poursuivre le travail.</p>
		</div>
		<?php }?>

		<?php if ((isset($_smarty_tpl->tpl_vars['message']->value) && $_smarty_tpl->tpl_vars['message']->value == 'erreurMDP')) {?>
		<div class="alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p>Nom d'utilisateur ou mot de passe incorrect</p>
			<p>Votre tentative d'accès, votre adresse IP et le nom de votre fournisseur d'accès ont été enregistrés.</p>
			<p>Les administrateurs ont été prévenus.</p>
		</div>
		<?php }?>

		<div class="col-md-offset-1 col-md-5 col-sm-12">

			<h1>Connexion</h1>

			<form class="form-vertical" role="form" id="login" action="login.php" method="POST">

				<div class="panel panel-default">

					<div class="panel-heading">
						<h4 class="panel-title">Veuillez vous identifier</h4>
					</div>

					<div class="panel-body">
					<div class="form-group">
						<label for="name" class="control-label sr-only">Nom d'utilisateur</label>
						<input type="text" id="acronyme" name="acronyme" class="form-control input-lg" placeholder="Nom d'utilisateur" value="" autocomplete="off">
						<span class="help-group">En 7 lettres (max)</span>
					   </div>

					<div class="form-group">
						<label for="name" class="control-label sr-only">Mot de passe</label>
							<input type="password" id="mdp" name="mdp" class="form-control input-lg" placeholder="Mot de passe" value="" autocomplete="off">
							<span class="help-group">Au moins 6 caractères</span>
					</div>

					<br class="clearfix">
						<div class="btn-group pull-right">
							<button class="btn btn-default btn-lg" type="reset">Annuler</button>
							<button class="btn btn-primary btn-lg" type="submit">Connexion</button>
						</div>
					</div>  <!-- panel-body -->

					</div>  <!-- panel -->
			</form>

		</div>  <!-- col-md- -->

		<div class="col-md-5 col-sm-12" style="padding-top:10em">
			<h4>Avertissement!</h4>
			<p><button type="button" class="btn btn-primary pull-right btn-lg">
				<i class="fa fa-gavel fa-2x"></i>
			</button>
				<span class="glyphicon glyphicon-warning-sign" style="font-size:2em"></span> Cette application gère des données privées et strictement confidentielles. Toute tentative d'accès sans autorisation est punissable au sens de la Loi.

			<p><span class="glyphicon glyphicon-eye-open" style="font-size:2em"></span> Votre adresse IP: <?php echo $_smarty_tpl->tpl_vars['identification']->value['ip'];?>
. Votre passage est enregistré.</p>
		</div>  <!-- col-md -->

	</div>  <!-- row -->


	</div>  <!-- container -->


<?php echo '<script'; ?>
 type="text/javascript">

	var topHeight = Cookies.get('topHeight');
	$('#top').height(topHeight);


	$(document).ready(function() {

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

		$("input:enabled").eq(0).focus();

		$("input").not(".autocomplete").attr("autocomplete","off");

		$("#login").validate({
			rules: {
				acronyme: {
					required:true,
					minlength:3,
					maxlength:7
					},
				mdp: {
					required:true,
					minlength:6
					}
				},
			errorElement: 'span',
			errorClass: 'error'
			})

		})

<?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
