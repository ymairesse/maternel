$("document").ready(function () {
  bootbox.setDefaults({ locale: "fr" });

  $("body").on("click", "#btn-ViewMinus", function () {
    var top = document.getElementById("top");
    var foot = document.getElementById("foot");
    var topHeight = top.offsetHeight - 20;
    var footHeight = foot.offsetHeight + 20;
    if (topHeight > 20) {
      $("#top").height(topHeight);
      Cookies.set("topHeight", topHeight, { sameSite: "strict" });
      Cookies.set("footHeight", footHeight, { sameSite: "strict" });
    }
  });

  $("body").on("click", "#btn-ViewPlus", function () {
    var top = document.getElementById("top");
    var foot = document.getElementById("foot");
    var topHeight = top.offsetHeight + 20;
    var footHeight = foot.offsetHeight - 20;
    if (topHeight < 520) {
      $("#top").height(topHeight);
      Cookies.set("topHeight", topHeight, { sameSite: "strict" });
      Cookies.set("footHeight", footHeight, { sameSite: "strict" });
    }
  });

  $("#btn-simulation").click(function () {
    testSession();
    $.post("inc/getMailsSimulation.inc.php", {}, function (resultat) {
      $("#modal").html(resultat);
      $("#modalSimulation").modal("show");
    });
  });

  $("#btn-envoiMailsOK").click(function () {
    testSession();
    $.post("inc/getMailsReady.inc.php", {}, function (resultat) {
      $("#modal").html(resultat);
      $("#modalMailOK").modal("show");
    });
  });

  $("#modal").on("click", "#btn-sendMail", function () {
    testSession();
    var formulaire = $("#formModalReady").serialize();
    $.post(
      "inc/goMailing.inc.php",
      {
        formulaire: formulaire,
      },
      function (resultat) {
        // affichage du résultat du mailing
        bootbox.alert({
          title: "Envoi des mails",
          message: resultat,
          callback: function () {
            $.post("inc/updateAdmin.inc.php", {}, function (resultat) {
              $("#tableauAdmin tbody").html(resultat);
            });
            $("#modalMailOK").modal("hide");
          },
        });
      }
    );
  });

  $("#modal").on("click", "#btn-saveTexteType", function () {
    var texteType = $("#texte").val();
    var textName = $("#textName").val();
    $.post(
      "inc/saveTexteType.inc.php",
      {
        texteType: texteType,
        textName: textName,
      },
      function (resultat) {
        $('#modalTexteType').modal('hide');
        bootbox.alert({
          title: "Enregistrement",
          message: "<strong>" + resultat + "</strong> texte enregistré"
        });
      }
    );
  });

  $('.texteType').click(function(){
    testSession();
    var quelTexte = $(this).data('type');
    // invitation, confirmation ou entete
    $.post('inc/getModalTexteType.inc.php', {
      textName: quelTexte
    }, function(resultat){
      $('#modal').html(resultat);
      $('#modalTexteType').modal('show');
    })
  })


  $("body").on("click", ".btn-cleaning", function () {
    testSession();
    var status = $(this).data("status");
    $.post(
      "inc/getAllByStatus.inc.php",
      {
        status: status,
      },
      function (resultat) {
        $("#modal").html(resultat);
        $("#modalShowToDelete").modal("show");
      }
    );
  });

  $("body").on("click", "#btn-modalConfirmDel", function () {
    testSession();
    var status = $(this).data("status");
    var title = "Effacement définitif";
    bootbox.confirm({
      title: title,
      message:
        "Vous allez effacer ces demandes définitivement.<br>Vous savez ce que vous faites.",
      callback: function (result) {
        if (result == true) {
          $.post(
            "inc/delAllByStatus.inc.php",
            {
              status: status,
            },
            function (resultatJSON) {
              var resultat = JSON.parse(resultatJSON);
              bootbox.alert({
                title: title,
                message:
                  "<strong>" +
                  resultat.dem +
                  "</strong> demande(s) et <strong>" +
                  resultat.sec +
                  "</strong> note(s) secrétariat effacée(s).",
              });
              $("#modalShowToDelete").modal("hide");
              $("#tableauAdmin tr." + status).remove();
              var nbDemandes = $("#tableauAdmin tr").length - 1;
              $("#nbDemandes").html("[" + nbDemandes + " demandes]");
            }
          );
        }
      },
    });
  });

  $("body").on("click", ".btn-delRV", function () {
    testSession();
    var ligne = $(this).closest("tr");
    var idRV = ligne.data("id");
    $.post(
      "inc/delDateRV.inc.php",
      {
        idRV: idRV,
      },
      function (resultat) {
        if (resultat == 1) ligne.remove();
      }
    );
  });

  $("body").on("click", ".btn-editRV", function () {
    testSession();
    var ceci = $(this);
    var ligne = $(this).closest("tr");
    var heure = ligne.data("heure");
    var dateRV = ligne.data("daterv");
    var idRV = ligne.data("id");
    $("#id").val(idRV);
    $("#dateRV").val(dateRV);
    $(".timepicker").timepicker("setTime", heure);
    $("#nbPlaces").val(ligne.data("nbplaces"));
    $("#nbMin").val(ligne.data("nbrv"));
    // mise en évidence de la ligne dans la tableau des RV
    $("tr.selected").removeClass("selected");
    $(this).closest("tr").addClass("selected");
    var nbRV = ligne.data("nbrv");
    if (nbRV > 0) {
      $("#dateRV, #heureRV").prop("disabled", true);
      $("#dateRV, #heureRV").prop("title", "Un ou plusieurs RV déjà fixé(s)");
    } else {
      $("#dateRV, #heureRV").prop("disabled", false);
      $("#dateRV, #heureRV").prop("title", "");
    }

    $.post(
      "inc/getParents4RV.inc.php",
      {
        idRV: idRV,
      },
      function (resultat) {
        $("#listeParents").html(resultat);
      }
    );
  });

  $("body").on("click", "#btn-saveDate", function () {
    testSession();
    var formulaire = $("#formEditRV").serialize();
    if ($("#formEditRV").valid()) {
      $.post(
        "inc/saveDateRV.inc.php",
        {
          formulaire: formulaire,
        },
        function (resultat) {
          if (resultat == "erreur") {
            bootbox.alert({
              title: "Erreur",
              message: "Plus de RV que de places ont déjà été pris",
            });
          } else $("#listeDatesRV").html(resultat);
        }
      );
    }
  });

  $("body").on("click", "#btn-addDate", function () {
    $("#id").val("");
    $("#nbMin").val(0);
    $("#dateRV").val("");
    $("#heureRV").val("");
    $("#nbPlaces").val("");
    $("#nbMin").val(1);
    $("tr.selected").removeClass("selected");
    $("#listeParents").html("");
  });

  $("body").on("click", "#btn-logout", function () {
    bootbox.confirm({
      title: "Déconnexion",
      message: "Veuillez confirmer la déconnexion",
      callback: function (result) {
        if (result == true) {
          $.post("inc/logout.inc.php", {}, function (resultat) {
            window.location.assign("index.php");
          });
        }
      },
    });
  });

  $("body").on("click", "#btn-users", function () {
    testSession();
    $.post("inc/gestUsers.inc.php", {}, function (resultat) {
      $("#modal").html(resultat);
      $("#modalGestUsers").modal("show");
    });
  });

  $("body").on("change", "#userSelect", function () {
    var acronyme = $(this).val().toLowerCase();
    var nom = $("#userSelect :selected").data("nom");
    var prenom = $("#userSelect :selected").data("prenom");
    var mail = $("#userSelect :selected").data("mail");

    var adminUser = $("#adminUser").val().toLowerCase();
    $("#acronyme").prop("disabled", true);
    if (adminUser != acronyme) $("#btn-delUser").prop("disabled", false);
    else $("#btn-delUser").prop("disabled", true);
    $("#nom").val(nom).prop("disabled", false);
    $("#prenom").val(prenom).prop("disabled", false);
    $("#mail").val(mail).prop("disabled", false);
    $("#acronyme").val(acronyme).prop("disabled", true);
    // si le champ 'acronyme' est désactivé (cas de l'édition), on utilisera 'username'
    $("#userName").val(acronyme);
    $("#isNewUser").val(false);
    $("#passwd").prop("required", false).prop("disabled", false);
    $("#passwd")
      .closest(".row")
      .find(".help-block")
      .text("Laisser vide pour ne pas modifier le mot de passe");
  });

  $("body").on("click", "#btn-delUser", function () {
    testSession();
    var nom = $("#userSelect :selected").data("nom");
    var prenom = $("#userSelect :selected").data("prenom");
    var acronyme = $("#userName").val();
    bootbox.confirm({
      title: "Suppression de l'utilisateur",
      message:
        "Veuille confirmer la suppression définitive de <strong>" +
        nom +
        " " +
        prenom +
        " (" +
        acronyme +
        ")</strong>",
      callback: function (result) {
        if (result == true)
          $.post(
            "inc/delUser.inc.php",
            {
              acronyme: acronyme,
            },
            function (resultat) {
              $("#userSelect :selected").remove();
              $("#formUser")[0].reset();
              bootbox.alert(resultat + " utilisateur Supprimé");
            }
          );
      },
    });
  });

  $("body").on("click", "#btn-addUser", function () {
    $("#nom").val("").prop("disabled", false);
    $("#prenom").val("").prop("disabled", false);
    $("#mail").val("").prop("disabled", false);
    $("#acronyme").val("").prop("disabled", false);
    $("#passwd").val("").prop("disabled", false).prop("required", true);
    $("#passwd")
      .closest(".row")
      .find(".help-block")
      .text("Choisir un mot de passe");
    $("#userSelect").val("");
    $("#btn-delUser").prop("disabled", true);
    $("#userName").val("");
    $("#isNewUser").val(true);
    $("input#nom").focus();
  });

  $("body").on("click", "#btn-saveUser", function () {
    testSession();
    if ($("#formUser").valid()) {
      var formulaire = $("#formUser").serialize();
      var prenom = $("#prenom").val();
      var nom = $("#nom").val();
      // qui est l'utilisateur actuel?
      var adminUser = $("#adminUser").val().toLowerCase();
      var userName = $("#userName").val().toLowerCase();
      $.post(
        "inc/saveUser.inc.php",
        {
          formulaire: formulaire,
        },
        function (resultatJSON) {
          $("#modalGestUsers").modal("hide");
          var resultat = JSON.parse(resultatJSON);
          var message = resultat["message"];
          var ok = resultat["ok"];
          // si c'est l'utilisateur actuel, rafraîchir la mention de son nom
          // qui a peut-être été modifié
          if (ok == true && adminUser == userName) {
            var np = prenom + " " + nom;
            $("#menuUser").text(np);
          }
          bootbox.alert({
            title: "Enregistrement",
            message: message,
          });
        }
      );
    }
  });

  $("body").on("click", "#btn-accepter", function () {
    testSession();
    var nb = $(".selection:checked").length;
    if (nb > 0) {
      var formulaire = $("#listeInscriptions").serialize();
      $.post(
        "inc/traiterAcceptation.inc.php",
        {
          formulaire: formulaire,
        },
        function (resultat) {
          $("#modal").html(resultat);
          $("#modalTraitement").modal("show");
        }
      );
    } else
      bootbox.alert({
        title: "Votre attention svp",
        message:
          "Vous devez d'abord sélectionner des demandes d'inscription dans la première colonne du tableau",
      });
  });

  $("body").on("click", "#btn-datesRV", function () {
    testSession();
    $.post("inc/datesRV.inc.php", {}, function (resultat) {
      $("#modal").html(resultat);
      $("#modalDatesRV").modal("show");
    });
  });

  $("body").on("click", "#btn-saveAcceptation", function () {
    testSession();
    var formulaire = $("#formModalOK").serialize();
    $.post(
      "inc/saveAcceptation.inc.php",
      {
        formulaire: formulaire,
      },
      function (nb) {
        var nombre = nb;
        $("#modalTraitement").modal("hide");
        bootbox.alert({
          title: "Enregistrement des RV",
          message: nombre + " RV enregistrés",
          callback: function () {
            location.reload();
          },
        });
      }
    );
  });

  $("body").on("click", ".btn-del", function () {
    testSession();
    var id = $(this).data("id");
    bootbox.confirm({
      title: "Suppression d'une demande",
      message: "Veuillez confirmer la suppression définitive de cette demande",
      buttons: {
        cancel: {
          label: '<i class="fa fa-times"></i> Annuler',
        },
        confirm: {
          label: '<i class="fa fa-check"></i> Je confirme',
        },
      },
      callback: function (result) {
        if (result == true) {
          $.post(
            "inc/delDemande.inc.php",
            {
              id: id,
            },
            function (resultat) {
              $('#tableauAdmin tr[data-id="' + id + '"]').remove();
            }
          );
        }
      },
    });
  });

  $("body").on("click", ".btn-infoRecord", function () {
    var id = $(this).data("id");
    $.post(
      "inc/getDetails4id.inc.php",
      {
        id: id,
      },
      function (resultat) {
        $("#boiteModale .modal-body").html(resultat);
        $("#modalDetailsId").modal("show");
      }
    );
  });

  $("body").on("click", "#envoyer", function () {
    var id = $("#id").val();
    if ($("#formulaire").valid()) {
      var formulaire = $("#formulaire").serialize();
      var newStatus = $("#modalStatut :selected").val();
      // supprimer la class pour cette ligne
      $('tr[data-id="' + id + '"]').removeClass();
      $.post(
        "inc/saveDemandeModale.inc.php",
        {
          formulaire: formulaire,
        },
        function (resultat) {
          $("#modalDetailsId").modal("hide");
          bootbox.alert({
            title: "Enregistrement",
            message: resultat + " enregistrement modifié",
          });
          $.post(
            "inc/updateAdminRow.inc.php",
            {
              id: id,
            },
            function (resultat) {
              $("table")
                .find($('tr[data-id="' + id + '"]'))
                .html(resultat);
              $('tr[data-id="' + id + '"]').html(resultat);
              // attribuer une nouvelle class
              $('tr[data-id="' + id + '"]')
                .addClass(newStatus)
                .addClass("cible");
            }
          );
        }
      );
    }
  });

  $("#btn-selectOut").click(function (event) {
    testSession();
    // éviter le tri
    event.stopPropagation();
    $.post("inc/getModal4date.inc.php", {}, function (resultat) {
      $("#modal").html(resultat);
      $("#modalListe4date").modal("show");
    });
  });

  $("#modal").on("click", "#btn-ok4date", function () {
    var dateNais = $("#dateNais").val();
    $.post(
      "inc/getListe4date.inc.php",
      {
        dateNais: dateNais,
      },
      function (resultat) {
        if (resultat != "") {
          $("#liste4date").html(resultat);
          $("#btn-annuler").attr("disabled", false);
        } else {
          $("#liste4date").html("");
          $("#btn-annuler").attr("disabled", true);
        }
      }
    );
  });

  $("#modal").on("change", "#cbAllDate", function () {
    $(".cbDate").each(function () {
      var ceci = $(this);
      if (ceci.is(":checked")) ceci.prop("checked", false);
      else ceci.prop("checked", true);
    });
  });

  $("#modal").on("click", "#btn-annuler", function () {
    var formulaire = $("#formList2cancel").serialize();
    $.post(
      "inc/cancel4date.inc.php",
      {
        formulaire: formulaire,
      },
      function (nombre) {
        $("#modalListe4date").modal("hide");
        bootbox.alert({
          title: "Annulation des inscriptions",
          message: nombre + " demande(s) d'inscription annulée(s)",
          callback: function () {
            location.reload();
          },
        });
      }
    );
  });
});
