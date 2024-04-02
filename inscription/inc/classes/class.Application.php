<?php

class Application
{
    public function __construct()
    {
        // sorties PHP en français
        setlocale(LC_ALL, 'fr_FR.utf8');
        self::lireConstantes();
    }

    /**
     * lecture de toutes les constantes du fichier config.ini.
     *
     * @param void()
     */
    public static function lireConstantes()
    {
        // lecture des paramètres généraux dans le fichier .ini, y compris la constante "PFX"
        $constantes = parse_ini_file(INSTALL_DIR.'/config.ini');
        foreach ($constantes as $key => $value) {
            define("$key", $value);
        }
    }

    /**
     * afficher proprement le contenu d'une variable précisée
     * le programme est éventuellement interrompu si demandé.
     *
     * @param :    $data n'importe quel tableau ou variable
     * @param bool $die  : si l'on souhaite interrompre le programme avec le dump
     * */
    static function afficher($data, $die = false)
    {
        if (count($data) == 0) {
            echo 'Tableau vide';
        } else {
            echo '<pre>';
            var_export($data);
            echo '</pre>';
            echo '<hr />';
        }
        if ($die) {
            die();
        }
    }

    /**
     * Connexion à la base de données précisée.
     *
     * @param PARAM_HOST : serveur hôte
     * @param PARAM_BD : nom de la base de données
     * @param PARAM_USER : nom d'utilisateur
     * @param PARAM_PWD : mot de passe
     *
     * @return connexion à la BD
     */
    public static function connectPDO($host, $bd, $user, $mdp)
    {
        try {
            // indiquer que les requêtes sont transmises en UTF8
            // INDISPENSABLE POUR EVITER LES PROBLEMES DE CARACTERES ACCENTUES
            $connexion = new PDO('mysql:host='.$host.';dbname='.$bd, $user, $mdp,
                                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        } catch (Exception $e) {
            $date = date('d/m/Y H:i:s');
            echo "<style type='text/css'>";
            echo '.erreurBD {width: 500px; margin-left: auto; margin-right: auto; border: 1px solid red; padding: 1em;}';
            echo '.erreurBD .erreur {color: green; font-weight: bold}';
            echo '</style>';

            echo "<div class='erreurBD'>";
            echo '<h3>A&iuml;e, a&iuml;e, a&iuml;e... Caramba...</h3>';
            echo "<p>Une erreur est survenue lors de l'ouverture de la base de donn&eacute;es.<br>";
            echo "Si vous &ecirc;tes l'administrateur et que vous tentez d'installer le logiciel, veuillez v&eacute;rifier le fichier config.inc.php </p>";
            echo "<p>Si le probl&egrave;me se produit durant l'utilisation r&eacute;guli&egrave;re du programme, essayez de rafra&icirc;chir la page (<span style='color: red;'>touche F5</span>)<br>";
            echo "Dans ce cas, <strong>vous n'&ecirc;tes pour rien dans l'apparition du souci</strong>: le serveur de base de donn&eacute;es est sans doute trop sollicit&eacute;...</p>";
            echo "<p>Veuillez rapporter le message d'erreur ci-dessous &agrave; l'administrateur du syst&egrave;me.</p>";
            echo "<p class='erreur'>Le $date, le serveur dit: ".$e->getMessage().'</p>';
            echo '</div>';
            die();
        }

        return $connexion;
    }

    /**
     * Déconnecte la base de données.
     *
     * @param $connexion
     *
     * @return void
     */
    public static function DeconnexionPDO($connexion)
    {
        $connexion = null;
    }


    /**
     * convertir les dates au format usuel jj/mm/AAAA en YY-mm-dd pour MySQL.
     *
     * @param string $date date au format usuel
     *
     * @return string date au format MySQL
     */
    public static function dateMysql($date)
    {
        $dateArray = explode('/', $date);
        $sqlArray = array_reverse($dateArray);
        $date = implode('-', $sqlArray);

        return $date;
    }

    /**
     * convertir les date au format MySQL vers le format usuel.
     *
     * @param string $date date au format MySQL
     *
     * @return string date au format usuel français
     */
    public static function datePHP($dateMysql)
    {
        $dateArray = explode('-', $dateMysql);
        $phpArray = array_reverse($dateArray);
        $date = implode('/', $phpArray);

        return $date;
    }

    /**
     * convertir les dateTime au format MySQL vers les format usuel
     *
     * @param string $datetime : datetime au format MySQL
     *
     * @return string datetime au format usuel français
     */
     function dateTimePHP($datetimeMysql){
         $tableau = explode(' ', $datetimeMysql);
         $tableau[0] = self::datePHP($tableau[0]);
         $date = implode(' ', $tableau);

         return $date;
     }


    /**
     * date d'aujourd'hui au format usuel français.
     *
     * @param void()
     *
     * @return string
     */
    public static function dateNow()
    {
        return date('d/m/Y H:i');
    }


     /**
      * fixe la captcha dans la session
      *
      * @param void
      *
      * @return void
      *
      */
     public function setSessionCaptcha($appli) {
        srand();
        $_SESSION[$appli]['operation'] = substr('+-*', rand(0, 2), 1);
        switch ($_SESSION[$appli]['operation']) {
            case '+':
                $_SESSION[$appli]['nombre1'] = rand(5, 10);
                $_SESSION[$appli]['nombre2'] = rand(5, 10);
                $_SESSION[$appli]['operation'] = ' plus ';
                $_SESSION[$appli]['resultat'] = $_SESSION[$appli]['nombre1'] + $_SESSION[$appli]['nombre2'];
                break;
            case '-':
                $_SESSION[$appli]['nombre1'] = rand(5, 10);
                $_SESSION[$appli]['nombre2'] = rand(1, 5);
                $_SESSION[$appli]['operation'] = ' moins ';
                $_SESSION[$appli]['resultat'] = $_SESSION[$appli]['nombre1'] - $_SESSION[$appli]['nombre2'];
                break;
            case '*':
                $_SESSION[$appli]['nombre1'] = rand(1, 8);
                $_SESSION[$appli]['nombre2'] = rand(1, 5);
                $_SESSION[$appli]['operation'] = ' fois ';
                $_SESSION[$appli]['resultat'] = $_SESSION[$appli]['nombre1'] * $_SESSION[$appli]['nombre2'];
                break;
        }
     }

     /**
      * fixe un captcha sous forme de lettres et chiffres
      *
      * @param int $nbSignes : nombre de signes souhaités
      *
      * @return string : la captcha
      */
     public function getLettersCaptcha($nbSignes){
         // caractères utilisables
         $pioche = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';

         $count = 0;
         $captcha = '';
         while ($count < $nbSignes) {
             $captcha .= substr($pioche, mt_rand(0, strlen($pioche)-1), 1);
             $count++;
             }

         return $captcha;
     }

     /**
      * enregistrement d'une demande d'inscription
      *
      * @param array $form : le formulaire de demande
      *
      * @return bool
      */
     public function saveDemande($form){
         $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
         $sql = 'INSERT INTO '.PFX.'inscriptions ';
         $sql .= 'SET id = :id, date = NOW(), salutation = :salutation, nomParent = :nomParent, prenomParent = :prenomParent, ';
         $sql .= 'adresse = :adresse, mail = :mail, telephone = :telephone, nomEnfant = :nomEnfant, prenomEnfant = :prenomEnfant, sexe = :sexe, ';
         $sql .= 'dateNaissance = :dateNaissance, creche = :creche, ecole = :ecole, raison = :raison, ';
         $sql .= 'remarque = :remarque, ';
         $sql .= 'section = :section, nomPrioritaire = :nomPrioritaire, classe = :classe ';
         $requete = $connexion->prepare($sql);

         // génération d'un identifiant unique complexe
         $id = md5(microtime());
         $dateNais = Application::dateMySQL($form['dateNais']);
         $requete->bindParam(':id', $id, PDO::PARAM_STR, 32);
         $requete->bindParam(':salutation', $form['salut'], PDO::PARAM_STR, 10);
         $requete->bindParam(':nomParent', $form['nom'], PDO::PARAM_STR, 40);
         $requete->bindParam(':prenomParent', $form['prenom'], PDO::PARAM_STR, 40);
         $requete->bindParam(':adresse', $form['adresse'], PDO::PARAM_STR, 100);
         $requete->bindParam(':mail', $form['mail'], PDO::PARAM_STR, 80);
         $requete->bindParam(':telephone', $form['telephone'], PDO::PARAM_STR, 20);
         $requete->bindParam(':nomEnfant', $form['nomEnfant'], PDO::PARAM_STR, 40);
         $requete->bindParam(':prenomEnfant', $form['prenomEnfant'], PDO::PARAM_STR, 40);
         $requete->bindParam(':sexe', $form['sexe'], PDO::PARAM_STR, 1);
         $requete->bindParam(':dateNaissance', $dateNais, PDO::PARAM_STR);
         $requete->bindParam(':creche', $form['creche'], PDO::PARAM_STR, 200);
         $requete->bindParam(':ecole', $form['ecole'], PDO::PARAM_STR, 200);
         $requete->bindParam(':raison', $form['raison'], PDO::PARAM_STR, 200);
         $requete->bindParam(':remarque', $form['remarque'], PDO::PARAM_STR, 200);
         $requete->bindParam(':section', $form['section'], PDO::PARAM_STR, 1);
         $requete->bindParam(':nomPrioritaire', $form['nomPrioritaire'], PDO::PARAM_STR, 40);
         $requete->bindParam(':classe', $form['classe'], PDO::PARAM_STR, 6);

         $resultat = $requete->execute();

         $n = $connexion->lastInsertId();

         Application::DeconnexionPDO($connexion);

         if ($n > 0)
            return $id;
            else return 'NA';
     }

     /**
      * Mise à jour admin du contenu d'une demande
      *
      * @param array $form
      *
      * @return int
      */
     public function updateDemande($form){
         $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
         $dateNais = isset($form['dateNais']) ? Application::dateMySQL($form['dateNais']) : Null;

         $sql = 'UPDATE '.PFX.'inscriptions ';
         $sql .= 'SET salutation = :salutation, nomParent = :nomParent, prenomParent = :prenomParent, ';
         $sql .= 'adresse = :adresse, mail = :mail, telephone = :telephone, nomEnfant = :nomEnfant, prenomEnfant = :prenomEnfant, ';
         $sql .= 'sexe = :sexe, dateNaissance = :dateNaissance, classeMat = :classeMat, creche = :creche, ecole = :ecole, raison = :raison, ';
         $sql .= 'remarque = :remarque, ';
         $sql .= 'section = :section, nomPrioritaire = :nomPrioritaire, classe = :classe ';
         // dans le cas d'un RV fixé, le champ "statut" est diabled; il ne faut donc pas attendre de valeur
         if (isset($form['statut']))
            $sql .= ', statut = :statut ';
         $sql .= 'WHERE id = :id ';
         $requete = $connexion->prepare($sql);

         $requete->bindParam(':id', $form['id'], PDO::PARAM_STR, 32);
         $requete->bindParam(':salutation', $form['salut'], PDO::PARAM_STR, 10);
         $requete->bindParam(':nomParent', $form['nom'], PDO::PARAM_STR, 40);
         $requete->bindParam(':prenomParent', $form['prenom'], PDO::PARAM_STR, 40);
         $requete->bindParam(':adresse', $form['adresse'], PDO::PARAM_STR, 100);
         $requete->bindParam(':mail', $form['mail'], PDO::PARAM_STR, 80);
         $requete->bindParam(':telephone', $form['telephone'], PDO::PARAM_STR, 20);
         $requete->bindParam(':nomEnfant', $form['nomEnfant'], PDO::PARAM_STR, 40);
         $requete->bindParam(':prenomEnfant', $form['prenomEnfant'], PDO::PARAM_STR, 40);
         $requete->bindParam(':sexe', $form['sexe'], PDO::PARAM_STR, 1);
         $requete->bindParam(':dateNaissance', $dateNais, PDO::PARAM_STR, 10);
         $requete->bindParam(':classeMat', $form['classeMat'], PDO::PARAM_STR, 20);
         $requete->bindParam(':creche', $form['creche'], PDO::PARAM_STR, 200);
         $requete->bindParam(':ecole', $form['ecole'], PDO::PARAM_STR, 200);
         $requete->bindParam(':raison', $form['raison'], PDO::PARAM_STR, 200);
         $requete->bindParam(':remarque', $form['remarque'], PDO::PARAM_STR, 200);
         // dans le cas d'un RV fixé, le champ "statut" est diabled; il ne faut donc pas attendre de valeur
         if (isset($form['statut']))
            $requete->bindParam(':statut', $form['statut'], PDO::PARAM_STR, 40);
         $requete->bindParam(':section', $form['section'], PDO::PARAM_STR, 1);
         $requete->bindParam(':nomPrioritaire', $form['nomPrioritaire'], PDO::PARAM_STR, 40);
         $requete->bindParam(':classe', $form['classe'], PDO::PARAM_STR, 6);

         $resultat = $requete->execute();

         $n = $requete->rowCount();

         // modification éventuelle de la date de demnade d'inscription
         if (isset($form['dateDemande'])) {
            $dateDemande = isset($form['dateDemande']) ? Application::dateMySQL($form['dateDemande']) : Null;
            $dateDemande = sprintf('%s %s', $dateDemande, $form['heureDemande']);
            $sql = 'UPDATE '.PFX.'inscriptions ';
            $sql .= 'SET date = :dateDemande ';
            $sql .= 'WHERE id = :id ';
            $requete = $connexion->prepare($sql);

            $requete->bindParam(':dateDemande', $dateDemande, PDO::PARAM_STR, 21);
            $requete->bindParam(':id', $form['id'], PDO::PARAM_STR, 32);
            $requete->execute();
            // s'il y a déjà eu enregistrement, on ne compte rien de plus
            $n = ($n==1) ? $n : $requete->rowCount();;
         }

         Application::DeconnexionPDO($connexion);

         return $n;
     }

     /**
      * Obtenir la liste de toutes les demandes d'inscriptions annulées
      *
      * @param void
      *
      * return array
      */
      public function getAllCanceled(){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT id, nomEnfant, prenomEnfant, mail, nomParent, prenomParent, date ';
        $sql .= 'FROM '.PFX.'inscriptions ';
        $sql .= 'WHERE statut = "annule" ';
        $sql .= 'ORDER BY nomEnfant, prenomEnfant ';
        $requete = $connexion->prepare($sql);

        $liste = array();
        $resultat = $requete->execute();
        if ($resultat){
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            while ($ligne = $requete->fetch()){
                $id = $ligne['id'];
                $ligne['date'] = Application::datePHP(explode (' ', $ligne['date'])[0]);

                $liste[$id] = $ligne;
            }
        }

        Application::DeconnexionPDO($connexion);

        return $liste;
      }

     /**
      * Obtenir la liste de toutes les demandes d'inscriptions pour un statut donné
      *
      * @param string $status
      *
      * return array
      */
      public function getAllByStatus($status){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT id, nomEnfant, prenomEnfant, mail, nomParent, prenomParent, date ';
        $sql .= 'FROM '.PFX.'inscriptions ';
        $sql .= 'WHERE statut = :status ';
        $sql .= 'ORDER BY nomEnfant, prenomEnfant ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':status', $status, PDO::PARAM_STR, 12);

        $liste = array();
        $resultat = $requete->execute();
        if ($resultat){
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            while ($ligne = $requete->fetch()){
                $id = $ligne['id'];
                $ligne['date'] = Application::datePHP(explode (' ', $ligne['date'])[0]);

                $liste[$id] = $ligne;
            }
        }

        Application::DeconnexionPDO($connexion);

        return $liste;
      }



     /**
      * suppression définitive d'une demande d'inscription
      *
      * @param int $id : identifiant unique de la demande (MD5)
      *
      * @return int : nombre de suppressions
      */
     public function delDemande($id){
         $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
         $sql = 'DELETE FROM '.PFX.'inscriptionRV ';
         $sql .= 'WHERE idInscription = :id ';
         $requete = $connexion->prepare($sql);
         $requete->bindParam(':id', $id, PDO::PARAM_STR, 32);
         $resultat = $requete->execute();

         $sql = 'DELETE FROM '.PFX.'secretariat ';
         $sql .= 'WHERE id = :id ';
         $requete = $connexion->prepare($sql);
         $requete->bindParam(':id', $id, PDO::PARAM_STR, 32);
         $resultat = $requete->execute();

         $sql = 'DELETE FROM '.PFX.'inscriptions ';
         $sql .= 'WHERE id = :id ';
         $requete = $connexion->prepare($sql);
         $requete->bindParam(':id', $id, PDO::PARAM_STR, 32);
         $resultat = $requete->execute();

         $nb = $requete->rowCount();

         Application::DeconnexionPDO($connexion);

         return $nb;
     }

     /**
      * suppression définitive de toutes les demandes d'inscriptions annulées
      *
      * @param void
      *
      * @return array : le nombre de suppressions dans chaque table
      */
     public function delAllCanceled(){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'DELETE FROM '.PFX.'secretariat ';
        $sql .= 'WHERE id IN (SELECT id FROM '.PFX.'inscriptions WHERE statut = "annule") ';
        $requete = $connexion->prepare($sql);

        $resultat = $requete->execute();
        $sec = $requete->rowCount();

        $sql = 'DELETE FROM '.PFX.'inscriptions ';
        $sql .= 'WHERE statut = "annule" ';
        $requete = $connexion->prepare($sql);

        $resultat = $requete->execute();
        $dem = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

         return array('dem' => $dem, 'sec' => $sec);
     }
     
    /**
      * suppression définitive de toutes les demandes d'inscriptions par statut
      *
      * @param string $status
      *
      * @return array : le nombre de suppressions dans chaque table
      */
      public function delAllByStatus($status){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'DELETE FROM '.PFX.'inscriptionRV ';
        $sql .= 'WHERE idInscription IN (SELECT id FROM '.PFX.'inscriptions WHERE statut = :status) ';

        $sql = 'DELETE FROM '.PFX.'secretariat ';
        $sql .= 'WHERE id IN (SELECT id FROM '.PFX.'inscriptions WHERE statut = :status) ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':status', $status, PDO::PARAM_STR, 12);

        $resultat = $requete->execute();
        $sec = $requete->rowCount();

        $sql = 'DELETE FROM '.PFX.'inscriptions ';
        $sql .= 'WHERE statut = :status ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':status', $status, PDO::PARAM_STR, 12);

        $resultat = $requete->execute();
        $dem = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

         return array('dem' => $dem, 'sec' => $sec);
     }

     /**
      * Enregistre les informations admin pour une demande d'inscription
      *
      * @param string id : identifiant de la demande d'inscription
      * @param string $date : date du RV
      * @param string $heure : heure du RV
      * @param string $texte : mémo sur l'inscription
      *
      * @return int
      */
     public function saveAdmin($form){
         $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
         $sql = 'INSERT INTO '.PFX.'secretariat ';
         $sql .= 'SET id = :id, dateRV = :dateRV, heureRV = :heureRV, texteStatut = :texteStatut ';
         $sql .= 'ON DUPLICATE KEY UPDATE ';
         $sql .= 'dateRV = :dateRV, heureRV = :heureRV, texteStatut = :texteStatut ';
         $requete = $connexion->prepare($sql);

        $id = isset($form['id']) ? $form['id'] : Null;
        $dateRV = isset($form['dateRV']) ? $form['dateRV'] : Null;
        $dateRV = self::dateMySQL($dateRV);
        $heureRV = isset($form['heureRV']) ? $form['heureRV'] : Null;
        // un textarea Sumernote vide conserve au moins un <br> qu'il faut éliminer
        $texteStatut = isset($form['texteStatut']) ? trim($form['texteStatut'],'<p><br></p>') : Null;

        $requete->bindParam(':id', $id, PDO::PARAM_STR, 32);
        $requete->bindParam(':dateRV', $dateRV, PDO::PARAM_STR, 8);
        $requete->bindParam(':heureRV', $heureRV, PDO::PARAM_STR, 5);
        $requete->bindParam(':texteStatut', $texteStatut, PDO::PARAM_STR);


        $resultat = $requete->execute();
        $n = $requete->rowCount();
        $n = ($n==2) ? 1 : $n;

        Application::DeconnexionPDO($connexion);

        return $n;
     }

     /**
      * renvoie la fiche de demande d'inscirption $id
      *
      * @param string $id : l'identifiant md5
      *
      * @return array
      */
     public function getRecord($id){
         $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);

         $sql = 'SELECT n, inscr.id, date, salutation, nomParent, prenomParent, adresse, mail, telephone, nomEnfant, prenomEnfant, sexe, ';
         $sql .= 'dateNaissance, classeMat, nomClasse, creche, ecole, raison, ';
         $sql .= 'remarque, inscr.statut, section, nomPrioritaire, inscr.classe, secr.texteStatut, statuts.phrase, rv.idRV, rv.dateEnvoi ';
         $sql .= 'FROM '.PFX.'inscriptions AS inscr ';
         $sql .= 'LEFT JOIN '.PFX.'secretariat AS secr ON secr.id = inscr.id ';
         $sql .= 'LEFT JOIN '.PFX.'statuts AS statuts ON statuts.statut = inscr.statut ';
         $sql .= 'LEFT JOIN '.PFX.'inscriptionRV AS rv ON rv.idInscription = inscr.id ';
         $sql .= 'LEFT JOIN '.PFX.'classes AS lesClasses ON lesClasses.classe = inscr.classeMat ';
         $sql .= 'WHERE inscr.id = :id ';
         $requete = $connexion->prepare($sql);

         $requete->bindParam(':id', $id, PDO::PARAM_STR, 32);

         $record = array();
         $resultat = $requete->execute();
         if ($resultat) {
             $requete->setFetchMode(PDO::FETCH_ASSOC);
             $record = $requete->fetch();
            if ($record != Null) {
                $record['date'] = self::dateTimePHP($record['date']);
                $record['dateEnvoi'] = self::dateTimePHP($record['dateEnvoi']);
                $record['dateNaissance'] = self::datePHP($record['dateNaissance']);
            }
         }

         Application::DeconnexionPDO($connexion);

         return $record;
     }

