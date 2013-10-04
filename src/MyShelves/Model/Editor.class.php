<?php
namespace MyShelves\Model;

/**
 * 
 * @todo Enregistrement en BDD
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Editor extends Model {
    
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
                SELECT editor.id_editor, name_editor, COUNT(item.id_editor) AS nb
                FROM editor
                LEFT JOIN item
                    ON editor.id_editor = item.id_editor
                WHERE editor.id_editor = $id
                GROUP BY editor.id_editor, name_editor", \PDO::FETCH_ASSOC);
        if ($req !== FALSE) {
            $row = $req->fetch();
            $this->setId($row['id_editor']);
            $this->setName($row['name_editor']);
            $this->_setNbItems($row['nb']);
        } else
            throw new \InvalidArgumentException('Cet éditeur n\'existe pas. Identifiant inconnu.');
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
        $this->_name = trim(filter_var($name, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    }
    
    public function getNbItems() {
        return $this->_nbItems;
    }
    
    private function _setNbItems($nb) {
        $this->_nbItems = filter_var($nb, FILTER_VALIDATE_INT, array('min_range' => 0));
    }
    
}
