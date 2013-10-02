<?php
namespace MyShelves;
use MyShelves as MS;

/**
 * Classe du FrontController pour le routage. Singleton.
 * @todo
 *
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */

class FrontController
{
    private $_defaults = array('module' => 'home', 'action' => 'index', 'iditem' => '0');
    private $_request;
    private $_response;
    private $_twig;
    private $_db;
    private static $_instance = null;

    private function __construct() {
        
        // Création des objets de requête et de réponse
        $this->_request = new Request();
        $this->_response = new Response();
        
        // Chargement et configuration de Twig
        require_once __DIR__  . '/../../vendor/autoload.php'; // Composer se charge de l'autoload de Twig.
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/View');
        //$this->_twig = new \Twig_Environment($loader, array('cache' => __DIR__ . '/../../web/cache', 
        //                                                    'auto_reload' => true));
        $this->_twig = new \Twig_Environment($loader, array());
        
        // Connexion BDD
        try {
            $this->_db = new MS\Database();
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

    /**
     * Récupère l'instance existante.
     * @return self
     */
    public static function getInstance() {
        if (is_null(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Routage: point d'entrée.
     * @todo nettoyer
     * @todo Routage
     * @param type $defaults
     */
    public function dispatch() {
        // Parsing de la route dans la requête
        $route = $this->_request->route();
        if (empty($route['module'])) $route['module'] = $this->_defaults['module'];
        if (empty($route['action'])) $route['action'] = $this->_defaults['action'];
        if (empty($route['iditem'])) $route['iditem'] = $this->_defaults['iditem'];
        // Passage de relai au contrôleur concerné
        $this->_forward($route['module'], $route['action'], $route['iditem']);
    }

    /**
     * Routage: relai vers le contrôleur à lancer
     * @param type $module
     * @param type $action
     */
    private function _forward($module, $action, $iditem) {
        // Instanciation du contrôleur
        $controller = $this->_getCommand($module, $action);
        // Lancement de l'action
        $action = $action.'Action';
        $controller->$action(($iditem)?$iditem:NULL);
    }

    /**
     * Vérifie l'existence et crée la classe de contrôleur.
     * @todo Gérer erreurs et redirections
     * @param string $module Le nom du module contenant le contrôleur à instancier.
     * @param string $action Le nom du contrôleur à instancier.
     * @return \MyShelves\class
     * @throws ReflectionException
     */
    private function _getCommand($module, $action) {
        try {
            $classe = '\\MyShelves\\Controller\\'.ucfirst($module);
            $refClass = new \ReflectionClass($classe);
            if ($refClass->hasMethod($action.'Action'))
                return new $classe();
        } catch (\ReflectionException $re) {
            echo $re->getMessage();
        }
    }

    /**
     * Retourne l'objet Response en cours.
     * @return MyShelves\Response
     */
    public function getResponse() {
        return $this->_response;
    }
    
    /**
     * Retourne l'objet Request en cours.
     * @return MyShelves\Request
     */
    public function getRequest() {
        return $this->_request;
    }

    /**
     * Retourne l'objet Twig en cours.
     * @return Twig_Environment
     */
    public function getTwig() {
        return $this->_twig;
    }
    
    public function getDb() {
        return $this->_db;
    }
    
    public function redirect($url) {
        $this->_response->redirect($url);
    }

}

