<?php
namespace MyShelves\Controller;
use MyShelves\Model;
/**
 * Contrôleur Items
 * @todo Gestion des pages
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Items extends Controller {
    
    protected $_page = 1;
    
    public function __construct() {
        parent::__construct();
    }

    /**
     * Action 'index' du contrôleur 'Items': liste d'éléments.
     * @todo 
     */
    public function indexAction($idShelf) {
        $itemsObj = new Model\Items();
        $items = $itemsObj->getList($idShelf);
        $params = array('items' => $items);
        $ajax = $this->_request->getParam('ajax');
        if ( $ajax === '1' )
            $params['ajaxSourced'] = true;
        $this->_response->render('/Items/index.twig', $params);
    }
    
}
