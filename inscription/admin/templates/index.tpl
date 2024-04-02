<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>ISND - MATERNEL Demande d'inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link
      rel="stylesheet"
      href="../screen.css"
      type="text/css"
      media="screen"
    />
    <link
      rel="stylesheet"
      href="../bootstrap/fa/css/font-awesome.min.css"
      type="text/css"
      media="screen, print"
    />
    <link rel="stylesheet" href="admin.css" type="text/css" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css"
      media="screen"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
      media="screen"
    />

    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <script
      type="text/javascript"
      src="../bootstrap/js/bootstrap.min.js"
    ></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.fr.min.js"></script>

    <script src="https://unpkg.com/bootstrap-timepicker@0.5.2/js/bootstrap-timepicker.js"></script>

    <link rel="stylesheet" href="../summernote/summernote.min.css" />
    <script src="../summernote/summernote.min.js"></script>
    <script src="../summernote/lang/summernote-fr-FR.min.js"></script>

    <script type="text/javascript" src="../js/bootbox.min.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.js"></script>

    <link
      rel="stylesheet"
      href="../js/sortable-0.8.0/css/sortable-theme-dark.css"
    />
    <script src="../js/sortable-0.8.0/js/sortable.min.js"></script>

    <script
      type="text/javascript"
      src="../js/jsCookie/src/js.cookie.js"
    ></script>

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
          <button
            type="button"
            class="btn btn-success btn-xs"
            id="btn-ViewMinus"
          >
            <i class="fa fa-arrow-up"></i>
          </button>
          <button
            type="button"
            class="btn btn-warning btn-xs"
            id="btn-ViewPlus"
          >
            <i class="fa fa-arrow-down"></i>
          </button>
        </div>

        <div class="col-xs-12">
          <div id="ajaxLoader" class="hidden">
            <img src="../images/ajax-loader.gif" alt="Patience" />
          </div>
          <div class="btn-group pull-left">
            <button
              type="button"
              class="btn btn-success dropdown-toggle"
              data-toggle="dropdown"
            >
              <i class="fa fa-file-text-o"></i> Textes
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="#" class="texteType" data-type="invitation">
                  <i class="fa fa-envelope-o" aria-hidden="true"></i> Mail
                  invitation inscription
                </a>
              </li>

              <li>
                <a href="#" class="texteType" data-type="confirmation">
                  <i class="fa fa-commenting-o" aria-hidden="true"></i> Mail
                  demande confirmation
                </a>
              </li>

              <li>
                <a href="#" class="texteType" data-type="enteteMail">
                  <i class="fa fa-flag" aria-hidden="true"></i> Entête Mail
                </a>
              </li>
            </ul>

            <button type="button" class="btn btn-info" id="btn-simulation">
              Simulation du mailing
            </button>
            <button type="button" class="btn btn-danger" id="btn-envoiMailsOK">
              <i class="fa fa-paper-plane-o"></i> Envoi des mails
            </button>
          </div>

          <div class="btn-group pull-right">
            <button type="button" class="btn btn-success" id="btn-accepter">
              Traiter pour acceptation
            </button>
            <button type="button" class="btn btn-primary" id="btn-datesRV">
              Dates de RV
            </button>

            <button
              type="button"
              class="btn btn-danger btn dropdown-toggle"
              data-toggle="dropdown"
            >
              <i class="fa fa-user-circle-o" aria-hidden="true"></i>
              <span id="menuUser">{$identite.prenom} {$identite.nom}</span>
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="#" id="btn-users">
                  <i class="fa fa-user" aria-hidden="true"></i> Gestion des
                  utilisateurs
                </a>
              </li>

              <li>
                <a href="#" id="btn-logout">
                  <i class="fa fa-times" aria-hidden="true"></i> Déconnexion
                </a>
              </li>
            </ul>
          </div>

          <div class="btn-group pull-right">
            <button
              type="button"
              class="btn btn-danger btn dropdown-toggle"
              data-toggle="dropdown"
            >
              <i class="fa fa-trash"></i> Nettoyages <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="#" data-status="annule" class="btn-cleaning">
                  <i class="fa fa-times" aria-hidden="true"></i> Demandes
                  annulées
                </a>
              </li>

              <li>
                <a href="#" data-status="sansReponse" class="btn-cleaning">
                  <i class="fa fa-commenting-o" aria-hidden="true"></i> Demandes
                  sans réponse
                </a>
              </li>

              <li>
                <a href="#" data-status="inscription" class="btn-cleaning">
                  <i class="fa fa-check-circle" aria-hidden="true"></i>
                  Inscriptions finalisées
                </a>
              </li>
              <li role="separator" class="divider"></li>
              <li>
                <a href="#" id="btn-selectOut" class="btn-cleaning">
                  <i class="fa fa-eraser" aria-hidden="true"></i>
                  Annulation par date de naissance
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div id="corpsPage">{include file="{$corpsPage}.tpl"}</div>
      </div>
    </div>

    <div id="modal"></div>

    <script src="js/admin.js"></script>

    <script type="text/javascript">
      function testSession() {
        $.post("inc/testSession.inc.php", {}, function (resultat) {
          if (resultat == "") {
            bootbox.alert({
              title: "Dépassement du délai",
              message:
                "Votre session s'est achevée. Veuillez vous reconnecter.",
              callback: function () {
                window.location.replace("accueil.php");
                exit();
              },
            });
          }
        });
      }

      var topHeight = Cookies.get("topHeight");
      $("#top").height(topHeight);
      var footHeight = 800 - topHeight;
      $("#foot").height("footHeight");
    </script>
  </body>
</html>
