<?php

session_start();

require_once '../../config.inc.php';

require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;
parse_str($formulaire, $form);

$mail = isset($form['mail']) ? $form['mail'] : Null;
$nom  = isset($form['nom']) ? $form['nom'] : Null;
$prenom  = isset($form['prenom']) ? $form['prenom'] : Null;
$acronyme = isset($form['acronyme']) ? strtolower($form['acronyme']) : Null;
$passwd = isset($form['passwd']) ? $form['passwd'] : '';
$isNewUser = isset($form['isNewUser']) ? $form['isNewUser'] : Null;

// en cas d'édition, le champ "acronyme" est disabled et l'acronyme est dans
// un champ "hidden" du formulaire et nommé "userName"
if ($isNewUser == 'false')
    $acronyme = $form['userName'];

$ok = true; // jusque là, tout va bien
$message = array();

// on a bien une adresse mail, un nom, un prénom et un acronyme
if (filter_var($mail, FILTER_VALIDATE_EMAIL) && $nom != '' && $prenom != '' && $acronyme != '') {

    if ($isNewUser == 'true') {
        // vérifier si l'utilisateur n'existe pas déjà
        $allUsersAcronyme = array_keys($Application->getUsersList());
        if (in_array($acronyme, $allUsersAcronyme)) {
            $ok = false;
            $message[] = 'Cet utilisateur existe déjà';
            }
        if ($ok == true) {
            if ($passwd == '') {
                $ok = false;
                $message[] = 'Il manque le mot de passe';
            }

            if ($ok == true) {
                // Si c'est OK, on enregistre les paramètres pour cet utilisateur
                $nb = $Application->saveUser($nom, $prenom, $mail, $acronyme);

                // si l'enregistrement s'est bien passé
                if ($nb == 1) {
                    // on enregistre le mot de passe
                    $nbmdp = $Application->saveUserPasswd($acronyme, $passwd);
                    if ($nbmdp == 0) {
                        $ok = false;
                        $message[] = 'Problème d\'enregistrement du mot de passe';
                    }
                }
                else {
                    $ok = false;
                    $message[] = 'Problème durant l\'enregistrement des données';
                    }
                }
        }
    }
    else {
        // ce n'est pas un nouvel utilisateur
        // enregistrer les données utilisateur pour une mise à jour
        $nb = $Application->saveUser($nom, $prenom, $mail, $acronyme) / 2;
        $message[] = sprintf('<strong>%d</strong> modification des données utilisateur', $nb);
        // un nouveau mot de passe a été donné
        if ($passwd != '') {
            $nbmdp = $Application->saveUserPasswd($acronyme, $passwd);
            $message[] = sprintf('<strong>%d</strong> mot de passe modifié', $nbmdp);
            }
        }
    }
    else {
        $message[] = Application::afficher(array($nom, $prenom, $acronyme, $mail));
        $ok = false;
        $message[] = 'Informations manquantes ou adresse mail incorrecte';
    }

$message = implode('.<br>', $message);
if ($message == '')
    $message = sprintf('L\'utilisateur <strong> %s %s (%s)</strong> a été ajouté.', $nom, $prenom, $acronyme);

echo json_encode(array('ok' => $ok, 'message' => $message));