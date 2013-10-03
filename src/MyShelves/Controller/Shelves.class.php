<?php
namespace MyShelves\Controller;
use MyShelves\Model;
/**
 * Contrôleur Shelves
 * @todo Gestion des pages
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Shelves extends Controller {
    
    protected $_page = 1;
    
    public function __construct() {
        parent::__construct();
    }

    /**
     * Action 'index' du contrôleur 'Shelves': liste des étagères existantes.
     * @todo prévoir Nom de l'étagère + nombre d'items
     */
    public function indexAction() {
        $shelvesObj = new Model\Shelves();
        $shelves = $shelvesObj->getList();
        $params = array('shelves' => $shelves);
        $ajax = $this->_request->getParam('ajax');
        if ( $ajax === '1' )
            $params['ajaxSourced'] = true;
        $this->_response->render('/Shelves/index.twig', $params);
    }
    
}