     /**
      * confirme la demande d'inscription dont l'id est passé en argument
      *
      * @param string $id
      *
      * @return bool
      */
     public function confirmerDemande($id){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'UPDATE '.PFX.'inscriptions ';
        $sql .= 'SET statut = "confirmeMail" ';
        $sql .= 'WHERE id = :id AND ISNULL(statut) ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':id', $id, PDO::PARAM_STR, 32);

        $resultat = $requete->execute();

        $nb = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

        return $nb;
     }

     /**
      * liste de toutes les demandes d'inscriptions
      *
      * @param void
      *
      * @return array
      */
     public function getDemandes($tri=Null) {
         $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
         $sql = 'SELECT n, inscr.id, date, salutation, nomParent, prenomParent, mail, telephone, nomEnfant, prenomEnfant, sexe, ';
         $sql .= 'DATE_FORMAT(dateNaissance, "%d/%m/%Y") AS dateNaissance, dateNaissance AS dateNaissanceSQL, ';
         $sql .= 'nomPrioritaire, section, classe, inscr.statut, texteStatut, phrase ';
         $sql .= 'FROM '.PFX.'inscriptions AS inscr ';
         $sql .= 'LEFT JOIN '.PFX.'secretariat AS secr ON secr.id = inscr.id ';
         $sql .= 'LEFT JOIN '.PFX.'statuts AS statuts ON statuts.statut = inscr.statut ';
         $sql .= 'ORDER BY date ASC ';
         $requete = $connexion->prepare($sql);

         $liste = array();
         $resultat = $requete->execute();
         if ($resultat){
             $requete->setFetchMode(PDO::FETCH_ASSOC);
             while ($ligne = $requete->fetch()){
                 $id = $ligne['id'];
                 $ligne['dateSQL'] = $ligne['date'];
                 $ligne['date'] = self::dateTimePHP($ligne['date']);
                 $liste[$id] = $ligne;
             }
         }

         Application::DeconnexionPDO($connexion);

         return $liste;
     }

