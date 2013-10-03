<?php
namespace MyShelves\Model;

/**
 * @todo Gestion auteurs & éditeurs
 * @todo Gestion timestamps
 * @todo Enregistrement en BDD
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Item extends Model {
    
    private $_id;
    private $_title;
    private $_idEditor;
    private $_idShelf;
    private $_notes;
    private $_rating = 0;
    private $_completedOn;
    private $_createdOn;
    protected $_db;

    public function __construct($id) {
        parent::__construct();
        $this->_db = parent::getDb();
        if ( isset($id) ) {
            $id = filter_var($id, FILTER_VALIDATE_INT, array('min_range' => 1));
            if ($id !== FALSE)
                $this->load($id);
        }
    }
    
    public function load($id) {
        $id = filter_var($id, FILTER_VALIDATE_INT, array('min_range' => 1));
        if ($id)
            $req = $this->_db->query("
                SELECT  id_item, title_item, id_editor, id_shelf, 
                        notes_item, rating_item, completedon_item, createdon_item, 'book' AS type
                FROM item, book
                WHERE id_item = id_book
                AND id_item = $id", \PDO::FETCH_ASSOC);
        if ($req !== FALSE) {
            $row = $req->fetch();
            $this->setId($row['id_item']);
            $this->setTitle($row['title_item']);
            $this->setIdEditor($row['id_editor']);
            $this->setIdShelf($row['id_shelf']);
            $this->setNotes($row['notes_item']);
            $this->setRating($row['rating_item']);
            $this->setCompletedOn($row['completedon_item']);
            $this->setCreatedOn($row['createdon_item']);
        } else
            throw new \InvalidArgumentException('Cette élément n\'existe pas. Identifiant inconnu.');
    }
    
    public function getId() {
        return $this->_id;
    }
    
    public function setId($id) {
        $this->_id = filter_var($id, FILTER_VALIDATE_INT, array('min_range' => 1));
    }
    
    public function getTitle() {
        return $this->_title;
    }
    
    public function setTitle($title) {
        $this->_title = trim(filter_var($title, FILTER_SANITIZE_STRING));
    }
    
    public function getIdEditor() {
        return $this->_idEditor;
    }
    
    public function setIdEditor($id) {
        $this->_idEditor = filter_var($id, FILTER_VALIDATE_INT, array('min_range' => 1));
    }
    
    public function getIdShelf() {
        return $this->_idShelf;
    }
    
    public function setIdShelf($id) {
        $this->_idShelf = filter_var($id, FILTER_VALIDATE_INT, array('min_range' => 1));
    }
    
    public function getNotes() {
        return $this->_notes;
    }
    
    public function setNotes($notesTxt) {
        $this->_notes = trim(filter_var($notesTxt, FILTER_SANITIZE_STRING));
    }
    
    public function getRating() {
        return $this->_rating;
    }
    
    /** @todo constante */
    public function setRating($rating) {
        $this->_rating = filter_var($rating, FILTER_VALIDATE_INT, array('min_range' => 0, 'max_range' => 5));
    }
    
    public function getCompletedOn() {
        return $this->_completedOn;
    }
    
    /** @todo Valider */
    public function setCompletedOn($timestamp) {
        if (is_numeric($timestamp))
            $this->_completedOn = $timestamp;
    }
    
    public function getCreatedOn() {
        return $this->_createdOn;
    }
    
    /** @todo Valider */
    public function setCreatedOn($timestamp) {
        if (is_numeric($timestamp))
            $this->_createdOn = $timestamp;
    }
    
}
