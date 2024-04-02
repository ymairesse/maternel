<?php

class user
{
    private $userName;
    private $identite;
    /**
     * constructeur de l'objet user.
     */
    public function __construct($userName = null)
    {
        $this->identiteReseau = $this->identiteReseau();
        if (isset($userName)) {
            // pseudo
            $this->userName = $userName;
            // parent, eleve ou prof
            $this->setIdentite($userName);
        }
    }

    /**
     * renvoie les informations d'identification réseau de l'utilisateur courant.
     *
     * @param
     *
     * @return array ip, hostname, date, heure
     */
    public static function identification()
    {
        $data = array();
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $data['hostname'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $data['date'] = date('d/m/Y');
        $data['heure'] = date('H:i');

        return $data;
    }
    /**
     * recherche toutes les informations de la table des utilisateurs pour l'utilisateur actif et les reporte dans l'objet User.
     *
     * @param string $userType : parent ou eleve
     *
     * @return void
     */
    public function setIdentite($userName) {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT userName, nom, prenom, mail, md5pwd, mail ';
        $sql .= 'FROM '.PFX.'users ';
        $sql .= 'WHERE userName = :userName ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':userName', $userName, PDO::PARAM_STR, 10);
        $resultat = $requete->execute();

        if ($resultat) {
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            $ligne = $requete->fetch();

            $this->identite = $ligne;

        }
        Application::DeconnexionPDO($connexion);
    }

    /**
     * renvoie toutes les informations d'identité présentes dans l'objet User.
     *
     * @param void
     *
     * @return array
     */
    public function getIdentite()
    {
        return $this->identite;
    }

    /**
     * renvoie le prénom et le nom de l'utilisateur.
     *
     * @param
     *
     * @return string
     */
    public function getNom()
    {
        $prenom = $this->identite['prenom'];
        $nom = $this->identite['nom'];

        return sprintf('%s %s', $prenom, $nom);
    }

        /**
     * fournit le mot de passe MD5 de l'utilisateur.
     *
     * @param
     *
     * @return string
     */
    public function getPasswd()
    {
        return $this->identite['md5pwd'];
    }

    /**
     * fournit le nom d'utilisateur de l'utilisateur actif.
     *
     * @param void()
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * retourne le nom de l'application; permet de ne pas confondre deux applications
     * différentes qui utiliseraient la variable de SESSION pour retenir MDP et USERNAME
     * de la même façon.
     *
     * @param
     *
     * @return string
     */
    public function applicationName()
    {
        return $this->applicationName;
    }

    /**
     * renvoie le userName de l'utilisateur courant.
     *
     * @param
     *
     * @return string
     */
    public function userName()
    {
        return $this->userName;
    }

    /**
     * renvoie les informations d'identification réseau de l'utilisateur courant.
     *
     * @param
     *
     * @return array ip, hostname, date, heure
     */
    public static function identiteReseau()
    {
        $data = array();
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $data['hostname'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $data['date'] = date('d/m/Y');
        $data['heure'] = date('H:i');

        return $data;
    }

    /**
     * renvoie l'adresse mail de l'utilisateur courant.
     */
    public function getMail()
    {
        return $this->identite['mail'];
    }

    /**
     * renvoie l'adresse IP de connexion de l'utilisateur actuel.
     *
     * @param
     *
     * @return string
     */
    public function getIP()
    {
        $data = $this->identiteReseau();

        return $data['ip'];
    }

    /**
     * renvoie le nom de l'hôte correspondant à l'IP de l'utilisateur en cours.
     *
     * @param
     *
     * @return string
     */
    public function getHostname()
    {
        $data = $this->identiteReseau();

        return $data['hostname'];
    }



}