     /**
      * liste des statuts possibles
      *
      * @param void
      *
      * @return array
      */
     public function getListeStatuts(){
         $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
         $sql = 'SELECT statut, phrase ';
         $sql .= 'FROM '.PFX.'statuts ';
         $sql .= 'ORDER BY ordre ';
         $requete = $connexion->prepare($sql);

         $liste = array();
         $resultat = $requete->execute();

         if ($resultat){
             $requete->setFetchMode(PDO::FETCH_ASSOC);
             while ($ligne = $requete->fetch()){
                 $statut = $ligne['statut'];
                 $liste[$statut] = $ligne['phrase'];
             }
            }

        Application::DeconnexionPDO($connexion);

        return $liste;
     }

     /**
      * effacement des demandes de plus de $delai h
      *
      * @param int $delai
      *
      * @return int
      */
     public function cleanDemandes($delai){
         $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
         $sql = 'DELETE FROM '.PFX.'inscriptions ';
         $sql .= 'WHERE (TIMESTAMPDIFF(HOUR, date, NOW()) > 48) AND (ISNULL(statut))';
         $requete = $connexion->prepare($sql);

        // $requete->bindParam(':delai', $delai, PDO::PARAM_INT);
        $resultat = $requete->execute();

        $n = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

        return $n;
     }

