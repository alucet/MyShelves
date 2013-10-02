<?php
namespace MyShelves;

/**
 * Objet Request
 *
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */

class Request {
    
    // Paramètres de la requête.
    private $_params;
    
    public function __construct() {
        $this->_loadParams();
    }
    
    /**
     * Charge les paramètres de la requête.
     * @todo Déplacer dans constructeur ?
     */
    private function _loadParams() {
        if ( isset($_SERVER['REQUEST_METHOD']) ) {
            $this->_params = $_REQUEST;
        }
    }
    
    public function isPost() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    
    /**
     * Retourne un paramètre.
     * @todo Prévoir des fonctions de filtrage.
     * @param type $key
     * @return La valeur du paramètre.
     */
    public function getParam($key) {
        return $this->_params[$key];
    }
	
    /**
     * Parsing de l'URI pour déterminer l'action à lancer.
     * @todo Gérer un préfixe (ex: /myshelves/).
     * @return type
     */
    public function route() {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if (empty($path))
            return array();
        /*
         * Pattern de l'URI: /module/action/iditem
         * 
         * Chemins possibles:
         *      /                           -> Accueil
         *      /module                     -> /shelf , /item
         *      /module/action              -> /shelf/new
         *      /module/action/iditem       -> /item/edit/123 , /item/page/3
         *      /module/iditem              -> /item/123
         */
        preg_match('/
                        ^
                        (\/(?P<module>[a-zA-Z]*))    # Partie module, alpha
                        (\/(?P<action>[a-zA-Z]*))?   # Partie action, alpha
                        (\/(?P<iditem>[0-9]*))?      # Partie id, num
                        $
                    /x', $path, $matches);
        return $matches;
    }
}