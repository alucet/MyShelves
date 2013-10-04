<?php
namespace MyShelves\Controller;
use MyShelves\Model;
/**
 * Contrôleur Editor
 *
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Editor extends Controller {
    
    protected $_idShelf;
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Action 'index' du contrôleur 'Editor': affiche l'éditeur sélectionné.
     * @todo Passer la liste des items de l'éditeur
     * @param int $idShelf L'étagère à afficher.
     */
    public function indexAction($idEditor) {
        try {
            $editor = new Model\Editor($idEditor);
            $this->_response->render('/Editor.index.twig', array('editor' => $editor));
        } catch (Exception $e) {
            $this->_response->render('/Editor.index.twig', array('msg' => $e->getMessage()));;
        }
    }
    
    /**
     * Ajout d'une nouvelle étagère.
     */
    public function newAction() {
        if ($this->_request->isPost()) {
            // Le formulaire a été soumis -> validation et enregistrement
            ;
        } else {
            // Affichage du formulaire d'ajout
            ;
        }
    }
    
    /**
     * Modification d'une étagère.
     * @param int $idShelf L'étagère à modifier.
     */
    public function editAction($idShelf) {
        ;
    }
    
    /**
     * Suppression d'une étagère.
     * @param int $idShelf L'étagère à supprimer.
     */
    public function deleteAction($idShelf) {
        ;
    }
    
}

?>