     /**
      * passe les inscriptions en statut "annule" si date de demande < $dateLimite
      *
      * @param string $dateLimite
      *
      * @return int : nombre de modifications
      */
     public function annuleDemandes($dateLimite){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'UPDATE '.PFX.'inscriptions ';
        $sql .= 'SET statut = "annule" ';
        $sql .= 'WHERE dateNaissance < :dateLimite ';
        $requete = $connexion->prepare($sql);

        $dateLimite = Application::dateMySQL($dateLimite);
        $requete->bindParam(':dateLimite', $dateLimite, PDO::PARAM_STR, 10);

        $resultat = $requete->execute();

        $n = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

        return $n;
     }

     /**
      * compte le nombre d'inscriptions correspondant à une date de naissance < $dateLimite
      * 
      * @param string $dateLimite
      *
      * @return int : nombre d'enregistrements < $dateLimite
      */
      public function listeDemandes($dateLimite, $canceled = true){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT id, nomParent, prenomParent, nomEnfant, prenomEnfant, dateNaissance ';
        $sql .= 'FROM '.PFX.'inscriptions ';
        $sql .= 'WHERE dateNaissance < :dateLimite ';
        if ($canceled == false)
            $sql .= ' AND NOT (statut = "annule") ';
        $sql .= 'ORDER BY dateNaissance ';
        $requete = $connexion->prepare($sql);

        $dateLimite = Application::dateMySQL($dateLimite);
        $requete->bindParam(':dateLimite', $dateLimite, PDO::PARAM_STR, 10);

        $resultat = $requete->execute();

        $liste = array();
        if ($resultat){
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            while ($ligne = $requete->fetch()){
                $id = $ligne['id'];
                $ligne['dateNaissance'] = Application::datePHP($ligne['dateNaissance']);
                $liste[$id] = $ligne;
            }
        }

        Application::DeconnexionPDO($connexion);

        return $liste;
      }

