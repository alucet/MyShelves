<?php
namespace MyShelves\Controller;

/**
 * Contrôleur de la page d'accueil.
 *
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Home extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Action 'index' du contrôleur 'Home': page d'accueil.
     * @todo 
     */
    public function indexAction() {
        $vue = $this->_response->render('/Home.index.twig', array());
    }
    
}

?>
