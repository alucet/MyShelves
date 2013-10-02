<?php
namespace MyShelves\Controller;
/**
 * Contrôleur Shelf
 *
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Shelf extends Controller {
    
    protected $_idShelf;
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Action 'index' du contrôleur 'Shelf': affiche l'étagère sélectionnée.
     * @param int $idShelf L'étagère à afficher.
     */
    public function indexAction($idShelf) {
        try {
            $shelf = new Model\Shelf($idShelf);
            $vue = $this->_response->render('/shelf/index.twig', array('shelf' => $shelf));
        } catch (Exception $e) {
            $vue = $this->_response->render('/shelf/index.twig', array('msg' => $e->getMessage()));;
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
