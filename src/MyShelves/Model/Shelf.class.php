<?php
namespace MyShelves\Model;

/**
 * 
 * @todo Enregistrement en BDD
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Shelf extends Model {
    
    private $_id;
    private $_name;
    private $_nbItems = 0;
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
                SELECT shelf.id_shelf, name_shelf, COUNT(item.id_shelf) AS nb
                FROM shelf
                LEFT JOIN item
                    ON shelf.id_shelf = item.id_shelf
                WHERE shelf.id_shelf = $id
                GROUP BY shelf.id_shelf, name_shelf", \PDO::FETCH_ASSOC);
        if ($req !== FALSE) {
            $row = $req->fetch();
            $this->setId($row['id_shelf']);
            $this->setName($row['name_shelf']);
            $this->_setNbItems($row['nb']);
        } else
            throw new \InvalidArgumentException('Cette étagère n\'existe pas. Identifiant inconnu.');
    }
    
    public function getId() {
        return $this->_id;
    }
    
    public function setId($id) {
        $this->_id = filter_var($id, FILTER_VALIDATE_INT, array('min_range' => 1));
    }
    
    public function getName() {
        return $this->_name;
    }
    
    public function setName($name) {
        $this->_name = trim(filter_var($name, FILTER_SANITIZE_STRING));
    }
    
    public function getNbItems() {
        return $this->_nbItems;
    }
    
    private function _setNbItems($nb) {
        $this->_nbItems = filter_var($nb, FILTER_VALIDATE_INT, array('min_range' => 0));
    }
    
}