     /**
      * renvoie la liste des dates de RV possibles
      *
      * @param void
      *
      * @return array
      */
     public function getDatesRV (){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT id, DATE_FORMAT(date,"%d/%m/%Y") AS date, heure, nbPlaces ';
        $sql .= 'FROM '.PFX.'datesRV ';
        $sql .= 'ORDER BY date ';
        $requete = $connexion->prepare($sql);

        $liste = array();
        $resultat = $requete->execute();
        if ($resultat){
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            while ($ligne = $requete->fetch()){
                $id = $ligne['id'];
                $liste[$id] = $ligne;
            }
        }

        Application::DeconnexionPDO($connexion);

        return $liste;
     }

     /**
      * renvoie la date et l'heure du RV $id
      * 
      * @param int $id
      *
      * @return array ($date, $heure)
      */
      public function getDateRV ($id){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT date, heure, nbPlaces ';
        $sql .= 'FROM '.PFX.'datesRV ';
        $sql .= 'WHERE id = :id ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':id', $id, PDO::PARAM_INT);

        $dateHeure = array('date' => Null, 'heure' => Null);
        $resultat = $requete->execute();

        if ($resultat) {
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            $ligne = $requete->fetch();
            $date = $this->datePHP($ligne['date']);
            $dateHeure['date'] = $date;
            $dateHeure['heure'] = $ligne['heure'];
        }

        Application::DeconnexionPDO($connexion);
        
        return $dateHeure;
      }

