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
        $vue = $this->_response->render('/Shelves/index.twig', array('shelves' => $shelves));
    }
    
}
