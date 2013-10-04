<?php
namespace MyShelves\Controller;
use MyShelves\Model;
/**
 * Contrôleur Editors
 * @todo Gestion des pages
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Editors extends Controller {
    
    protected $_page = 1;
    
    public function __construct() {
        parent::__construct();
    }

    /**
     * Action 'index' du contrôleur 'Editors': liste des éditeurs existants.
     * @todo prévoir Nom de l'étagère + nombre d'items
     */
    public function indexAction() {
        $editorsObj = new Model\Editors();
        $editors = $editorsObj->getList();
        $params = array('editors' => $editors);
        $ajax = $this->_request->getParam('ajax');
        if ( $ajax === '1' )
            $params['ajaxSourced'] = true;
        $this->_response->render('/Editors.index.twig', $params);
    }
    
}