     /**
      * enregistre une nouvelle date de RV possible
      *
      * @param string $dateRV
      * @param string $heure
      * @param int $nbPlaces
      *
      * @return int : nombre d'enregistrements (0 ou 1)
      */
     public function setDateRV($date, $heure, $nbPlaces, $id=Null){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        if ($id == Null) {
            $sql = 'INSERT INTO '.PFX.'datesRV ';
            $sql .= 'SET date = :date, heure = :heure, nbPlaces = :nbPlaces ';
            }
            else {
                $sql = 'UPDATE '.PFX.'datesRV ';
                $sql .= 'SET date = :date, heure = :heure, nbPlaces = :nbPlaces ';
                $sql .= 'WHERE id = :id ';
            }
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':date', $date, PDO::PARAM_STR, 10);
        $requete->bindParam(':heure', $heure, PDO::PARAM_STR, 5);
        $requete->bindParam(':nbPlaces', $nbPlaces, PDO::PARAM_INT);
        if ($id != Null){
            $requete->bindParam(':id', $id, PDO::PARAM_INT);
        }

        $resultat = $requete->execute();

        $nb = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

        return $nb;
     }

     /**
      * renvoie la liste des dates auxquelles au moins un RV a été prévu
      *
      * @param void
      *
      * @return array
      */
     public function getDatesAvecRV() {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT inscr.idRV, idInscription ';
        $sql .= 'FROM '.PFX.'inscriptionRV AS inscr ';
        $sql .= 'JOIN '.PFX.'datesRV AS rv ON rv.id = inscr.idRV ';
        $sql .= 'ORDER BY date ';
        $requete = $connexion->prepare($sql);

        $liste = array();
        $resultat = $requete->execute();
        if ($resultat){
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            while ($ligne = $requete->fetch()){
                $idRV = $ligne['idRV'];
                $liste[$idRV] = $ligne;
            }
        }

        Application::DeconnexionPDO($connexion);

        return $liste;
     }

     /**
      * renvoie le nombre de RV par date
      *
      * @param void
      *
      * @return array
      */
     public function getNbRV4dates($idRV=Null) {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT idRV, count(*) AS nb ';
        $sql .= 'FROM '.PFX.'inscriptionRV GROUP BY idRV ';
        if ($idRV != Null)
            $sql .= 'WHERE idRV = :idRV ';
        $requete = $connexion->prepare($sql);

        if ($idRV != Null) {
            $requete->bindParam(':idRV', $idRV, PDO::PARAM_INT);
        }

        $liste = array();
        $resultat = $requete->execute();
        if ($resultat) {
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            while ($ligne = $requete->fetch()){
                $idRV = $ligne['idRV'];
                $liste[$idRV] = $ligne;
            }
        }

        Application::DeconnexionPDO($connexion);

        return $liste;
     }

     /**
      * Supprime une date de RV possible (aucun RV ne doit avoir été pris)
      *
      * @param int $idRV
      *
      * @return int
      */
     public function delDateRV($idRV) {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'DELETE FROM '.PFX.'datesRV ';
        $sql .= 'WHERE id = :idRV ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':idRV', $idRV, PDO::PARAM_INT);

        $requete->execute();

        $nb = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

        return $nb;
     }

     /**
      * supprime le RV $idRV fixé pour la demande $idInscription
      *
      * @param string $idInscription
      * @param int $idRV
      *
      * @return int
      */
     public function delRV($idInscription, $idRV){
         $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
         $sql = 'DELETE FROM '.PFX.'inscriptionRV ';
         $sql .= 'WHERE idInscription = :idInscription AND idRV = :idRV ';
         $requete = $connexion->prepare($sql);

         $requete->bindParam(':idInscription', $idInscription, PDO::PARAM_STR, 32);
         $requete->bindParam(':idRV', $idRV, PDO::PARAM_INT);

         $requete->execute();

         $nb = $requete->rowCount();

         Application::DeconnexionPDO($connexion);

         return $nb;
     }

     /**
      * Renvoie la liste de tous les pour la réunion dont on fournit id
      * 
      * @param int $idRV
      *
      * @return array
      */
      public function getListeParents4RV($idRV) {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT idInscription, idRV, salutation, nomParent, prenomParent, mail, ';
        $sql .= 'telephone, nomEnfant, prenomEnfant ';
        $sql .= 'FROM '.PFX.'inscriptionRV AS rv ';
        $sql .= 'JOIN '.PFX.'inscriptions AS inscr ON (inscr.id = rv.idInscription) ';
        $sql .= 'WHERE idRV = :idRV ';
        $sql .= 'ORDER BY LOWER(nomParent) ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':idRV', $idRV, PDO::PARAM_INT);

        $resultat = $requete->execute();

        $liste = array();
        if ($resultat) {
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            while ($ligne = $requete->fetch()){
                $idInscription = $ligne['idInscription'];
                $liste[$idInscription] = $ligne;
            }
        }

        Application::DeconnexionPDO($connexion);

        return $liste;
      }

     /**
      * recherche la liste des classes existantes dans la BD
      *
      * @param void
      *
      * @return array
      */
     public function getListeClasses(){
         $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
         $sql = 'SELECT classe, nomClasse ';
         $sql .= 'FROM '.PFX.'classes ';
         $requete = $connexion->prepare($sql);

         $liste = array();
         $resultat = $requete->execute();

         if ($resultat) {
             $requete->setFetchMode(PDO::FETCH_ASSOC);
             while ($ligne = $requete->fetch()){
                 $classe = $ligne['classe'];
                 $liste[$classe] = $ligne['nomClasse'];
             }
         }

         Application::DeconnexionPDO($connexion);

         return $liste;
     }

    /**
     * enregistre une date de RV $data pour une liste de demandes d'inscriptions $ids
     *
     * @param array $ids : identifiant de la demande d'inscription
     * @param int $idRV : identifiant du RV
     *
     * @return int
     */
    public function saveAcceptation($ids, $idRV) {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'INSERT INTO '.PFX.'inscriptionRV ';
        $sql .= 'SET idInscription = :id, idRV = :idRV ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':idRV', $idRV, PDO::PARAM_INT);

        $nb = 0;
        foreach ($ids AS $id) {
            $requete->bindParam(':id', $id, PDO::PARAM_STR, 32);
            $requete->execute();
            $nb += $requete->rowCount();
        }

        Application::DeconnexionPDO($connexion);

        return $nb;
    }

    /**
     * Enregistre la date de l'envoi du mail de confirmation du RV
     * 
     * @param string $idInscription
     * 
     * @return int
     * 
     */
    public function setDateEnvoiInvitation($idInscription) {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'UPDATE '.PFX.'inscriptionRV ';
        $sql .= 'SET dateEnvoi = NOW() ';
        $sql .= 'WHERE idInscription = :idInscription ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':idInscription', $idInscription, PDO::PARAM_STR, 32);

        $resultat = $requete->execute();

        $nb = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

        return $nb;
    }




    /**
     * modifie le statut des demandes d'inscription $ids
     * pour le statut $statut
     *
     * @param array $ids
     * @param string $statut
     *
     * @return int
     */
    public function changeStatut($ids, $statut){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'UPDATE '.PFX.'inscriptions ';
        $sql .= 'SET statut = :statut ';
        $sql .= 'WHERE id = :id ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':statut', $statut, PDO::PARAM_STR, 20);

        $nb = 0;
        foreach ($ids AS $id) {
            $requete->bindParam(':id', $id, PDO::PARAM_STR, 32);

            $requete->execute();
            $nb += $requete->rowCount();
        }

        Application::DeconnexionPDO($connexion);

        return $nb;
    }

    /**
     * recherche des demandes avec RV fixé pour envoi des mails
     *
     * @param string $statut : statut de la demande d'inscription
     * @param string $classeMat : la classe envisagée pour l'enfant
     *
     * @return array
     */
    public function getInscriptionBystatut($statut, $classeMat=Null){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT n, inscr.id, inscr.date, salutation, nomParent, prenomParent, adresse, mail, telephone, nomEnfant, prenomEnfant, sexe, ';
        $sql .= 'dateNaissance, classeMat, nomClasse, creche, ecole, raison, remarque, inscr.statut, rv.idRV, dates.date AS dateRV, dates.heure AS heureRV ';
        $sql .= 'FROM '.PFX.'inscriptions AS inscr ';
        $sql .= 'LEFT JOIN '.PFX.'classes AS classes ON classes.classe = inscr.classeMat ';
        $sql .= 'LEFT JOIN '.PFX.'inscriptionRV AS rv ON rv.idInscription = inscr.id ';
        $sql .= 'LEFT JOIN '.PFX.'datesRV AS dates ON dates.id = rv.idRV ';
        $sql .= 'WHERE statut = :statut ';
        if ($classeMat == Null)
            $sql .= 'AND classeMat NOT LIKE "" ';
        $sql .= 'ORDER BY idRV ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':statut', $statut, PDO::PARAM_STR, 20);

        $liste = array();
        
        $resultat = $requete->execute();
        if ($resultat) {
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            while ($ligne = $requete->fetch()){
                $id = $ligne['id'];
                $liste[$id] = $ligne;
            }
        }

        Application::DeconnexionPDO($connexion);

        return $liste;
    }

    /**
     * recherche la liste des utilisateurs de l'application "admin"
     * 
     * @param void
     * 
     * @return array
     */
    public function getUsersList(){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT userName, nom, prenom, mail ';
        $sql .= 'FROM '.PFX.'users ';
        $sql .= 'ORDER BY nom, prenom ';
        $requete = $connexion->prepare($sql);

        $liste = array();
        $resultat = $requete->execute();

        $requete->setFetchMode(PDO::FETCH_ASSOC);
        while ($ligne = $requete->fetch()) {
            $userName = strtolower($ligne['userName']);
            $liste[$userName] = $ligne;
        }

        Application::DeconnexionPDO($connexion);

        return $liste;
    }

    /**
     * Enregistrement d'un nouvel utilisateur admin
     * 
     * @param string $nom
     * @param string $prenom
     * @param string $acronyme
     * @param string $passwd
     * 
     * @return int nombre d'enregistrements
     */
    public function saveUser ($nom, $prenom, $mail, $acronyme) {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'INSERT INTO '.PFX.'users ';
        $sql .= 'SET nom = :nom, prenom = :prenom, mail = :mail, userName = :acronyme ';
        $sql .= 'ON DUPLICATE KEY UPDATE nom = :nom, prenom = :prenom, mail = :mail ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':nom', $nom, PDO::PARAM_STR, 40);
        $requete->bindParam(':prenom', $prenom, PDO::PARAM_STR, 40);
        $requete->bindParam(':mail', $mail, PDO::PARAM_STR, 60);
        $requete->bindParam(':acronyme', $acronyme, PDO::PARAM_STR, 7);

        $resultat = $requete->execute();

        $nb = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

        return $nb;
    }

    /**
     * Supprime l'utilisateur dont on donne l'acronyme
     * 
     * @param string $acronyme
     * 
     * @return int 0 ou 1
     */
    public function delUser($acronyme){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'DELETE FROM '.PFX.'users ';
        $sql .= 'WHERE userName = :acronyme ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':acronyme', $acronyme, PDO::PARAM_STR, 7);

        $resultat = $requete->execute();

        $nb = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

        return $nb;
    }

    /**
     * Enregistrement du mot de passe de l'utilisateur $acronyme
     * 
     * @param string $acronyme
     * @param string $passwd
     * 
     * @return int
     */
    public function saveUserPasswd($acronyme, $passwd) {
        $md5pwd = md5($passwd);
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'UPDATE '.PFX.'users ';
        $sql .= 'SET md5pwd = :md5pwd ';
        $sql .= 'WHERE userName = :acronyme ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':acronyme', $acronyme, PDO::PARAM_STR, 7);
        $requete->bindParam(':md5pwd', $md5pwd, PDO::PARAM_STR, 40);

        $requete->execute();

        $nb = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

        return $nb;
    }

    /**
     * recherche le texte type et le titre de la boîte modale du texte type nommé $textName
     * 
     * @param string $textName
     * 
     * @return array
     */
    public function getTexteType($textName){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT texte, title ';
        $sql .= 'FROM '.PFX.'textes ';
        $sql .= 'WHERE textName = :textName ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':textName', $textName, PDO::PARAM_STR, 20);

        $resultat = $requete->execute();
        $data = array();
        if ($resultat){
            $ligne = $requete->fetch();
            $data = $ligne;
        }

        Application::DeconnexionPDO($connexion);

        return $data;
    }

    /**
     * Enregistrer le texte type de mail nommé $textName
     * 
     * @param string $textName
     * 
     * @return int
     */
    public function saveTexteType ($textName, $texteType){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'UPDATE '.PFX.'textes ';
        $sql .= 'SET texte = :texteType ';
        $sql .= 'WHERE textName = :textName ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':textName', $textName, PDO::PARAM_STR, 20);
        $requete->bindParam(':texteType', $texteType, PDO::PARAM_STR);

        $resultat = $requete->execute();

        $nb = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

        return $nb;
    }

    /**
     * rechercher les inserts possibles pour le texte type $textName
     * 
     * @param string $textName
     * 
     * @return array
     */
    public function getInserts4Type($textName){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT texteInsert, titreInsert ';
        $sql .= 'FROM '.PFX.'textesInserts ';
        $sql .= 'WHERE textName = :textName ';
        $sql .= 'ORDER BY texteInsert ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':textName', $textName, PDO::PARAM_STR, 20);

        $liste = array();
        $resultat = $requete->execute();
        if ($resultat){
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            while ($ligne = $requete->fetch()) {
                $liste[] = $ligne;
            }
        }
        Application::DeconnexionPDO($connexion);

        return $liste;
    }

}
